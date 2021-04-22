<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\ColorSchema;

class UpdateColorSchemes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->updateColorScheme();
    }

    private function updateColorScheme()
    {
        /** @var ColorSchema $schema */
        $schema = ColorSchema::where('is_default', '=', 1)->firstOrFail();

        $colors = [
            ColorSchema::KEY_HEADER_BACKGROUND => '#ffffff',
            ColorSchema::KEY_HEADER_ELEMENTS => '#5f5f5f',
            ColorSchema::KEY_HEADER_BOTTOM_LINE => '#e6e6e6',
            ColorSchema::KEY_MENU_BACKGROUND => '#3b3e42',
            ColorSchema::KEY_MENU_ELEMENTS => '#a9a9a9',
            ColorSchema::KEY_NON_ACTIVE_MENU_ICONS => '#7a7a7a',
            ColorSchema::KEY_MAIN_COLOR => '#93c817',
            ColorSchema::KEY_LOGIN_FOOTER => '#ffffff',
            ColorSchema::KEY_LOGIN_PAGE_MIDDLE => '#eeeeee',
        ];
        $schema->colors = json_encode($colors);
        $schema->save();
    }
}
