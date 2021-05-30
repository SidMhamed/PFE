<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGlpiGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('glpi_groups', function (Blueprint $table) {
            $table->id();
            $table->integer('entities_id')->default('0');
            $table->tinyInteger('is_recursive')->default('0');
            $table->string('name')->nullable();
            $table->text('comment')->nullable();
            $table->string('ldap_field')->nullable();
            $table->text('ldap_value')->nullable();
            $table->text('ldap_group_dn')->nullable();
            $table->integer('groups_id')->default('0');
            $table->text('completename')->nullable();
            $table->integer('level')->default('0');
            $table->longText('ancestors_cache')->nullable();
            $table->longText('sons_cache')->nullable();
            $table->tinyInteger('is_requester')->default('1');
            $table->tinyInteger('is_watcher')->default('1');
            $table->tinyInteger('is_assign')->default('1');
            $table->tinyInteger('is_task')->default('1');
            $table->tinyInteger('is_notify')->default('1');
            $table->tinyInteger('is_itemgroup')->default('1');
            $table->tinyInteger('is_usergroup')->default('1');
            $table->tinyInteger('is_manager')->default('1');
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
        Schema::dropIfExists('glpi_groups');
    }
}
