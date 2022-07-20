<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Course extends Authenticable
{
    use HasFactory, Notifiable;

    protected $guarded = ['id'];

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
}
