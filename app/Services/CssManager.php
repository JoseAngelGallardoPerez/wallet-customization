<?php

namespace App\Services;

use App\Models\ColorSchema;
use App\Models\Customization;
use Illuminate\Contracts\Filesystem\Factory as FileSystem;
use Illuminate\View\Factory as ViewFactory;
use tubalmartin\CssMin\Minifier;

/**
 * Class CssManager
 * @package App\Services
 */
class CssManager
{
    private const CSS_FOLDER = 'css';
    private const CSS_NAME = 'custom.css';

    /**
     * @var FileSystem
     */
    private $fileSystem;

    /**
     * @var ViewFactory
     */
    private $viewFactory;

    /**
     * CssManager constructor.
     * @param FileSystem $fileSystem
     * @param ViewFactory $viewFactory
     */
    public function __construct(FileSystem $fileSystem, ViewFactory $viewFactory)
    {
        $this->fileSystem = $fileSystem;
        $this->viewFactory = $viewFactory;
    }

    /**
     * @return void
     */
    public function generateCustomCssFile()
    {
        $this->copyDefaultFilesIfNeed();
        $data = [
            'logo' => [
                'path' => $this->fileSystem->url(Customization::getLogoPath()) . '?v=' . time(),
                'margin' => Customization::findOrFailByKey(Customization::KEY_LOGO_MARGIN)->getTypedValue()
            ],
            'colors' => ColorSchema::getActive()->toArray()['colors'],
        ];

        $stringData = $this->minify($this->viewFactory->make('custom-css', $data));

        $content = $this->compress($stringData);
        $this->fileSystem->put($this->getCssPath(), $content);
        $this->fileSystem->put($this->getCssPath() . '.gz', $content);
    }

    /**
     * @param string $string
     * @return string
     */
    private function minify(string $string)
    {
        $compressor = new Minifier;
        return $compressor->run($string);
    }

    /**
     * @param string $string
     * @return string
     */
    private function compress(string $string)
    {
        return gzencode($string, 9);
    }

    /**
     * @return void
     */
    private function copyDefaultFilesIfNeed()
    {
        $this
            ->copyFileIfNeed(Customization::getOriginalLogoPath(), Customization::getDefaultLogoPath())
            ->copyFileIfNeed(Customization::getFaviconPath(), Customization::getDefaultFaviconPath());
    }

    /**
     * @param string $dest
     * @param string $src
     * @return $this
     */
    private function copyFileIfNeed(string $dest, string $src)
    {
        if (!$this->fileSystem->has($dest)) {
            $this->fileSystem->copy($src, $dest);
            $this->fileSystem->setVisibility($dest, 'public');
        }

        return $this;
    }

    /**
     * @return string
     */
    private function getCssPath()
    {
        return self::CSS_FOLDER . '/' . self::CSS_NAME;
    }
}
