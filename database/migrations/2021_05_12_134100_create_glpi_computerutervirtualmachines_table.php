<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGlpiComputerutervirtualmachinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('glpi_computerutervirtualmachines', function (Blueprint $table) {
            $table->id();
            $table->integer('entities_id')->default('0');
            $table->unsignedBigInteger('computers_id')->default('0');
            $table->string('name');
            $table->integer('virtualmachinestates_id')->default('0');
            $table->integer('virtualmachinesystems_id')->default('0');
            $table->integer('virtualmachinetypes_id')->default('0');
            $table->string('uuid');
            $table->integer('vcpu')->default('0');
            $table->string('ram');
            $table->tinyInteger('is_deleted')->default('0');
            $table->tinyInteger('is_dynamic')->default('0');
            $table->Text('comment')->NULL();
            $table->timestamps();

            $table->foreign('computers_id')->references('id')->on('glpi_computers')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('glpi_computerutervirtualmachines');
    }
}
