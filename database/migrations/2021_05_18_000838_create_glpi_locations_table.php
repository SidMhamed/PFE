<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGlpiLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('glpi_locations', function (Blueprint $table) {
            $table->id();
            $table->string('Nom')->NULL();
            $table->integer('location_id')->default('0')->index();
            $table->text('commentaires')->NULL();
            $table->integer('Etat')->default('0');
            $table->text('address')->NULL();
            $table->string('codeposte')->NULL();
            $table->string('ville')->NULL();
            $table->string('EmplacementsSurCarte')->NULL();
            $table->string('pays')->NULL();
            $table->string('NumeroDeBatiment')->NULL();
            $table->string('NumeroDePiece')->NULL();
            $table->string('latitude')->NULL();
            $table->string('longitude')->NULL();
            $table->string('altitude')->NULL();
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
        Schema::dropIfExists('glpi_locations');
    }
}
