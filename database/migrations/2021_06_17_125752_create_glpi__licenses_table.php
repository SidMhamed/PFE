<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGlpiLicensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('glpi__licenses', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->unsignedBigInteger('statut_id')->default('0');
            $table->unsignedBigInteger('locations_id')->default('0');
            $table->unsignedBigInteger('softwares_id')->default('0');
            $table->unsignedBigInteger('softwarelicensetypes_id')->default('0');
            $table->unsignedBigInteger('users_id')->default('0');
            $table->string('serial')->nullable();
            $table->string('number')->nullable();
            $table->text('comment')->nullable();
            $table->date('expire');
            $table->timestamps();

            $table->foreign('users_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('locations_id')->references('id')->on('glpi_locations')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('softwares_id')->references('id')->on('logiciels')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('statut_id')->references('id')->on('statuts')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('softwarelicensetypes_id')->references('id')->on('glpi_type__licenses')->onUpdate('cascade')->onDelete('cascade');


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
        Schema::dropIfExists('glpi__licenses');
    }
}
