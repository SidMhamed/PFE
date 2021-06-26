<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGlpiPeripheriquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('glpi__peripheriques', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->integer('statut_id')->nullable()->default('0');
            $table->unsignedBigInteger('locations_id')->nullable()->default('0');
            $table->unsignedBigInteger('Peripheriquetypes_id')->nullable()->default('0');
            $table->unsignedBigInteger('fabricant_id')->nullable()->default('0');
            $table->unsignedBigInteger('Peripheriquemodels_id')->nullable()->default('0');
            $table->string('UsagerNumero')->nullable();
            $table->string('Usager')->nullable();
            $table->string('NumeroDeSerie')->nullable();
            $table->string('NumeroDenventaire')->nullable();
            $table->unsignedBigInteger('users_id')->nullable()->default('0');
            $table->integer('TypeDeGestion')->nullable()->default('0');
            $table->string('Marque')->nullable();
            $table->text('comment')->null();
            $table->timestamps();

            $table->foreign('users_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('fabricant_id')->references('id')->on('glpi_fabricants')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('Peripheriquemodels_id')->references('id')->on('model_peripheriques')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('Peripheriquetypes_id')->references('id')->on('types_peripheriques')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('locations_id')->references('id')->on('glpi_locations')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('glpi__peripheriques');
    }
}
