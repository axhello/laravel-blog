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

$factory->define(App\Article::class, function (Faker\Generator $faker) {
    $user_ids = \App\User::lists('id')->toArray();
    $cate_ids = \App\Category::lists('id')->toArray();
    return [
        'user_id' => $faker->randomElement($user_ids),
        'cate_id' => $faker->randomElement($cate_ids),
        'title' => $faker->sentence,
        'thumbnail' => $faker->imageUrl(500,500),
        'content_raw' => $faker->paragraph,
    ];
});

$factory->define(App\Tag::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
    ];
});

$factory->define(App\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'sort' => 0,
    ];
});

$factory->define(App\Comment::class, function (Faker\Generator $faker) {
    $article_ids = \App\Article::lists('id')->toArray();
    return [
        'username' => $faker->userName,
        'email' => $faker->email,
        'ip' => $faker->ipv4,
        'website' => $faker->url,
        'content' => $faker->paragraph,
        'article_id' => $faker->randomElement($article_ids),
    ];
});
