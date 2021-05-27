<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGlpiComputermodelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('glpi_computermodels', function (Blueprint $table) {
            $table->id();
            $table->string('Nom');
            $table->string('Numero_du_produit')->default('NULL')->NULL();
            $table->integer('Poids')->default('0');
            $table->integer('Unites_requises')->default('1');
            $table->float('Profondeur')->default('1');
            $table->integer('ConnexionDalimentation')->default('0');
            $table->integer('Puissance_consommee')->default('0');
            $table->tinyInteger('DemieLargeur')->default('0');
            $table->text('photoface')->NULL();
            $table->text('PhotoArriere')->NULL();
            $table->text('comment')->NULL();
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
        Schema::dropIfExists('glpi_computermodels');
    }
}
