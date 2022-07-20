<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WishlistItem extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeHasLesson($query, $lesson_id)
    {
        return !($query->whereIn('lesson_id', [$lesson_id])->get()->isEmpty());
    }

    public function wishlist()
    {
        return $this->belongsTo(Wishlist::class);
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
}
