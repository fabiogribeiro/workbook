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
}
