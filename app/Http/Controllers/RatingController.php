<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Payment;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function index(){
        $transactions = Payment::where('user_id', auth()->guard('user')->user()->id)->get();
        $transactions = $transactions->where('ratings', '=', 0);
        return view('trainee.rating', [
            'transactions' => $transactions
        ]);
    }

    public function leaveReview(Request $req) {
        $payment = Payment::where('id', $req->payment_id)->first();
        if($payment->ratings == 0){
            $payment->ratings = $req->ratings;
            $payment->save();
            $rate_count = Payment::where('lesson_id', $payment->lesson_id)
                ->where('ratings', '!=', 0)
                ->count();
            $lesson = Lesson::whereId($payment->lesson_id)->first();
            $lesson->rating = ((double)($lesson->rating) + (double)($payment->ratings)) / (double)($rate_count);
            $lesson->save();
        }

        toast('Rating added successfully', 'success');
        return redirect()->route('dashboard');
    }
}
