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
$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    static $password;
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
})->define(App\Models\User::class, function (Faker\Generator $faker) {
    static $password;
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
})->define(App\Models\Hotel::class, function (Faker\Generator $faker) {
    return [
        'code' => strtoupper($faker->bankAccountNumber),
        'name' => $faker->name,
        'address' => $faker->address,
        'remarks' => $faker->title,
        'phone' => $faker->phoneNumber,
        'status' => 'Active',
        'limit_members' => $faker->randomDigit,
        'email' => $faker->unique()->safeEmail,
    ];
})->define(App\Models\Employee::class, function (Faker\Generator $faker) {
    return [
        'code' => strtoupper($faker->randomAscii),
        'name' => $faker->name,
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
        'password' => str_random(10),
        'status' => 'Active',
        'expired_date' => $faker->dateTime,
        'user_id' => random_int(0,10),
        'avatar' => $faker->imageUrl(480),
        'email' => $faker->unique()->safeEmail,
        'is_super'=>$faker->boolean
    ];
});