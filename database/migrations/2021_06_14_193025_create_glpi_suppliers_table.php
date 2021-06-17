<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGlpiSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('glpi_suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->unsignedBigInteger('suppliertypes_id')->default('0');
            $table->text('address')->nullable();
            $table->string('postcode')->default('0');
            $table->string('town')->default('0');
            $table->string('state')->default('0');
            $table->string('country')->nullable();
            $table->string('website')->nullable();
            $table->string('phonenumber')->default('0');
            $table->string('email')->nullable();
            $table->string('fax')->default('0');
            $table->tinyInteger('is_active');
            $table->text('comment')->nullable();
            $table->timestamps();



            $table->foreign('suppliertypes_id')->references('id')->on('glpi_suppliertypes')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('glpi_suppliers');
    }
}
