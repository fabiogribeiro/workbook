<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;

class ApiChallengesController extends Controller
{
  public function answerQuestion(Request $request)
  {
    $question = Question::find($request->id);
    $answer = $request->answer;
    $user = $request->user();

    if ($user && $this->isCorrectAnswer($question, $answer)) {

      $solvedQuestions = $user->solved_questions ?: [];
      $solvedQuestions[] = $question->id;
      $solvedQuestions = array_values(array_unique($solvedQuestions));

      $user->solved_questions = $solvedQuestions;
      $user->save();

      return ['result' => true];
    }

    return ['result' => false];
  }

  /**
   * Simple answer checker
   *
   * @return bool
   */
  private function isCorrectAnswer($question, $answer)
  {
    return $question->question_data['answer'] == $answer;
  }
}
