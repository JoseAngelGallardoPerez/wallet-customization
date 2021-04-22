<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\ColorSchema;

class UpdateColorSchemesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('color_schemes', function(Blueprint $table)
        {
            $table->dropUnique('color_schemes_name_unique');
        });
        $this->updateColorScheme();
    }

    private function updateColorScheme()
    {
        /** @var ColorSchema $schema */
        $schema = ColorSchema::where('is_default', '=', 1)->firstOrFail();

        $colors = [
            ColorSchema::KEY_HEADER_BACKGROUND => '#ffffff',
            ColorSchema::KEY_HEADER_ELEMENTS => '#5b5b5b',
            ColorSchema::KEY_HEADER_BOTTOM_LINE => '#e3e3e3',
            ColorSchema::KEY_MENU_BACKGROUND => '#5b5b5b',
            ColorSchema::KEY_MENU_ELEMENTS => '#b6b6b6',
            ColorSchema::KEY_NON_ACTIVE_MENU_ICONS => '#b6b6b6',
            ColorSchema::KEY_MAIN_COLOR => '#94c817',
            ColorSchema::KEY_LOGIN_FOOTER => '#fafafa',
            ColorSchema::KEY_LOGIN_PAGE_MIDDLE => '#fafafa',
        ];
        $schema->colors = json_encode($colors);
        $schema->save();
    }
}
