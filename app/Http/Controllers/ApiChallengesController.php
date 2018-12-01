<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Challenge;

class ApiChallengesController extends Controller
{
    public function index($subject_id)
    {
        $challenges = Challenge::where('subject_id', $subject_id)->get();

        return $challenges;
    }
}
