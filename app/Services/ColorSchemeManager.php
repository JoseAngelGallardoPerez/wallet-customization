<?php

namespace App\Services;

use App\Models\ColorSchema;
use Illuminate\Http\Request;
use Illuminate\Database\DatabaseManager;
use Illuminate\Validation\Factory as ValidatorFactory;
use Illuminate\Validation\DatabasePresenceVerifier;

/**
 * Class ColorSchemeManager
 * @package App\Services
 */
class ColorSchemeManager
{
    /**
     * @var DatabaseManager
     */
    private $db;

    /**
     * @var ValidatorFactory
     */
    private $validatorFactory;
    /**
     * @var CssManager
     */
    private $cssManager;

    /**
     * ColorSchemeManager constructor.
     * @param DatabaseManager $db
     * @param ValidatorFactory $validatorFactory
     * @param CssManager $cssManager
     */
    public function __construct(DatabaseManager $db, ValidatorFactory $validatorFactory, CssManager $cssManager)
    {
        $this->db = $db;
        $this->validatorFactory = $validatorFactory;
        $this->cssManager = $cssManager;
    }

    /**
     * @param Request $request
     * @param DatabasePresenceVerifier $presenceVerifier
     * @return ColorSchema
     * @throws \Exception
     */
    public function create(Request $request, DatabasePresenceVerifier $presenceVerifier)
    {
        $result = $this->validate($request, $presenceVerifier);

        $this->db->beginTransaction();

        $this->deactivateSchemaIfNeed($result['isActive'] ?? false);
        $newColorScheme = ColorSchema::createNewSchema($result);

        $this->db->commit();
        $this->cssManager->generateCustomCssFile();

        return $newColorScheme;
    }

    /**
     * @param Request $request
     * @param DatabasePresenceVerifier $presenceVerifier
     * @param ColorSchema|null $schema
     * @throws \Exception
     */
    public function update(Request $request, DatabasePresenceVerifier $presenceVerifier, ColorSchema $schema)
    {
        $result = $this->validate($request, $presenceVerifier, $schema);

        $this->db->beginTransaction();

        $this->deactivateSchemaIfNeed($result['isActive'] ?? false);
        $schema->updateByData($result);

        $this->db->commit();
        $this->cssManager->generateCustomCssFile();
    }

    /**
     * @param ColorSchema $schema
     * @throws \Exception
     */
    public function setAsActive(ColorSchema $schema)
    {
        $this->deactivateSchemaIfNeed(true);
        $schema->is_active = true;
        $schema->save();
        $this->cssManager->generateCustomCssFile();
    }

    /**
     * @param Request $request
     * @param DatabasePresenceVerifier $presenceVerifier
     * @param ColorSchema|null $schema
     * @return array
     * @throws \App\Exceptions\ValidationException
     */
    private function validate(Request $request, DatabasePresenceVerifier $presenceVerifier, ColorSchema $schema = null)
    {
        $messages = ['name.unique' => 'Color scheme with the same name already exists.'];
        $validator = $this->validatorFactory->make($request->all(), $this->getValidationRules($schema), $messages);
        $validator->setPresenceVerifier($presenceVerifier);

        if ($validator->fails()) {
            throw new \App\Exceptions\ValidationException($validator);
        }

        return $validator->validate();
    }

    /**
     * @param bool $isActive
     * @return void
     */
    private function deactivateSchemaIfNeed(bool $isActive)
    {
        if ($isActive) {
            $activeSchema = ColorSchema::getActive();
            $activeSchema->is_active = false;
            $activeSchema->save();
        }
    }

    /**
     * @param ColorSchema|null $schema
     * @return array
     */
    private function getValidationRules(ColorSchema $schema = null)
    {
        $rules = [
            'name' => 'required|max:255|string|min:1|unique:color_schemes,name' . ($schema ? ',' . $schema->id : ''),
            'isActive' => 'boolean',
        ];

        /** @var string $key */
        foreach (ColorSchema::getColorKeys() as $key) {
            $rules['colors.' . $key] = 'required|max:10|string';
        }

        return $rules;
    }
}
