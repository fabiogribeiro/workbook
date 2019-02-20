<?php

use Faker\Generator as Faker;

$factory->define(App\Subject::class, function (Faker $faker) {
    return [
        'domain' => $faker->randomElement(array('math','physics','chemistry')),
        'title' => $faker->sentence(2, true),
        'slug' => function(array $subject) {
            return str_slug($subject['title']);
        }
    ];
});
