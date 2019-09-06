<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;

class ApiChallengesController extends Controller
{
    public function answerQuestion(Request $request)
    {
        $question = Question::find($request->id);
        $challenge = $question->challenge;
        $answer = $request->answer;
        $user = $request->user();

        if ($user && $this->isCorrectAnswer($question, $answer)) {

            $solvedQuestions = $user->solved_questions ?: [];
            $solvedQuestions[] = $question->id;
            $user->solved_questions = $solvedQuestions;

            $unsolvedQuestions = $challenge->questions()
                                    ->whereNotIn('id', $solvedQuestions)
                                    ->get();

            if ($unsolvedQuestions->isEmpty()) {
                // No unsolved questions, challenge is solved

                $solvedChallenges = $user->solved_challenges ?: [];
                $solvedChallenges[] = $challenge->id;
                $user->solved_challenges = $solvedChallenges;
            }

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
