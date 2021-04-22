<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\ColorSchema;
use App\Models\Customization;

class UpdateCustomizations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->updateColorScheme();
        $this->createLogoSettings();
    }

    private function updateColorScheme()
    {
        /** @var ColorSchema $schema */
        $schema = ColorSchema::where('is_default', '=', 1)->firstOrFail();

        $colors = [
            ColorSchema::KEY_HEADER_BACKGROUND => '#fafafa',
            ColorSchema::KEY_HEADER_ELEMENTS => '#a3a3a3',
            ColorSchema::KEY_HEADER_BOTTOM_LINE => '#e3e3e3',
            ColorSchema::KEY_MENU_BACKGROUND => '#7A706F',
            ColorSchema::KEY_MENU_ELEMENTS => '#6A605F',
            ColorSchema::KEY_NON_ACTIVE_MENU_ICONS => '#b6b6b6',
            ColorSchema::KEY_MAIN_COLOR => '#E96E57',
            ColorSchema::KEY_LOGIN_FOOTER => '#fafafa',
            ColorSchema::KEY_LOGIN_PAGE_MIDDLE => '#fafafa',
        ];
        $schema->colors = json_encode($colors);
        $schema->save();
    }

    private function createLogoSettings()
    {
        foreach ($this->getCustomizationData() as $item) {
            Customization::create($item);
        }
    }

    /**
     * @return array
     */
    private function getCustomizationData()
    {
        return [
            [
                'key' => Customization::KEY_LOGO_X_POINT,
                'type' => Customization::TYPE_INTEGER,
                'label' => '',
                'value' => 0,
            ],
            [
                'key' => Customization::KEY_LOGO_Y_POINT,
                'type' => Customization::TYPE_INTEGER,
                'label' => '',
                'value' => 0,
            ],
            [
                'key' => Customization::KEY_LOGO_WIDTH,
                'type' => Customization::TYPE_INTEGER,
                'label' => '',
                'value' => 420,
            ],
            [
                'key' => Customization::KEY_LOGO_HEIGHT,
                'type' => Customization::TYPE_INTEGER,
                'label' => '',
                'value' => 78,
            ],
        ];
    }
}
