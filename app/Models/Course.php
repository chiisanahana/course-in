<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class Course extends Authenticable
{
    use HasFactory, Notifiable;

    protected $guarded = ['id'];

    public function getFormattedWaNumberAttribute()
    {
        return Str::substr($this->attributes['wa_number'], 0, 4) . '-' .
            Str::substr($this->attributes['wa_number'], 4, 4) . '-' .
            Str::substr($this->attributes['wa_number'], 8, 4);
    }
    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
}
