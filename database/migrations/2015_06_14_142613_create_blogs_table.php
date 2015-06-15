<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBlogsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('blogs', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->unsignedInteger('language_id');
            $table->foreign('language_id')->references('id')->on('languages');
            $table->integer('position')->nullable();
            $table->unsignedInteger('blogger_id')->nullable();
            $table->foreign('blogger_id')->references('id')->on('bloggers')->onDelete('set null');
            $table->unsignedInteger('blogger_id_edited')->nullable();
            $table->foreign('blogger_id_edited')->references('id')->on('bloggers')->onDelete('set null');
            $table->unsignedInteger('blog_category_id')->nullable();
            $table->foreign('blog_category_id')->references('id')->on('blog_categories')->onDelete('set null');
            $table->string('title');
            $table->string('slug')->nullable();
            $table->text('introduction');
            $table->text('content');
            $table->string('source')->nullable();
            $table->string('picture')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('blogs');
    }
}
