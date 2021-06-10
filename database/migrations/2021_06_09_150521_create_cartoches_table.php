<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartochesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cartoches', function (Blueprint $table) {
            $table->id();
            $table->integer('entities_id')->default('0');
            $table->integer('cartridgeitems_id')->default('0');
            $table->integer('printers_id')->default('0');
            $table->date('date_in')->nullable();
            $table->date('date_use')->nullable();
            $table->date('date_out')->nullable();
            $table->integer('pages')->default('0');
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
        Schema::dropIfExists('cartoches');
    }
}
