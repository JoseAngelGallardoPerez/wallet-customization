<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\ColorSchema;

class UpdateColorSchemesRemoveColor extends Migration
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
        foreach (ColorSchema::all() as $schema) {
            $colors = $schema->colors;
            unset($colors[ColorSchema::KEY_NON_ACTIVE_MENU_ICONS]);
            $schema->colors = json_encode($colors);
            $schema->save();
        }
    }
}
