<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGlpiComputersItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('glpi_computers_items', function (Blueprint $table) {
            $table->id();
            $table->integer('items_id')->default('0');
            $table->unsignedBigInteger('computers_id')->default('0');
            $table->string('itemtype')->NotNull();
            $table->tinyInteger('is_deleted')->default('0');
            $table->tinyInteger('is_dynamic')->default('0');
            $table->timestamps();

            $table->foreign('computers_id')->references('id')->on('glpi_computers')->onUpdate('cascade')->onDelete('cascade');
            Schema::disableForeignKeyConstraints();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('glpi_computers_items');
    }
}
