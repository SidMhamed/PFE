<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGlpiGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('glpi_groups', function (Blueprint $table) {
            $table->id();
            $table->integer('entities_id')->default('0');
            $table->string('name')->nullable();
            $table->text('comment')->nullable();
            $table->tinyInteger('is_itemgroup')->default('1');
            $table->tinyInteger('is_usergroup')->default('1');
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
        Schema::dropIfExists('glpi_groups');
    }
}
