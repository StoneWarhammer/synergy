<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventFiles extends Model
{
    use HasFactory;

    protected $guarded = false;

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id', 'id');
    }
}
