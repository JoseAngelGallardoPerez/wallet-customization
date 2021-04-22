<?php

namespace App\Validators\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Filesystem\FilesystemManager;

/**
 * Class FileExists
 * @package App\Validators\Rules
 */
class FileExists implements Rule
{
    /**
     * @var array
     */
    private $fileSystemConfig;
    /**
     * @var FilesystemManager
     */
    private $fileSystem;

    /**
     * FileExists constructor.
     * @param array $fileSystemConfig
     * @param FilesystemManager $fileSystem
     */
    public function __construct(array $fileSystemConfig, FilesystemManager $fileSystem)
    {
        $this->fileSystemConfig = $fileSystemConfig;
        $this->fileSystem = $fileSystem;
    }

    /**
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $rootUrl = $this->fileSystemConfig['disks'][$this->fileSystemConfig['default']]['url'];
        $relativePath = str_replace($rootUrl, '', $value);

        return $value && $this->fileSystem->has($relativePath);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return ':attribute file not found';
    }
}