<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogicielCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logiciel_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->text('comment')->nullable();
            // $table->integer('logicielsCategories_id')->nullable()->default('0');
            // $table->text('Completename')->nullable();
            // $table->integer('level')->nullable()->default('0');
            // $table->longText('ancestorsk_cache')->nullable();
            // $table->longText('sons_cache')->nullable();
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
        Schema::dropIfExists('logiciel_categories');
    }
}
