<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGlpiMaterielReseauxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('glpi__materiel_reseauxes', function (Blueprint $table) {
            $table->id();
            $table->string('nom')->nullable();
            $table->unsignedBigInteger('locations_id')->default('0');
            $table->integer('UsagerNumero')->default('0');
            $table->string('Usager')->nullable();
            $table->string('Utilisateur')->nullable();
            $table->unsignedBigInteger('users_id')->default('0');
            $table->integer('autoupdatesystems_id')->default('0');
            $table->integer('states_id')->default('0');
            $table->unsignedBigInteger('MaterielReseauTypes_id')->default('0');
            $table->unsignedBigInteger('fabricant_id')->default('0');
            $table->unsignedBigInteger('MaterielReseauModels_id')->default('0');
            $table->string('numeroDeSerie')->nullable();
            $table->string('NumeroDinventaire')->nullable();
            $table->unsignedBigInteger('networks_id')->default('0');
            $table->text('comment')->nullable();
            $table->timestamps();

            $table->foreign('networks_id')->references('id')->on('glpi_reseauxes')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('locations_id')->references('id')->on('glpi_locations')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('users_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('MaterielReseauTypes_id')->references('id')->on('glpi__materiel__reseaux_types')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('fabricant_id')->references('id')->on('glpi_fabricants')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('MaterielReseauModels_id')->references('id')->on('glpi__materiel__reseaux_modeles')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('glpi__materiel_reseauxes');
    }
}
