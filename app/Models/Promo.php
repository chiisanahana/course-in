<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Promo extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];
    
    // function untuk menghapus promo yang sudah tidak berlaku
    public function scopeCheckValidDate($query)
    {
        $expiredId = $query->where('end_date', '<=', Carbon::yesterday())->get(['id']);
        $query->whereIn('id', $expiredId)->delete();
        return Promo::orderBy('end_date');
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
}
