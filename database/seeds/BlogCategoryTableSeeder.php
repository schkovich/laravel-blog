<?php

use Illuminate\Database\Seeder;

class BlogCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('LaravelBlog\BlogCategory', 26)->create();
    }
}
