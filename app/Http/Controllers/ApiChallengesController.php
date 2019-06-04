<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Challenge;
use App\Subject;

use App\Jobs\GetChallengesBySkill;
use App\Jobs\SolveChallenge;

class ApiChallengesController extends Controller
{
  public function answerQuestion(Request $request)
  {
  }
}
