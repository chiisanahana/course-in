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
        dd($query->join('wishlist_items', 'wishlist_items.wishlist_id', '=', 'wishlists.id')
        ->whereIn('wishlist_items.lesson_id', [$lesson_id])->get()->isEmpty());
        return $query->join('wishlist_items', 'wishlist_items.wishlist_id', '=', 'wishlists.id')
            ->whereIn('wishlist_items.lesson_id', [$lesson_id])->get()->isEmpty();
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
