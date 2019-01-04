<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Challenge;
use App\Subject;

use App\Jobs\GetChallengesBySkill;


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
        $otherChallenges = Challenge::where('skill', $challenge->skill)
                            ->get()
                            ->makeHidden(['body', 'updated_at', 'created_at', 'subject_id', 'skill', 'answer']); // Hide everything not needed

        return view('challenges.show', ['subject' => $subject, 'challenge' => $challenge, 'otherChallenges' => $otherChallenges]);
    }

    public function new()
    {
        return view('challenges.new');
    }

    public function create(Request $request)
    {
        $challenge = new Challenge;

        $subject = Subject::where('slug', $request->subject)->first(); 

        $challenge->title = $request->title;
        $challenge->body = $request->body;
        $challenge->answer = $request->answer;
        $challenge->slug = str_slug($request->title);
        $challenge->subject_id = $subject->id;
        $challenge->skill = $request->skill;

        $challenge->save();

        return redirect(route('challenges.index', ['domain' => $subject->domain, 'subject' => $subject->slug]));
    }
}
