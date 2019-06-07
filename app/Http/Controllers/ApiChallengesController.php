<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;

class ApiChallengesController extends Controller
{
  public function answerQuestion(Request $request)
  {
    if ($request->user()) {
      $user = $request->user();

      $question = Question::find($request->id);

      $solvedQuestions = $user->solved_questions ?: [];
      $solvedQuestions[] = $question->id;
      $solvedQuestions = array_values(array_unique($solvedQuestions));

      $user->solved_questions = $solvedQuestions;
      $user->save();
    }

    return ['result' => true];
  }
}
