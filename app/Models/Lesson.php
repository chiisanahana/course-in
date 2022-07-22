<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lesson extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];
    
    // accessor price attribute yang sudah diformat untuk mempermudah proses
    public function getPriceAttribute()
    {
        if ($this->attributes['type'] == 'Course') {
            return 'IDR '.number_format($this->attributes['price']).'/month';
        } else {
            return 'IDR '.number_format($this->attributes['price']);
        }
    }

    public function getUnformattedPriceAttribute()
    {
        return $this->attributes['price'];
    }

    // accessor untuk menampilkan rating dengan 1 angka desimal
    public function getRatingAttribute()
    {
        if ($this->attributes['rating'] == 0) {
            return 'Unrated';
        } else {
            return number_format($this->attributes['rating'], 1);
        }
    }

    // query scope untuk fitur search lesson
    public function scopeSearch($query, $searchKey) {
        return $query->where('lesson_name', 'like', '%'.$searchKey.'%');
    }

    // query scope untuk mengecek apakah sebuah lesson terdapat di dalam wishlist seorang user
    public function scopeInUserWishlist($query, $lesson_id, $user_id)
    {
        // dd($query->where('user_id', $user_id)->has($lesson_id));
        dd($query->whereHas('wishlistItem'));
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function timetables()
    {
        return $this->hasMany(Timetable::class);
    }

    public function promos()
    {
        return $this->hasMany(Promo::class);
    }

    public function wishlistItems()
    {
        return $this->hasMany(WishlistItem::class);
    }

    public function payments(){
        return $this->hasMany(Payment::class);
    }
}
