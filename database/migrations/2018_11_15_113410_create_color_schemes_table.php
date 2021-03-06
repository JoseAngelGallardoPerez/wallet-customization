<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColorSchemesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('color_schemes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 64)->unique();
            $table->boolean('is_active')->default(0);
            $table->boolean('is_default')->default(0);
            $table->text('colors');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('color_schemes');
    }
}
