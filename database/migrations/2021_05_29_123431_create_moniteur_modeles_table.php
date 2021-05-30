<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoniteurModelesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moniteur_modeles', function (Blueprint $table) {
            $table->id();
            $table->string('Nom');
            $table->string('Numero_du_produit')->nullable();
            $table->integer('Poids')->default('0');
            $table->integer('Unites_requises')->default('1');
            $table->float('Profondeur')->default('1');
            $table->integer('ConnexionDalimentation')->default('0');
            $table->integer('Puissance_consommee')->default('0');
            $table->tinyInteger('DemieLargeur')->default('0');
            $table->text('photoface')->nullable();
            $table->text('PhotoArriere')->nullable();
            $table->text('comment')->nullable();
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
        Schema::dropIfExists('moniteur_modeles');
    }
}
