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
                }
            });
    }
}
