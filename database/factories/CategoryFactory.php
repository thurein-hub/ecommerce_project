<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Illuminate\Http\File;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Storage;

$factory->define(Category::class, function (Faker $faker) {
    $photo= $faker->image();
    $imageFile = new File($photo);
    return [
        'name' => $faker->word(),
        'photo' => Storage::disk('public')->putFile('categoryimg', $imageFile),
        // 'photo' => $faker->image(public_path('categoryimg'), $width = 640, $height = 480, null , true),
    ];
});
