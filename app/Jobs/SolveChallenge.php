<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use App\Challenge;
use App\User;

class SolveChallenge implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var int The id of the solved challenge
     */
    private $CHALLENGE_ID;

    /**
     * @var \App\User The user that solved the challenge
     */
    private $user;


    /**
     * Create a new job instance.
     *
     * @param int $challengeId
     * @param \App\User $user
     * @return void
     */
    public function __construct($challengeId, $user)
    {
        $this->CHALLENGE_ID = $challengeId;

        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $challenge = Challenge::find($this->CHALLENGE_ID);

        if (!$challenge) return;

        $solvedChallenges = $this->user->solved_challenges;

        $solvedChallenges[] = $challenge->id;
        $solvedChallenges = array_unique($solvedChallenges);

        $this->user->solved_challenges = $solvedChallenges;
        $this->user->save();
    }
}
