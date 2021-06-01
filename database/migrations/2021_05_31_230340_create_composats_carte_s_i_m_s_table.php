<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComposatsCarteSIMSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('composats_carte_s_i_m_s', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable()->default('text');
            $table->text('comment')->nullable();
            $table->integer('entities_id')->nullable()->default('0');
            $table->tinyInteger('is_recursive')->nullable()->default('0');
            $table->unsignedBigInteger('fabricant_id')->nullable()->default('0');
            $table->integer('voltage')->nullable();
            $table->unsignedBigInteger('devicesimcardtypes_id')->nullable()->default('0');
            $table->tinyInteger('allow_voip')->nullable()->default('0');
            $table->timestamps();

            $table->foreign('fabricant_id')->references('id')->on('glpi_fabricants')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('devicesimcardtypes_id')->references('id')->on('type_carte_s_i_m_s')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('composats_carte_s_i_m_s');
    }
}
