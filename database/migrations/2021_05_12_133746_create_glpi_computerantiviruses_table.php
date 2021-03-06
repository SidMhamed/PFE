<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGlpiComputerantivirusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('glpi_computerantiviruses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('computers_id')->default('0');
            $table->string('name')->nullable();
            $table->unsignedBigInteger('fabricant_id')->default('0');
            $table->string('antivirus_version')->nullable();
            $table->string('signature_version')->nullable();
            $table->tinyInteger('is_active')->default('0');
            $table->tinyInteger('is_deleted')->default('0');
            $table->tinyInteger('is_uptodate')->default('0');
            $table->tinyInteger('is_dynamic')->default('0');
            $table->timestamp('date_expiration')->NULL();
            $table->timestamps();

            $table->foreign('computers_id')->references('id')->on('glpi_computers')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('fabricant_id')->references('id')->on('glpi_fabricants')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('glpi_computerantiviruses');
    }
}
