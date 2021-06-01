<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGlpiMoniteursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('glpi__moniteurs', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->integer('statut_id')->default('0');
            $table->unsignedBigInteger('locations_id')->default('0');
            $table->unsignedBigInteger('Moniteurtypes_id')->default('0');
            $table->integer('users_id_tech')->default('0');
            $table->unsignedBigInteger('fabricant_id')->default('0');
            $table->integer('groups_tech')->default('0');
            $table->unsignedBigInteger('Moniteurmodels_id')->default('0');
            $table->unsignedBigInteger('groups_id')->default('0');
            $table->string('UsagerNumero')->nullable();
            $table->string('Usager')->nullable();
            $table->string('NumeroDeSerie')->nullable();
            $table->string('Utilisateur')->nullable();
            $table->unsignedBigInteger('users_id')->default('0');
            $table->integer('TypeDeGestion')->default('0');
            $table->string('Taille')->nullable();
            $table->tinyInteger('Microphone')->default('0');
            $table->tinyInteger('Sub-D')->default('0');
            $table->tinyInteger('DVI')->default('0');
            $table->tinyInteger('HDMI')->default('0');
            $table->tinyInteger('Enceints')->default('0');
            $table->tinyInteger('BNC')->default('0');
            $table->tinyInteger('Pivot')->default('0');
            $table->tinyInteger('DisplayPort')->default('0');
            $table->text('comment')->nullable();
            $table->timestamps();

            $table->foreign('users_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('locations_id')->references('id')->on('glpi_locations')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('fabricant_id')->references('id')->on('glpi_fabricants')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('groups_id')->references('id')->on('glpi_groups')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('Moniteurmodels_id')->references('id')->on('moniteur_modeles')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('Moniteurtypes_id')->references('id')->on('moniteur_types')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('glpi__moniteurs');
    }
}
