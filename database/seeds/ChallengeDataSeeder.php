<?php

use Illuminate\Database\Seeder;

class ChallengeDataSeeder extends Seeder
{
    /**
     * The number of subjects to populate the database.
     * 
     * @var int
     */
    protected const NUM_SUBJECTS = 10;

    /**
     * The number of challenges belonging to each subject.
     * 
     * @var int
     */
    private const CHALLENGES_PER_SUBJECT = 6;

    /**
     * The number of questions belonging to each challenge.
     *
     * @var int
     */
    private const QUESTIONS_PER_CHALLENGE = 3;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Subject::class, self::NUM_SUBJECTS)
            ->create()
            ->each(function($subject) {
                $challenges = factory(App\Challenge::class, self::CHALLENGES_PER_SUBJECT)
                                ->make();

                foreach ($challenges as $challenge) {
                    $subject->challenges()->save($challenge);

                    $questions = factory(App\Question::class, self::QUESTIONS_PER_CHALLENGE)
                                    ->make();

                    foreach ($questions as $question) {
                        $challenge->questions()->save($question);
                    }
                }
            });
    }
}
