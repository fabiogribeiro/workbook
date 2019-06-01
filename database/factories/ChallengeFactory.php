<?php

use Faker\Generator as Faker;

$factory->define(App\Challenge::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(2, true),
        'body' => $faker->paragraphs($faker->randomNumber(1), true),
        'body_html' => function(array $challenge) {
            return (new Parsedown())->text($challenge['body']);
        },
        'skill' => $faker->randomElement(array('Skill 1', 'Skill 2', 'Skill 3', 'Skill 4')),
        'slug' => function(array $challenge) {
            return str_slug($challenge['title']);
        }
    ];
});
