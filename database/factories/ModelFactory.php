<?php
use LaravelBlog\Faker\Provider\Blog;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(LaravelBlog\Blogger::class, function ($faker) {
    return [
        'name'              => $faker->name,
        'username'          => $faker->username,
        'email'             => $faker->email,
//      @todo: create bcrypt generator
        'password'          => $faker->md5,
        'confirmation_code' => $faker->md5,
        'remember_token'    => $faker->md5,
    ];
});

$factory->defineAs('LaravelBlog\Blogger', 'admin', function ($faker) use ($factory) {
    $user = $factory->raw('LaravelBlog\Blogger');

    return array_merge($user, [ 'admin' => true ]);
});


$factory->defineAs('LaravelBlog\Blogger', 'confirmed', function ($faker) use ($factory) {
    $user = $factory->raw('LaravelBlog\Blogger');

    return array_merge($user, [ 'confirmed' => true ]);
});

$factory->define(LaravelBlog\Blog::class, function ($faker) {
    $faker->addProvider(new Blog($faker));
    $root = '/home/vagrant/laravel-blog/public';
    return [
        'title'        => $faker->title(6),
        'slug'         => $faker->slug,
        'introduction' => $faker->text(50),
        'content'      => $faker->text(400),
        'source'       => $faker->image($dir = "${root}/images/photos", $width = 640, $height = 480, 'cats'),
        'picture'      => $faker->image($dir = "${root}/images/photos", $width = 640, $height = 480),
    ];
});

$factory->define(LaravelBlog\BlogCategory::class, function ($faker) {
    $faker->addProvider(new Blog($faker));

    return [
        'title' => $faker->title(3),
        'slug'  => $faker->slug
    ];
});

$factory->define(LaravelBlog\Language::class, function ($faker) {
    $root = '/home/vagrant/laravel-blog/public';
    return [
        'position' => $faker->unique()->randomDigitNotNull,
        'name' => $faker->word,
        'lang_code' => $faker->unique()->languageCode,
        'icon' => $faker->image($dir = "${root}/images/languages", 'flags')
    ];
});

$factory->define(\LaravelBlog\Photo::class, function ($faker) {
    $faker->addProvider(new Blog($faker));
    $root = '/home/vagrant/laravel-blog/public';
    return [
        'position' => $faker->randomDigitNotNull,
        'slider' => $faker->boolean(25),
        'filename' => $faker->image("${root}/images/photos", 1920, 1080, 'photos', true, 'Faker'),
        'name' => $faker->title(3),
        'description' => $faker->text(250)
        ];
});

$factory->define(\LaravelBlog\Album::class, function ($faker) {
    $faker->addProvider(new Blog($faker));
    return [
        'position' => $faker->randomDigitNotNull,
        'name' => $faker->title(4),
        'description' => $faker->text(180),
        'folder_id' => str_random(120)
    ];
});
