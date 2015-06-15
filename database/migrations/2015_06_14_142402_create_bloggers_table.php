<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBloggersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bloggers', function (Blueprint $table) {
            $table->engine = 'InnoDB';
		    $table->increments('id')->unsigned();
	        $table->string('name');
	        $table->string('username')->unique(); // used for slug.
//	        @see http://www.rfc-editor.org/errata_search.php?rfc=3696&eid=1690
	        $table->string('email', 254)->unique();
	        $table->string('password', 60);
	        $table->string('confirmation_code', 32);
	        $table->boolean('confirmed')->default(false);
	        $table->boolean('admin')->default(false);
	        $table->rememberToken();
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
        Schema::dropIfExists('bloggers');
    }
}
