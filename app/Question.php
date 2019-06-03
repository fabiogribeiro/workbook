<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $casts = ['question_data' => 'array'];
    /**
     * Get the parent challenge for this question.
     */
    public function challenge()
    {
        return $this->belongsTo('App\Challenge');
    }
}
