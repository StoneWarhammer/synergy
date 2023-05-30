<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Answer extends Model
{
    use HasFactory, Notifiable;

    protected $guarded = false;

    public function answer_author()
    {
        return $this->belongsTo(User::class, 'answer_author_id', 'id');
    }

    public function event()
    {
        return $this->belongsTo(Event::class, 'answer_event_id', 'id');
    }

    public function files()
    {
        return $this->hasMany(AnswerFiles::class, 'answer_id', 'id');
    }

    public function rate()
    {
        return $this->hasMany(Rate::class, 'answer_author_id', 'id');
    }
}
