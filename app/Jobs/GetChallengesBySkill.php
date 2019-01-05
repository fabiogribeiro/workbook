<?php

namespace App\Jobs;

use Illuminate\Foundation\Bus\Dispatchable;

use App\Subject;
use App\Challenge;

class GetChallengesBySkill
{
    use Dispatchable;

    /**
     * @var \App\Subject Subject the challenges belong to
     */
    private $SUBJECT;

    /**
     * Create a new instance.
     *
     * @param \App\Subject $subject
     *
     * @return void
     */
    public function __construct(Subject $subject)
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
