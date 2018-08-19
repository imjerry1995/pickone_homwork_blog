<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '222222', // secret
        'users_id' => str_random(10),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'authors'=> function(){
            return factory(App\User::class)->create()->users_id;
        },
        'title'=> str_random(10),
        'content'=> str_random(40),
    ];
});

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'name' => str_random(10),
        'content'=> str_random(20),
        'post_id' => function(){
            return factory(App\Post::class)->create()->id;
        },
    ];
});
