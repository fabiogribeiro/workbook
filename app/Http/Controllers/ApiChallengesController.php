<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Challenge;

class ApiChallengesController extends Controller
{
    public function index($subject_id)
    {
        $challenges = Challenge::where('subject_id', $subject_id)->get();

        $challengesBySkill = array();

        foreach ($challenges as $challenge) {
            $challengesBySkill[$challenge->skill][] = $challenge;
        }

        return $challengesBySkill;
    }

    public function show($challenge_id)
    {
        $challenge = Challenge::find($challenge_id); 

        return $challenge;
    }

    public function solve(Request $request)
    {
        $challenge = Challenge::find($request->challengeId);
        $user = $request->user();

        if ($challenge) {
            // NOTE: Move into queued job if slow
            $solved_challenges = $user->solved_challenges;

            $solved_challenges[] = $challenge_id;
            $solved_challenges = array_unique($solved_challenges);

            $user->solved_challenges = $solved_challenges;
            $user->save();

            return ['result' => true];
        }

        return ['result' => false];
    }
}
