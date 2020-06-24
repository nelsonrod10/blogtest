<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Post;
use Faker\Generator as Faker;
use Illuminate\Support\Arr;;

$factory->define(Post::class, function (Faker $faker) {
    $arrCollections = [1118905,778914,494263,225,3106804,539527,3657445,764827];
    
    return [
        'user_id'           => $faker->randomDigit(1),
        'type'              => 'New',
        'title'             => $faker->realText(30),
        'description'       => $faker->paragraph(),
        'slug'              => $faker->unique()->slug(),
        'publication_date'  => $faker->date(),
        'image_url'         => 'https://source.unsplash.com/collection/'.Arr::random($arrCollections).'/570x570',
    ];
});
