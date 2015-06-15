<?php

use Illuminate\Database\Seeder;

class PhotoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('LaravelBlog\Photo', 54)->create(['language_id' => 1, 'blogger_id' => 4, 'album_id' => 3]);
    }
}
