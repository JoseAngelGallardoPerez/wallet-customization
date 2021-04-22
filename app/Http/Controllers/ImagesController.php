<?php

namespace App\Http\Controllers;

use App\Models\Customization;
use App\Services\CssManager;
use App\Services\LogoSettings;
use App\Validators\Rules\FileExists;
use App\Validators\Rules\FileMax;
use Illuminate\Http\Request;
use Illuminate\Filesystem\FilesystemManager;

/**
 * Class ImagesController
 * @package App\Http\Controllers
 */
class ImagesController extends Controller
{
    /**
     * @var FilesystemManager
     */
    private $fileSystem;

    /**
     * ImagesController constructor.
     */
    public function __construct()
    {
        $this->fileSystem = app('filesystem');
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function logoSettings()
    {
        return $this->createResponse($this->getLogoSettings());
    }

    /**
     * @param Request $request
     * @param LogoSettings $logoSettings
     * @param CssManager $cssManager
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     * @throws \Illuminate\Validation\ValidationException
     */
    public function saveLogoSettings(Request $request, LogoSettings $logoSettings, CssManager $cssManager)
    {
        $this
            ->removeVersionStampFromRequest($request, 'faviconPath')
            ->removeVersionStampFromRequest($request, 'logoPath');

        $fileSystemConfig = config('filesystems');

        $input = $this->validate($request, [
            'faviconPath' => [new FileExists($fileSystemConfig, $this->fileSystem), 'required'],
            'logoPath' => [new FileExists($fileSystemConfig, $this->fileSystem), 'required'],
            'xPoint' => 'required|integer',
            'yPoint' => 'required|integer',
            'width' => 'required|integer',
            'height' => 'required|integer',
        ]);

        $logoSettings->save($input, app()->make('image'));
        $cssManager->generateCustomCssFile();

        return $this->createResponse($this->getLogoSettings());
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function uploadLogo(Request $request)
    {
        $file = $request->file('file');

        $this->validate($request, [
            'file' => ['required', 'mimes:jpeg,jpg,png', new FileMax(2048)]
        ]);

        $filePathInStorage = $file->storeAs(LogoSettings::TEMP_UPLOAD_FOLDER, Customization::ORIGINAL_LOGO_NAME);

        return $this->createResponse(['link' => $this->getFileUrlWithVersionStamp($filePathInStorage)]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function uploadFavicon(Request $request)
    {
        $file = $request->file('file');

        $this->validate($request, [
            'file' => ['required', 'mimes:ico', new FileMax(2048)],
        ]);

        $filePathInStorage = $file->storeAs(LogoSettings::TEMP_UPLOAD_FOLDER, Customization::FAVICON_NAME);

        return $this->createResponse(['link' => $this->getFileUrlWithVersionStamp($filePathInStorage)]);
    }

    /**
     * if the logo not found we crop new logo from original image and send to response
     *
     * @param Request $request
     * @param LogoSettings $logoSettings
     * @return \Illuminate\Contracts\Routing\ResponseFactory
     */
    public function getImage(Request $request, LogoSettings $logoSettings)
    {
        try {
            $path = $request->route('path');
            if (('/' . $path) === Customization::getLogoPath()) {
                $logoPath = $this->fileSystem->url(Customization::getOriginalLogoPath());
                $image = $logoSettings->createCroppedLogo($logoPath, app()->make('image'));

                $response = response($image->encode('png'));
                $response->header('Content-Type', 'image/png');

                return $response;
            }
        } catch (\Throwable $exception) {
            app()->make('log')->error($exception);
        }

        abort(404, 'Page not found');
    }

    /**
     * @return array
     */
    private function getLogoSettings()
    {
        return [
            'favicon' => ['path' => $this->getFileUrlWithVersionStamp(Customization::getFaviconPath())],
            'logo' => [
                'path' => $this->getFileUrlWithVersionStamp(Customization::getOriginalLogoPath()),
                'xPoint' => Customization::findOrFailByKey(Customization::KEY_LOGO_X_POINT)->getTypedValue(),
                'yPoint' => Customization::findOrFailByKey(Customization::KEY_LOGO_Y_POINT)->getTypedValue(),
                'width' => Customization::findOrFailByKey(Customization::KEY_LOGO_WIDTH)->getTypedValue(),
                'height' => Customization::findOrFailByKey(Customization::KEY_LOGO_HEIGHT)->getTypedValue(),
            ],
        ];
    }

    /**
     * @param Request $request
     * @param string $fieldName
     * @return $this
     */
    private function removeVersionStampFromRequest(Request $request, string $fieldName)
    {
        $request->merge([$fieldName => preg_replace('/\?v.+/', '', $request->input($fieldName, ''))]);
        return $this;
    }

    /**
     * @param string $filePathInStorage
     * @return string
     */
    private function getFileUrlWithVersionStamp(string $filePathInStorage)
    {
        return  $this->fileSystem->url($filePathInStorage) . '?v=' . time();
    }
}
