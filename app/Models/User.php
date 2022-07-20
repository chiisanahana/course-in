<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticable
{
    use HasFactory, Notifiable;

    protected $guarded = ['id'];

    public function wishlist()
    {
        return $this->hasOne(Wishlist::class);
    }

    public function timetables()
    {
        return $this->hasMany(Timetables::class);
    }
    
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
