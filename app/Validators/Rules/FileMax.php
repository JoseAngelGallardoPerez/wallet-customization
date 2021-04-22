<?php

namespace App\Validators\Rules;

use Illuminate\Contracts\Validation\Rule;

/**
 * Class FileMax
 * @package App\Validators\Rules
 */
class FileMax implements Rule
{
    /**
     * @var float
     */
    private $max;

    /**
     * FileMax constructor.
     * @param int $max
     */
    public function __construct(int $max)
    {
        $this->max = $max;
    }

    /**
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return $this->getSize($value) <= $this->max;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute may not be greater than :max kilobytes.';
    }

    protected function getSize(\Illuminate\Http\UploadedFile $value)
    {
        return $value->getSize() / 1024;
    }
}