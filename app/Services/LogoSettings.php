<?php

namespace App\Services;

use App\Exceptions\CustomException;
use App\Models\Customization;
use Illuminate\Filesystem\FilesystemManager;
use Intervention\Image\ImageManager;

/**
 * Class LogoSettings
 * @package App\Services
 */
class LogoSettings
{
    public const TEMP_UPLOAD_FOLDER = 'img/tmp';
    public const MIN_SIZE = 20; //px

    /**
     * @var array
     */
    private $fileSystemConfig;

    /**
     * @var FilesystemManager
     */
    private $fileSystem;

    /**
     * @var string
     */
    private $rootUrl;

    /**
     * @var string
     */
    private $rootPath;

    /**
     * LogoSettings constructor.
     * @param FilesystemManager $fileSystem
     * @param array $fileSystemConfig
     */
    public function __construct(FilesystemManager $fileSystem, array $fileSystemConfig)
    {
        $this->fileSystem = $fileSystem;
        $this->fileSystemConfig = $fileSystemConfig;
        $this->rootUrl = $this->fileSystemConfig['disks'][$this->fileSystemConfig['default']]['url'];
        $this->rootPath = $this->fileSystemConfig['disks'][$this->fileSystemConfig['default']]['root'];
    }

    /**
     * @param array $input
     * @param ImageManager $imageManager
     */
    public function save(array $input, ImageManager $imageManager)
    {
        if (!$this->isValidLogoArea($input)) {
            $msg = sprintf('Selected logo area must be a minimum of %dpx high by %dpx wide.', self::MIN_SIZE, self::MIN_SIZE);
            throw new CustomException(new \App\Errors\CannotSaveLogoArea($msg));
        }

        $this->createFiles($input, $imageManager);
        $this->updateCustomizations($input);
    }

    /**
     * @param string $originalLogoPath
     * @param ImageManager $imageManager
     * @return \Intervention\Image\Image
     */
    public function createCroppedLogo(string $originalLogoPath, ImageManager $imageManager)
    {

        return $this->createCroppedLogoByPoints(
            $originalLogoPath,
            $imageManager,
            Customization::findOrFailByKey(Customization::KEY_LOGO_WIDTH)->getTypedValue(),
            Customization::findOrFailByKey(Customization::KEY_LOGO_HEIGHT)->getTypedValue(),
            Customization::findOrFailByKey(Customization::KEY_LOGO_X_POINT)->getTypedValue(),
            Customization::findOrFailByKey(Customization::KEY_LOGO_Y_POINT)->getTypedValue()
        );
    }

    /**
     * @param string $originalLogoPath
     * @param ImageManager $imageManager
     * @param int $width
     * @param int $height
     * @param int $x
     * @param int $y
     * @return \Intervention\Image\Image
     */
    private function createCroppedLogoByPoints(
        string $originalLogoPath,
        ImageManager $imageManager,
        int $width,
        int $height,
        int $x,
        int $y
    ) {
        //$originalLogoPath = 'http://nginx:8080/assets/img/tmp/original_logo.png';//path in nginx container
        /**
         * we can use URL of image, but some urls are not valid(RFC 2396). for example https://api_dev.velmie-wallet.com
         */
        $originalLogoContent = $this->getLogoContent($originalLogoPath);
        $image = $imageManager
            ->make($originalLogoContent)
            ->crop($width, $height, $x, $y);

        $this->fileSystem->put(Customization::getLogoPath(), $image->encode());

        return $image;
    }

    /**
     * @param array $input
     * @param ImageManager $imageManager
     */
    private function createFiles(array $input, ImageManager $imageManager)
    {
        $faviconPath = !empty($input['faviconPath']) ? $input['faviconPath'] : Customization::getDefaultFaviconPath();
        $originalLogoPath = !empty($input['logoPath']) ? $input['logoPath'] : Customization::getDefaultLogoPath();

        $this->createCroppedLogoByPoints(
            $originalLogoPath,
            $imageManager,
            $input['width'],
            $input['height'],
            $input['xPoint'],
            $input['yPoint']
        );

        $this
            ->saveFile($faviconPath, Customization::getFaviconPath())
            ->saveFile($originalLogoPath, Customization::getOriginalLogoPath());
    }

    /**
     * @param array $input
     */
    private function updateCustomizations(array $input)
    {
        $xPoint = Customization::findOrFailByKey(Customization::KEY_LOGO_X_POINT);
        $yPoint = Customization::findOrFailByKey(Customization::KEY_LOGO_Y_POINT);
        $width = Customization::findOrFailByKey(Customization::KEY_LOGO_WIDTH);
        $height = Customization::findOrFailByKey(Customization::KEY_LOGO_HEIGHT);

        $yPoint->value = $input['yPoint'];
        $yPoint->save();

        $width->value = $input['width'];
        $width->save();

        $xPoint->value = $input['xPoint'];
        $xPoint->save();

        $height->value = $input['height'];
        $height->save();
    }

    /**
     * @param string $pathFrom
     * @param string $pathTo
     * @return $this
     */
    private function saveFile(string $pathFrom, string $pathTo)
    {
        $relativePath = str_replace($this->rootUrl, '', $pathFrom);
        $this->fileSystem->copy($relativePath, $pathTo);

        return $this;
    }

    /**
     * @param string $logoPath
     * @return bool|string
     */
    private function getLogoContent(string $logoPath)
    {
        $options = [
            "ssl" => [
                "verify_peer" => false,
                "verify_peer_name" => false,
            ],
            'http' => [
                'method' => "GET",
                'header' => "Accept-language: en\r\n" .
                    "User-Agent: Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.2 (KHTML, like Gecko) Chrome/22.0.1216.0 Safari/537.2\r\n"
            ]
        ];
        $context = stream_context_create($options);
        return @file_get_contents($logoPath, false, $context);
    }

    /**
     * @param array $input
     * @return bool
     */
    private function isValidLogoArea(array $input)
    {
        if (
            $input['width'] < self::MIN_SIZE ||
            $input['height'] < self::MIN_SIZE
        ) {
            return false;
        }
        return true;
    }
}
