<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelPeripheriquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('model_peripheriques', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('Numero_du_produit')->nullable()->default('NULL');
            $table->integer('Poids')->nullable()->default('0');
            $table->integer('Unites_requises')->nullable()->default('1');
            $table->float('Profondeur')->nullable()->default('1');
            $table->integer('ConnexionDalimentation')->nullable()->default('0');
            $table->integer('Puissance_consommee')->nullable()->default('0');
            $table->tinyInteger('DemieLargeur')->nullable()->default('0');
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
        Schema::dropIfExists('model_peripheriques');
    }
}
