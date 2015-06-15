<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->unsignedInteger('language_id');
            $table->foreign('language_id')->references('id')->on('languages');
            $table->integer('position')->nullable();
            $table->boolean('slider')->nullable();
            $table->string('filename', 255);
            $table->string('name', 255)->nullable();
            $table->text('description')->nullable();
            $table->unsignedInteger('album_id')->nullable();
            $table->foreign('album_id')->references('id')->on('albums')->onDelete('set null');
            $table->boolean('album_cover')->nullable();
            $table->unsignedInteger('blogger_id')->nullable();
            $table->foreign('blogger_id')->references('id')->on('bloggers')->onDelete('set null');
            $table->unsignedInteger('blogger_id_edited')->nullable();
            $table->foreign('blogger_id_edited')->references('id')->on('bloggers')->onDelete('set null');
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
        Schema::dropIfExists('photos');
    }
}
