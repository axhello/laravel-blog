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

$factory->define(\App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => str_random(10),
        'remember_token' => str_random(10),
    ];
});

$factory->define(\App\Models\Article::class, function (Faker\Generator $faker) {
    $user_ids = \App\User::lists('id')->toArray();
    $cate_ids = \App\Models\Category::lists('id')->toArray();
    return [
        'user_id' => $faker->randomElement($user_ids),
        'cate_id' => $faker->randomElement($cate_ids),
        'title' => $faker->sentence,
        'thumbnail' => $faker->imageUrl(500,500),
        'content_raw' => $faker->paragraph,
    ];
});

$factory->define(\App\Models\Tag::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
    ];
});

$factory->define(\App\Models\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'sort' => 0,
    ];
});
