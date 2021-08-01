<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Brand;
use Illuminate\Http\File;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Storage;
$factory->define(Brand::class, function (Faker $faker) {
    $photo = $faker->image();
    $imageFile = new File($photo);

    return [
        'name' => $faker->word(),
        'logo' => Storage::disk('public')->putFile('brandimg',$imageFile),
    ];
});
