<?php

namespace App\Errors\Validation;

/**
 * Class Factory
 * @package App\Errors\Validation
 */
class Factory
{
    /**
     * @param string $attributeName
     * @param array $errorTexts
     * @param array $rules
     * @return AbstractValidationError
     */
    public static function make(string $attributeName, array $errorTexts, array $rules)
    {
        $firstError = $errorTexts[0];
        $baseErrorPath = '\App\Errors\Validation\\';
        reset($rules);
        $validatorName = key($rules);

        // if validator is class, take the last part
        if (class_exists($validatorName)) {
            $path = explode('\\', $validatorName);
            $validatorName = array_pop($path);
        }

        $className = $baseErrorPath . $validatorName;

        if (!class_exists($className)) {
            $className = $baseErrorPath . 'Stub';
        }

        /** @var \App\Errors\Validation\AbstractValidationError $error */
        $error = new $className($firstError);
        $error
            ->setSource($attributeName)
            ->setTitle($firstError);

        $firstRuleParams = array_shift($rules);
        if (!empty($firstRuleParams)) {
            $error->addMeta(strtolower($validatorName), implode(', ', $firstRuleParams));
        }

        return $error;
    }
}