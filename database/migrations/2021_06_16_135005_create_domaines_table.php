<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDomainesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domaines', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->unsignedBigInteger('domaintypes_id')->default('0');
            $table->timestamp('date_creation')->nullable();
            $table->timestamp('date_expiration')->nullable();
            $table->string('tech')->default('0');
            $table->string('others')->nullable();
            $table->text('comment');
            $table->timestamps();

            $table->foreign('domaintypes_id')->references('id')->on('domaines_types')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('domaines');
    }
}
