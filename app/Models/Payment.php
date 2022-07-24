<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    public function scopeIsExists($query, $user_id, $lesson_id)
    {
        return $query->where('user_id', $user_id)
            ->where('lesson_id', $lesson_id)
            ->whereBetween('created_at', [now()->subMonth(), now()])
            ->get()->isNotEmpty();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lesson(){
        return $this->belongsTo(Lesson::class);
    }
}