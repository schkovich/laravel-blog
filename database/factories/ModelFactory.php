<?php

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
        'name' => $faker->name,
	    'username' => $faker->username,
        'email' => $faker->email,
        'password' => str_random(10),
	    'confirmation_code' => str_random(32),
        'remember_token' => str_random(12),
    ];
});

$factory->defineAs('LaravelBlog\Blogger', 'admin', function ($faker) use ($factory) {
	$user = $factory->raw('LaravelBlog\Blogger');

	return array_merge($user, ['admin' => true]);
});


$factory->defineAs('LaravelBlog\Blogger', 'confirmed', function ($faker) use ($factory) {
	$user = $factory->raw('LaravelBlog\Blogger');

	return array_merge($user, ['confirmed' => true]);
});
