<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGlpiProfilesUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('glpi_profiles_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_id')->default('0');
            $table->unsignedBigInteger('profiles_id')->default('0');
            $table->integer('entities_id')->default('0');
            $table->tinyInteger('is_recursive')->default('1');
            $table->tinyInteger('is_dynamic')->default('0');
            $table->tinyInteger('is_default_profile')->default('0');
            $table->timestamps();

            $table->foreign('users_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('profiles_id')->references('id')->on('glpi_profiles')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('glpi_profiles_users');
    }
}
