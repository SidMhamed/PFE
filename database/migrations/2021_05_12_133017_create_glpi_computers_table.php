<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGlpiComputersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('glpi_computers', function (Blueprint $table) {
            $table->id();
            $table->string('nom')->nullable();
            $table->unsignedBigInteger('locations_id')->default('0');
            $table->integer('users_id_tech')->default('0');
            $table->integer('UsagerNumero')->default('0');
            $table->string('Usager')->NULL();
            $table->string('Utilisateur')->nullable();
            $table->unsignedBigInteger('groups_id')->default('0');
            $table->unsignedBigInteger('users_id')->default('0');
            $table->integer('autoupdatesystems_id')->default('0');
            $table->integer('states_id')->default('0');
            $table->unsignedBigInteger('computertypes_id')->default('0');
            $table->unsignedBigInteger('fabricant_id')->default('0');
            $table->unsignedBigInteger('computermodels_id')->default('0');
            $table->string('numeroDeSerie')->nullable();
            $table->string('NumeroDinventaire')->nullable();
            $table->unsignedBigInteger('networks_id')->default('0');
            $table->text('comment')->nullable();
            $table->timestamps();

            $table->foreign('users_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('fabricant_id')->references('id')->on('glpi_fabricants')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('groups_id')->references('id')->on('glpi_groups')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('computermodels_id')->references('id')->on('glpi_computermodels')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('computertypes_id')->references('id')->on('glpi_computertypes')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('locations_id')->references('id')->on('glpi_locations')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('networks_id')->references('id')->on('glpi_reseauxes')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('glpi_computers');
    }

}
