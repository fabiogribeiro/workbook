<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Challenge;
use App\Subject;

class ChallengesController extends Controller
{
    public function index()
    {
        $challenges = Challenge::all();

        return view('challenges.index', ['challenges' => $challenges]);
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

        $challenge->title = $request->title;
        $challenge->body = $request->body;
        $challenge->answer = $request->answer;
        $challenge->slug = str_slug($request->title);

        $challenge->save();

        return redirect(route('challenges.index', ['domain' => 'test-domain', 'subject' => 'test-subject']));
    }
}
