<?php

use Faker\Generator as Faker;
use Carbon\Carbon;
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
/*
****faker是一个假数据生成库，sentence（）是faker提供的API，随机生成小段落文本，用来填充introduce个人简介字段
*****carbon是datetime的一个简单扩展，使用now（）和todatetimestring()来创建格式正常的时间戳

 */
$factory->define(App\Models\User::class, function (Faker $faker) {

	static $password;
    $now = Carbon::now()->toDateTimeString();

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('password'),
        'remember_token' => str_random(10),
        'introduction' => $faker->sentence(),
        'created_at' => $now,
        'updated_at' => $now,
    ];
});
