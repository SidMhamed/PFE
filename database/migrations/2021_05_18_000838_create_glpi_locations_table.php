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
            $table->string('Nom')->nullable();
            $table->integer('location_id')->default('0')->index();
            $table->text('commentaires')->nullable();
            $table->integer('Etat')->default('0');
            $table->text('address')->nullable();
            $table->string('codeposte')->nullable();
            $table->string('ville')->nullable();
            $table->string('EmplacementsSurCarte')->nullable();
            $table->string('pays')->nullable();
            $table->string('NumeroDeBatiment')->nullable();
            $table->string('NumeroDePiece')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('altitude')->nullable();
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
