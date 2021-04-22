<?php

namespace App\Errors;

class Error extends \Error
{
    const TARGET_COMMON = 'common';
    const TARGET_FIELD = 'field';

    protected $title = '';
    protected $errorCode = '';
    protected $meta = [];
    protected $source = '';
    protected $target = self::TARGET_COMMON;

    public function getTitle()
    {
        return $this->title;
    }

    public function getMess()
    {
        return parent::getMessage();
    }

    /**
     * @return string
     */
    public function getErrorCode(): string
    {
        return $this->errorCode;
    }

    /**
     * @return array
     */
    public function getMeta(): array
    {
        return $this->meta;
    }

    /**
     * @return string
     */
    public function getSource(): string
    {
        return $this->source;
    }

    /**
     * @return string
     */
    public function getTarget(): string
    {
        return $this->target;
    }

    /**
     * @param string $source
     * @return $this
     */
    public function setSource(string $source)
    {
        $this->source = $source;
        return $this;
    }

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
        return $this;
    }

    public function addMeta(string $key, $value)
    {
        $this->meta[$key] = $value;
        return $this;
    }
}
