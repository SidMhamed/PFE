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
            $table->tinyInteger('is_recursive')->default('0');
            $table->string('name')->nullable();
            $table->string('contact')->nullable();
            $table->string('contact_num')->nullable();
            $table->integer('users_id_tech')->default('0');
            $table->integer('groups_id_tech')->default('0');
            $table->string('serial')->nullable();
            $table->string('otherserial')->nullable();
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
            $table->tinyInteger('is_global')->default('0');
            $table->tinyInteger('is_deleted')->default('0');
            $table->tinyInteger('is_template')->default('0');
            $table->string('template_name')->nullable();
            $table->integer('init_pages_couter')->default('0');
            $table->integer('last_pages_counter')->default('0');
            $table->integer('users_id')->default('0');
            $table->integer('groups_id')->default('0');
            $table->integer('states')->default('0');
            $table->integer('ticket_tco')->default('0');
            $table->integer('is_dynamic')->default('0');
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
