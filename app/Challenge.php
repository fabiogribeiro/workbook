<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    protected $casts = ['questions' => 'object'];

    /**
    * Get the route key for the model.
    *
    * @return string
    */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Get the subject of this challenge
     */
    public function subject()
    {
        return $this->belongsTo('App\Subject');
    }

    /**
     * Get the questions that belong to this challenge
     */
    public function questions()
    {
        return $this->hasMany('App\Question');
    }
}
