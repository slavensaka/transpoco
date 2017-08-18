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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Test::class, function (Faker\Generator $faker) {
	$userCount = \App\User::all()->count();
	$user_id = $faker->numberBetween(1, $userCount);
    return [
        'test_name' => $faker->word,
        'intro' => $faker->word,
        'conclusion' => $faker->sentence,
        'intro_image' => $faker->imageUrl($width = 100, $height = 100),
        'user_id' => $user_id,
    ];
});

$factory->define(App\Question::class, function (Faker\Generator $faker) {
	$testCount = \App\Test::all()->count();
	$test_id = $faker->numberBetween(1, $testCount);
    return [
        'question' => $faker->sentence,
        'points' => $faker->numberBetween(1,10),
        'test_id' => $test_id,
    ];
});

$factory->define(App\Answer::class, function (Faker\Generator $faker) {
	$questionCount = \App\Question::all()->count();
	$question_id = $faker->numberBetween(1, $questionCount);
    return [
        'answer' => $faker->sentence,
        'correct' => 0,
        'question_id' => $question_id,
    ];
});