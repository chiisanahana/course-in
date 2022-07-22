<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Payment;
use App\Models\Promo;
use App\Models\Timetable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function viewPayment(Lesson $lesson, $promo = null)
    {
        if(!$promo){
            $promo = 'PROMOCODE';
            $discounted_price = 0;
        }else{
            $promo_price = Promo::where('code', $promo)->first();
            $discounted_price = $lesson->getUnformattedPriceAttribute() * $promo_price->discount;
        }
        $total_price = $lesson->getUnformattedPriceAttribute() + 3000 - $discounted_price;
        return view('trainee.payment.payment', [
            'lesson' => $lesson,
            'discounted_price' => $discounted_price,
            'total_price' => $total_price,
            'promo' => $promo
        ]);
    }

    public function validatePayment(Request $req, Lesson $lesson)
    {
        $validateInput = $req->validate([
            'email' => 'required|email',
            'card_details' => 'required|regex:#^\d{16}$#',
            'exp_date' => 'required|regex:#^[0-9][0-9]/[0-9][0-9]$#',
            'cvv' => 'required|regex:#^[0-9][0-9][0-9]$#',
            'name' => 'required|alpha',
        ]);

        
        $payment = new Payment();
        $payment->lesson_id = $lesson->id;
        $payment->user_id = Auth::guard('user')->user()->id;
        $payment->payment_method = 'Card';
        $payment->amount = $req->total_price;
        $used_promo = Promo::where('code', $req->promo_code)->first();
        if(!$used_promo){
            $payment->promo_id = 0;
        }else{
            $payment->promo_id = $used_promo->id;
        }
        $payment->save();

        // Instantiate timetable setelah payment berhasil
        Timetable::create([
            'user_id' => Auth::guard('user')->user()->id,
            'lesson_id' => $lesson->id
        ]);

        return view('trainee.payment.qr_loading');

    }

    public function validateQr(Request $req, Lesson $lesson){
        $payment = new Payment();
        $payment->lesson_id = $lesson->id;
        $payment->user_id = Auth::guard('user')->user()->id;
        $payment->payment_method = 'QRIS';
        $payment->amount = $req->total_price;
        $used_promo = Promo::where('code', $req->promo_code)->first();
        if(!$used_promo){
            $payment->promo_id = 0;
        }else{
            $payment->promo_id = $used_promo->id;
        }
        $payment->save();

        // Instantiate timetable setelah payment berhasil
        Timetable::create([
            'user_id' => Auth::guard('user')->user()->id,
            'lesson_id' => $lesson->id
        ]);

        return view('trainee.payment.qr_loading');
    }

    public function qrPayment($id, $promo=null)
    {
        $lesson = Lesson::where('id', $id)->first();
        if(!$promo){
            $promo = 'PROMOCODE';
            $discounted_price = 0;
        }else{
            $promo_price = Promo::where('code', $promo)->first();
            $discounted_price = $lesson->getUnformattedPriceAttribute() * $promo_price->discount;
        }
        $total_price = $lesson->getUnformattedPriceAttribute() + 3000 - $discounted_price;
        return view('trainee.payment.qr_code', [
            'lesson' => $lesson,
            'discounted_price' => $discounted_price,
            'total_price' => $total_price,
            'promo' => $promo
        ]);
    }

    public function loadingPayment()
    {
        return view('trainee.payment.qr_loading');
    }

    public function viewPromo($id, $page){
        $self_promo = Promo::where('lesson_id', $id)->get();
        $all_promo = Promo::where('apply_all', '=', 1)->get();
        $lesson = Lesson::where('id', $id)->first();
        $promos = $self_promo->merge($all_promo);

        if($page==1){
            return view('trainee.payment.available_promo_card', [
                'promos' => $promos,
                'lesson' => $lesson
            ]);
        }else{
            return view('trainee.payment.available_promo_qr', [
                'promos' => $promos,
                'lesson' => $lesson
            ]);
        }
    }

    public function paymentHistory(){
        $payments = Payment::where('user_id', Auth::guard('user')->user()->id);
        $cardCount = Payment::where('user_id', Auth::guard('user')->user()->id)->where('payment_method', 'Card')->count();
        $qrisCount = Payment::where('user_id', Auth::guard('user')->user()->id)->where('payment_method', 'QRIS')->count();
        return view('trainee.payment_history', [
            'payments' => $payments->get(),
            'total' => $payments->sum('amount'),
            'cardCount' => $cardCount,
            'qrisCount' => $qrisCount
        ]);
    }
}
