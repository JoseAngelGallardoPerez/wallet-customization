<?php

namespace App\Console\Command;

use Illuminate\Console\Command;
use App\Services\CssManager;

/**
 * Class GenerateCustomCssFile
 * @package App\Console\Command
 */
class GenerateCustomCssFile extends Command
{
    /**
     * @var string
     */
    protected $signature = 'make:custom-css';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate custom css file';

    /**
     * @var CssManager
     */
    private $cssManager;

    /**
     * GenerateCustomCssFile constructor.
     * @param CssManager $cssManager
     */
    public function __construct(CssManager $cssManager)
    {
        parent::__construct();
        app('app')->configure('filesystems');
        $this->cssManager = $cssManager;
    }

    /**
     * @return mixed
     */
    public function handle()
    {
        $this->cssManager->generateCustomCssFile();
    }
}
