<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Challenge;
use App\Subject;

use App\Jobs\GetChallengesBySkill;

class ApiChallengesController extends Controller
{
    public function index(Subject $subject)
    {
        return GetChallengesBySkill::dispatchNow($subject);
    }

    public function show(Challenge $challenge)
    {
        return $challenge;
    }

    public function solve(Request $request)
    {
        $challenge = Challenge::where('id', $request->challengeId)->first();
        $user = $request->user();

        if ($challenge) {
            // NOTE: Move into a job when there's chance of being slow
            $solved_challenges = $user->solved_challenges;

            $solved_challenges[] = $challenge->id;
            $solved_challenges = array_unique($solved_challenges);

            $user->solved_challenges = $solved_challenges;
            $user->save();

            return ['result' => true];
        }

        return ['result' => false];
    }
}
