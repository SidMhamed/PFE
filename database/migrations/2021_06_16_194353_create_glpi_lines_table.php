<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGlpiLinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('glpi_lines', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('caller_num')->nullable();
            $table->string('caller_name')->nullable();
            $table->unsignedBigInteger('lineoperators_id')->default('0');
            $table->unsignedBigInteger('users_id')->default('0');
            $table->unsignedBigInteger('location_id')->default('0');
            $table->unsignedBigInteger('states_id')->default('0');
            $table->unsignedBigInteger('linetypes_id')->default('0');
            $table->text('comment')->nullable();
            $table->timestamps();

            $table->foreign('lineoperators_id')->references('id')->on('glpi_lineoperators')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('users_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('location_id')->references('id')->on('glpi_locations')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('states_id')->references('id')->on('glpi_statuts')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('linetypes_id')->references('id')->on('glpi_linetypes')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('glpi_lines');
    }
}
