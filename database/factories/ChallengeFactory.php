<?php

use Faker\Generator as Faker;

$factory->define(App\Challenge::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(2, true),
        'body' => $faker->paragraph(4, true),
        'answer' => $faker->randomElement(array('A', 'B', 'C', 'D')),
        'skill' => $faker->randomElement(array('Skill 1', 'Skill 2', 'Skill 3', 'Skill 4')),
        'slug' => function(array $challenge) {
            return str_slug($challenge['title']);
        }
    ];
});
