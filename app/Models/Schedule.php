<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // accessor untuk format date
    public function getDateAttribute()
    {
        return date('D, jS M', strtotime($this->attributes['date']));
    }

    public function getFullDateAttribute()
    {
        return date('l, jS M Y', strtotime($this->attributes['date']));
    }

    public function getUnformattedDateAttribute()
    {
        return $this->attributes['date'];
    }

    // accessor untuk format start_lesson
    public function getStartLessonAttribute()
    {
        return date('H:i', strtotime($this->attributes['start_lesson']));
    }

    // accessor untuk format end_lesson
    public function getEndLessonAttribute()
    {
        return date('H:i', strtotime($this->attributes['end_lesson']));
    }

    // accessor schedule time dengan format [start_lesson - end_lesson]
    public function getScheduleTimeAttribute()
    {
        return $this->getStartLessonAttribute().' - '.$this->getEndLessonAttribute();
    }

    public function scopeIsExists($query, $lesson_id, $date, $start_lesson, $end_lesson)
    {
        if ($query->where('lesson_id', $lesson_id)->where('date', $date)
            ->where('start_lesson', $start_lesson)->where('end_lesson', $end_lesson)->first()
        ) {
            return true;
        } else {
            return false;
        }
    }

    public function scopeAvailableSchedule($query, $user_id)
    {
        $paymentDate = Carbon::create(Payment::where('user_id', $user_id)->first()->created_at->toDateString());
        return $query->where('user_id', $user_id)
            ->whereBetween('date', [$paymentDate->toDateString(), $paymentDate->addMonth()->toDateString()]);
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
}
