<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('filename')->nullable();
            $table->string('filepath')->nullable();
            $table->unsignedBigInteger('documentcategories_id')->nullable()->default('0');
            $table->string('mime')->nullable();
            $table->text('Comment')->nullable();
            $table->tinyInteger('is_deleted')->default('0');
            $table->string('link')->nullable();
            $table->unsignedBigInteger('users_id')->nullable()->default('0');
            $table->char('sha1sum', 40)->nullable();
            $table->tinyInteger('is_blacklisted')->default('0');
            $table->string('tag')->nullable();
            $table->timestamps();

            $table->foreign('users_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('documentcategories_id')->references('id')->on('document_categories')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('documents');
    }
}
