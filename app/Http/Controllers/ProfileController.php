<?php

namespace App\Http\Controllers;

use App\Challenge;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show(Request $request)
    {
        $challengeIds = $request->user()->solved_challenges;
        $challenges = Challenge::with('subject:id,slug,domain')
                                ->find($challengeIds);

        return view('profile', ['challenges' => $challenges]);
    }
}
