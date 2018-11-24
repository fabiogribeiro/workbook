<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChallengesController extends Controller
{
    public function index()
    {
        return view('challenges.index');
    }

    public function show()
    {
        return view('challenges.show');
    }
}
