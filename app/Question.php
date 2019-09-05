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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = ['question_data' => 'array'];

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
}
