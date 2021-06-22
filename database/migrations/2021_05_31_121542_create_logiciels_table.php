<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogicielsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logiciels', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('comment')->nullable();
            $table->unsignedBigInteger('locations_id')->nullable()->default('0');
            $table->unsignedBigInteger('users_id')->nullable()->default('0');
            $table->tinyInteger('is_update')->nullable()->default('0');
            $table->integer('logiciels_id')->nullable()->default('0');
            $table->unsignedBigInteger('fabricant_id')->nullable()->default('0');
            $table->tinyInteger('is_deleted')->nullable()->default('0');
            $table->tinyInteger('is_template')->nullable()->default('0');
            $table->integer('template_name')->nullable()->default('0');
            $table->decimal('ticket_tco')->nullable()->default('0.000');
            $table->tinyInteger('is_helpdesk_visible')->default('1');
            $table->unsignedBigInteger('LogicielCategories_id')->default('0');
            $table->tinyInteger('is_valid')->default('1');
            $table->timestamps();

            $table->foreign('LogicielCategories_id')->references('id')->on('logiciel_categories')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('users_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('fabricant_id')->references('id')->on('glpi_fabricants')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('locations_id')->references('id')->on('glpi_locations')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('logiciels');
    }
}
