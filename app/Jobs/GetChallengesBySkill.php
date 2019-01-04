<?php

namespace App\Jobs;

use Illuminate\Foundation\Bus\Dispatchable;

use App\Subject;
use App\Challenge;

class GetChallengesBySkill
{
    use Dispatchable;

    /**
     * Subject the challenges belong to
     * 
     * @var \App\Subject
     */
    private $SUBJECT;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Subject $subject)
    {
        $this->SUBJECT = $subject;
    }

    /**
     * Execute the job.
     *
     * @return void
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
