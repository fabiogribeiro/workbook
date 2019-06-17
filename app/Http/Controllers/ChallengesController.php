<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Challenge;
use App\Subject;

use App\Jobs\GetChallengesBySkill;
use App\Jobs\CreateChallenge;


class ChallengesController extends Controller
{
    public function index($domain, Subject $subject)
    {
        $challenge = $subject->challenges->first;
        $params = ['domain' => $domain, 'subject' => $subject->slug, 'challenge' => $challenge->slug];

        // Redirect permanently to first challenge in this subject.
        return redirect(route('challenges.show', $params), 301);
    }

    public function show($domain, Subject $subject, Challenge $challenge)
    {
        $challengesBySkill = GetChallengesBySkill::dispatchNow($subject);

        $solvedChallenges = Auth::check() ? Auth::user()->solved_challenges : [];

        return view('challenges.show', compact('challenge', 'subject', 'challengesBySkill', 'solvedChallenges'));
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
