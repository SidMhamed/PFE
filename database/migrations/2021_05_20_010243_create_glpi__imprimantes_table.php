<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGlpiImprimantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('glpi__imprimantes', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('serial')->nullable();
            $table->string('otherserial')->nullable();
            $table->string('Usager')->nullable();
            $table->string('UsagerNumero')->nullable();
            $table->tinyInteger('have_serial')->default('0');
            $table->tinyInteger('have_parallel')->default('0');
            $table->tinyInteger('have_usb')->default('0');
            $table->tinyInteger('have_wifi')->default('0');
            $table->tinyInteger('have_ethernet')->default('0');
            $table->text('comment')->nullable();
            $table->string('memory_size')->nullable();
            $table->integer('locations_id')->default('0');
            $table->integer('networks_id')->default('0');
            $table->integer('printertype_id')->default('0');
            $table->integer('printermodels_id')->default('0');
            $table->integer('manufacturers_id')->default('0');
            $table->integer('init_pages_couter')->default('0');
            $table->integer('last_pages_counter')->default('0');
            $table->integer('users_id')->default('0');
            $table->integer('states')->default('0');
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
        Schema::dropIfExists('glpi__imprimantes');
    }
}
