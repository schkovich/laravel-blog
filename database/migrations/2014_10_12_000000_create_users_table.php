<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::dropIfExists('users');
//        Schema::create('users', function (Blueprint $table) {
//	        $table->engine = 'InnoDB';
//            $table->increments('id')->unsigned();
//            $table->string('name');
//            $table->string('email', 254)->unique();
//            $table->string('password', 60);
//	        $table->string('confirmation_code');
//	        $table->boolean('confirmed')->default(false);
//	        $table->boolean('admin')->default(false);
//	        $table->rememberToken();
//	        $table->timestamps();
//        });
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
