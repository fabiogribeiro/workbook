<?php

use Faker\Generator as Faker;
use App\Faker\Question;

$factory->define(App\Challenge::class, function (Faker $faker) {
    $faker->addProvider(new Question($faker));

    return [
        'title' => $faker->sentence(2, true),
        'body' => $faker->paragraphs($faker->randomNumber(1), true),
        'body_html' => function(array $challenge) {
            return (new Parsedown())->text($challenge['body']);
        },
        'questions' => json_encode($faker->questions(3)),
        'skill' => $faker->randomElement(array('Skill 1', 'Skill 2', 'Skill 3', 'Skill 4')),
        'slug' => function(array $challenge) {
            return str_slug($challenge['title']);
        }
    ];
});
