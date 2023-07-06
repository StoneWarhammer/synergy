<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Post extends Model
{
    use HasFactory, Notifiable;

    protected $guarded = false;

    public function files()
    {
        return $this->hasMany(PostFiles::class, 'post_id', 'id');
    }
}