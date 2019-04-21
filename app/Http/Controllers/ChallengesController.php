<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Challenge;
use App\Subject;

use App\Jobs\GetChallengesBySkill;
use App\Jobs\CreateChallenge;


class ChallengesController extends Controller
{
    public function index($domain, Subject $subject)
    {
        $subjects = Subject::where('domain', $subject->domain)->get();

        $challengesBySkill = GetChallengesBySkill::dispatchNow($subject);

        return view('challenges.index', ['activeSubject' => $subject, 'subjects' => $subjects, 'challengesBySkill' => $challengesBySkill]);
    }

    public function show($domain, Subject $subject, Challenge $challenge)
    {
        $challengesBySkill = GetChallengesBySkill::dispatchNow($subject);                            

        return view('challenges.show', compact('challenge', 'subject', 'challengesBySkill'));
    }

    public function new()
    {
        return view('challenges.new');
    }

    public function create(Request $request)
    {
        CreateChallenge::dispatch($request->all());

        return back();
    }
}
