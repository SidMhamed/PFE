<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsCarteSIMSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items_carte_s_i_m_s', function (Blueprint $table) {
            $table->id();
            $table->integer('items_id')->nullable()->default('0');
            $table->string('itemstype')->nullable();
            $table->tinyInteger('devicesimcards_id')->default('0');
            $table->tinyInteger('is_deleted')->default('0');
            $table->tinyInteger('is_dynamic')->default('0');
            $table->tinyInteger('entities_id')->default('0');
            $table->tinyInteger('is_recursive')->default('0');
            $table->string('serial')->nullable()->default('NULL');
            $table->string('otherserial')->nullable()->default('NULL');
            $table->unsignedBigInteger('states_id')->nullable()->default('0');
            $table->unsignedBigInteger('locations_id')->nullable()->default('0');
            $table->integer('lines_id')->nullable()->default('0');
            $table->unsignedBigInteger('users_id')->nullable()->default('0');
            $table->unsignedBigInteger('groups_id')->nullable()->default('0');
            $table->string('pin')->nullable();
            $table->string('pin2')->nullable();
            $table->string('puk')->nullable();
            $table->string('puk2')->nullable();
            $table->string('msin');
            $table->timestamps();

            $table->foreign('users_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('locations_id')->references('id')->on('glpi_locations')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('groups_id')->references('id')->on('glpi_groups')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('items_carte_s_i_m_s');
    }
}
