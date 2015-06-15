<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBlogCategoriesTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('blog_categories', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->unsignedInteger('language_id');
            $table->foreign('language_id')->references('id')->on('languages');
            $table->integer('position')->nullable();
            $table->unsignedInteger('blogger_id')->nullable();
            $table->foreign('blogger_id')->references('id')->on('bloggers')->onDelete('set null');
            $table->unsignedInteger('blogger_id_edited')->nullable();
            $table->foreign('blogger_id_edited')->references('id')->on('bloggers')->onDelete('set null');
            $table->string('title');
            $table->string('slug')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('blog_categories');
    }
}
