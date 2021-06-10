<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumenttypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documenttypes', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('ext')->nullable();
            $table->string('icon')->nullable();
            $table->string('mime')->nullable();
            $table->tinyInteger('is_uploadable')->default('1');
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
        Schema::dropIfExists('documenttypes');
    }
}
