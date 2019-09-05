<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['solved'];

    /**
     * Get the parent challenge for this question.
     */
    public function challenge()
    {
        return $this->belongsTo('App\Challenge');
    }

    /**
     * Get a boolean that's true when this question is solved.
     *
     * @return bool
     */
    public function getSolvedAttribute()
    {
        $solvedQuestions = Auth::check() ? Auth::user()->solved_questions : [];

        return in_array($this->id, $solvedQuestions);
    }

    /**
     * Convert json string data to array and hide answer
     * to the client if the question is not solved.
     *
     * @return array
     */
    public function getQuestionDataAttribute($value)
    {
        $data = json_decode($value);

        if ($this->solved) {
            return $data;
        }

        $data->answer = "";
        return $data;
    }
}
