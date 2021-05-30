<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('fieldlist')->nullable();
            $table->string('phone')->nullable();
            $table->string('phone2')->nullable();
            $table->string('mobile')->nullable();
            $table->unsignedBigInteger('locations_id')->nullable()->default('0');
            $table->unsignedBigInteger('profiles_id')->nullable()->default('0');
            $table->char('language')->default('NULL');
            $table->integer('use_mode')->nullable()->default('0');
            $table->integer('list_limit')->nullable()->default('0');
            $table->tinyInteger('is_active')->default('1');
            $table->integer('auths_id')->nullable()->default('0');
            $table->integer('authtype')->nullable()->default('0');
            $table->timestamp('last_login')->nullable();
            $table->timestamp('date_sync')->nullable();
            $table->tinyInteger('is_deleted')->nullable()->default('0');
            $table->integer('entities_id')->nullable()->default('0');
            $table->integer('usertitles_id')->nullable()->default('0');
            $table->integer('usercategories_id')->nullable()->default('0');
            $table->char('csv_delimiter')->default('NULL');
            $table->string('api_token')->default('NULL');
            $table->timestamp('api_token_date')->nullable();
            $table->string('cookie_token')->default('NULL');
            $table->timestamp('cookie_token_date')->nullable();
            $table->unsignedBigInteger('groups_id')->nullable()->default('0');
            $table->integer('users_id_supervisor')->nullable()->default('0');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('profiles_id')->references('id')->on('glpi_profiles')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('locations_id')->references('id')->on('glpi_locations')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('users');
    }
}
