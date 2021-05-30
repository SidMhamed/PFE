<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statuts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('entities_id')->nullable()->default('0');
            $table->string('comment')->nullable();
            $table->text('completename')->nullable();
            $table->integer('level')->nullable()->default('0');
            $table->string('ancestors_cache')->nullable()->default('text');
            $table->string('sons_cache')->nullable()->default('text');
            $table->tinyInteger('is_visible_computer')->nullable()->default('1');
            $table->tinyInteger('is_visible_moniteur')->nullable()->default('1');
            $table->tinyInteger('is_visible_network')->nullable()->default('1');
            $table->tinyInteger('is_visible_peripherique')->nullable()->default('1');
            $table->tinyInteger('is_visible_telephone')->nullable()->default('1');
            $table->tinyInteger('is_visible_impriment')->nullable()->default('1');
            $table->tinyInteger('is_visible_softwareversion')->nullable()->default('1');
            $table->tinyInteger('is_visible_softwarelicense')->nullable()->default('1');
            $table->tinyInteger('is_visible_line')->nullable()->default('1');
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
        Schema::dropIfExists('statuts');
    }
}
