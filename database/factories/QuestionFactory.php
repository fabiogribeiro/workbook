<?php

use Faker\Generator as Faker;

$factory->define(App\Question::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(6, true) . '?',
        'question_data' => function(array $challenge) use(&$faker) {
            /**
             * A App\Question is a question with a numeric
             * answer or, alternatively, a multiple choice
             * question.
             */

            $isNumeric = $faker->boolean;

            if ($isNumeric) {
                $answer = $faker->randomFloat(2, -5, 5);

                return compact('answer');
            }
            else {
                $choices = ['A', 'B', 'C', 'D'];
                $answer = $faker->randomElement($choices);

                return compact('choices', 'answer');
            }
        }
    ];
});
