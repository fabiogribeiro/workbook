<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Challenge;
use App\Subject;

use App\Jobs\GetChallengesBySkill;
use App\Jobs\SolveChallenge;

class ApiChallengesController extends Controller
{
    /**
     * Notify that a challenge has been solved.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function solve(Request $request)
    {
        SolveChallenge::dispatch($request->challengeId, $request->user());

        return ['result' => true];
    }
}
