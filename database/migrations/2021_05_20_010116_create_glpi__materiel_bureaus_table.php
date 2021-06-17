<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGlpiMaterielBureausTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('glpi__materiel_bureaus', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('color');
            $table->string('matricule')->unique();
            $table->unsignedBigInteger('users_id')->default('0');
            $table->unsignedBigInteger('location_id')->default('0');
            $table->unsignedBigInteger('states_id')->default('0');
            $table->unsignedBigInteger('fabricant_id')->default('0');
            $table->text('comment')->nullable();
            $table->timestamps();

            $table->foreign('users_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('location_id')->references('id')->on('glpi_locations')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('states_id')->references('id')->on('glpi_statuts')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('fabricant_id')->references('id')->on('glpi_fabricants')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('glpi__materiel_bureaus');
    }
}
