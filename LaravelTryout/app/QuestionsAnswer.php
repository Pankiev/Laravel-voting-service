<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionsAnswer extends Model
{
    public function question()
    {
        return $this->belongsTo('App\Question');
    }

    public function user()
    {
        return $this->hasMany('App\User');
    }
}
