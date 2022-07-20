<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeHasItem($query, $lesson_id)
    {
        return WishlistItem::where('wishlist_id', $query->first()->id)->hasLesson($lesson_id);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function wishlistItems()
    {
        return $this->hasMany(WishlistItem::class);
    }
}
