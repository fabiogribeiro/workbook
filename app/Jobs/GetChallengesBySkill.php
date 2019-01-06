<?php

namespace App\Jobs;

use Illuminate\Foundation\Bus\Dispatchable;

use App\Challenge;
use App\Subject;

class GetChallengesBySkill
{
    use Dispatchable;

    /**
     * @var \App\Subject Subject the challenges belong to
     */
    private $SUBJECT;

    /**
     * Create a new job instance.
     *
     * @param \App\Subject $subject
     * @return void
     */
    public function __construct($subject)
    {
        $this->SUBJECT = $subject;
    }

    /**
     * Execute the job, synchronously.
     *
     * @return array An array of the form ['SkillName' => $challengesForSkill,...]
     */
    public function handle()
    {
        $challenges = $this->SUBJECT->challenges;

        $challengesBySkill = array();

        foreach ($challenges as $challenge) {
            $challengesBySkill[$challenge->skill][] = $challenge;
        }

        return $challengesBySkill;
    }
}
