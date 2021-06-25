<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGlpiTelephonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('glpi__telephones', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->integer('statut_id')->default('0');
            $table->unsignedBigInteger('locations_id')->default('0');
            $table->unsignedBigInteger('telephonetypes_id')->default('0');
            $table->unsignedBigInteger('fabricant_id')->default('0');
            $table->unsignedBigInteger('telephonemodels_id')->default('0');
            $table->string('UsagerNumero')->nullable();
            $table->string('Usager')->nullable();
            $table->string('NumeroDeSerie')->nullable();
            $table->string('NumeroDinventaire')->nullable();
            $table->unsignedBigInteger('users_id')->default('0');
            $table->integer('TypeDeGestion')->default('0');
            $table->string('Marque')->nullable();
            $table->integer('Alimantation_id')->default('0');
            $table->string('Nombrelignes')->default('0');
            $table->integer('Casque')->default('0');
            $table->integer('Hautparleur')->default('0');
            $table->text('comment')->nullable();
            $table->timestamps();


            $table->foreign('users_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('fabricant_id')->references('id')->on('glpi_fabricants')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('telephonemodels_id')->references('id')->on('telephone_modeles')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('telephonetypes_id')->references('id')->on('telephone_types')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('glpi__telephones');
    }
}
