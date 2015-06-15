<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('languages', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('position')->nullable();
            $table->string('name', 50)->unique();
            $table->string('lang_code', 10)->unique();
            $table->string('icon', 255)->nullable();
            $table->unsignedInteger('blogger_id')->nullable();
            $table->foreign('blogger_id')->references('id')->on('bloggers')->onDelete('set null');
            $table->unsignedInteger('blogger_id_edited')->nullable();
            $table->foreign('blogger_id_edited')->references('id')->on('bloggers')->onDelete('set null');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('languages');
    }
}
