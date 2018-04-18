<?php
//use Faker\Generator\Generator as Faker\Generator;
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

//$factory->define(App\User::class, function (Faker\Generator $faker) {
//    return [
//        'name' => $faker->name,
//        'email' => $faker->safeEmail,
//        'password' => bcrypt(str_random(10)),
//        'remember_token' => str_random(10),
//    ];
//});

$factory->define(App\Models\Category::class, function(Faker\Generator  $faker){
    return [
        'name_vi' => $faker->words(5, true),
        'slug' => \LP_lib::unicode($faker->words(2, true)),
        'name_en' => $faker->words(5, true),
        'content_vi' => $faker->paragraph(5,true),
        'content_en' => $faker->paragraph(5, true),
        'img_url' => $faker->imageUrl(350, 350)
    ];
});

$factory->define(App\Models\Brand::class, function(Faker\Generator  $faker){
    return [
        'name_vi' => $faker->words(5, true),
        'slug' => \LP_lib::unicode($faker->words(2, true)),
        'name_en' => $faker->words(5, true),
        'content_vi' => $faker->paragraph(5, true),
        'content_en' => $faker->paragraph(5, true),
        'img_url' => $faker->imageUrl(350, 350)
    ];
});

$factory->define(App\Models\Product::class, function(Faker\Generator  $faker){
    return [
        'name_vi' => $faker->words(5, true),
        'slug' => \LP_lib::unicode($faker->words(2, true)),
        'name_en' => $faker->words(5, true),
        'sku' => strtoupper($faker->words(5, true)),
        'quantity' => 100,
        'description_vi' => $faker->paragraph(5, true),
        'description_en' => $faker->paragraph(5, true),
        'content_vi' => $faker->paragraph(5, true),
        'content_en' => $faker->paragraph(5, true),
        'price_vi' => $faker->randomNumber(6),
        'price_en' => $faker->randomNumber(3),
        'img_url' => $faker->imageUrl(350, 350)
    ];
});

$factory->define(App\Models\Company::class, function(Faker\Generator  $faker){
    return [
        'email' => $faker->email,
        'phone' => $faker->tollFreePhoneNumber,
        'address'=> $faker->streetAddress,
    ];
});

$factory->define(App\Models\Customer::class, function(Faker\Generator  $faker){
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'phone' => $faker->tollFreePhoneNumber,
        'username'=> $faker->userName,
        'password'=> bcrypt('123456')
    ];
});

$factory->define(App\Models\News::class, function(Faker\Generator  $faker){
    return [
        'title_vi' => $faker->sentence(),
        'slug' => \LP_lib::unicode($faker->words(2, true)),
        'title_en' => $faker->sentence(),
        'content_vi' => $faker->paragraph(5, true),
        'content_en' => $faker->paragraph(5, true),
        'img_url' => $faker->imageUrl(350, 350)
    ];
});

$factory->define(App\Models\Promotion::class, function(Faker\Generator  $faker){
    return [
        'title_vi' => $faker->sentence(),
        'slug' => \LP_lib::unicode($faker->words(2, true)),
        'title_en' => $faker->sentence(),
        'content_vi' => $faker->paragraph(5, true),
        'content_en' => $faker->paragraph(5, true),
        'img_url' => $faker->imageUrl(350, 350)
    ];
});

