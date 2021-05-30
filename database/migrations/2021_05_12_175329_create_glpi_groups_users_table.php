<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGlpiGroupsUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('glpi_groups_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_id')->default('0');
            $table->unsignedBigInteger('groups_id')->default('0');
            $table->tinyInteger('is_dynamic')->default('0');
            $table->tinyInteger('is_manager')->default('0');
            $table->tinyInteger('is_userdelegate')->default('0');
            $table->timestamps();

            $table->foreign('users_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('groups_id')->references('id')->on('glpi_groups')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('glpi_groups_users');
    }
}
