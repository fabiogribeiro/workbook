<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Challenge;
use App\Subject;

class ChallengesController extends Controller
{
    public function index($domain, Subject $subject)
    {
        $challenges = Challenge::where('subject_id', $subject->id)->get();
        $subjects = Subject::where('domain', $subject->domain)->get();

        return view('challenges.index', ['subjects' => $subjects, 'challenges' => $challenges]);
    }

    public function show($domain, Subject $subject, Challenge $challenge)
    {
        return view('challenges.show', ['challenge' => $challenge]);
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

        $challenge->save();

        return redirect(route('challenges.index', ['domain' => $subject->domain, 'subject' => $subject->slug]));
    }
}
