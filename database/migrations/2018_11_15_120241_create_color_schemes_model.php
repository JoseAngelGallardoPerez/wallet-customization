<?php

use App\Models\ColorSchema;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColorSchemesModel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        foreach ($this->getData() as $item) {
            $item['colors'] = json_encode($item['colors']);
            ColorSchema::create($item);
        }
    }

    /**
     * @return array
     */
    private function getData()
    {
        return [
            [
                'name' => 'Default',
                'is_active' => true,
                'is_default' => true,
                'colors' => [
                    ColorSchema::KEY_HEADER_BACKGROUND => '#94c117',
                    ColorSchema::KEY_HEADER_ELEMENTS => '#94c317',
                    ColorSchema::KEY_HEADER_BOTTOM_LINE => '#943817',
                    ColorSchema::KEY_MENU_BACKGROUND => '#94c417',
                    ColorSchema::KEY_MENU_ELEMENTS => '#946817',
                    ColorSchema::KEY_NON_ACTIVE_MENU_ICONS => '#98c817',
                    ColorSchema::KEY_MAIN_COLOR => '#949817',
                    ColorSchema::KEY_LOGIN_FOOTER => '#90c817',
                    ColorSchema::KEY_LOGIN_PAGE_MIDDLE => '#92c817',
                ],
            ],
        ];
    }
}
