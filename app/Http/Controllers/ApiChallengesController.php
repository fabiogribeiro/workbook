<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Challenge;
use App\Subject;

use App\Jobs\GetChallengesBySkill;
use App\Jobs\SolveChallenge;

class ApiChallengesController extends Controller
{
    public function index(Subject $subject)
    {
        return GetChallengesBySkill::dispatchNow($subject);
    }

    public function show(Challenge $challenge)
    {
        // Hide unnecessary body data in serialization.
        return $challenge->makeHidden('body');
    }

    public function solve(Request $request)
    {
        SolveChallenge::dispatch($request->challengeId, $request->user());

        return ['result' => true];
    }
}
