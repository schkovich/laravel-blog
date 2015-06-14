<?php

use Illuminate\Database\Seeder;

class BloggerTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		factory('LaravelBlog\Blogger', 3)->create();
		factory('LaravelBlog\Blogger', 'admin', 1)->create();
		factory('LaravelBlog\Blogger', 'confirmed', 7)->create();
	}
}
