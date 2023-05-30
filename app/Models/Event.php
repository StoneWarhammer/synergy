<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Event extends Model
{
    use HasFactory, Notifiable;

    protected $guarded = false;

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }

    public function files()
    {
        return $this->hasMany(EventFiles::class, 'event_id', 'id');
    }

    public function answer_rate()
    {
        return $this->hasMany(Rate::class, 'event_id', 'id');
    }
}
