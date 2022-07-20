<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Payment;
use App\Models\Promo;
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
        // $code = $promo->code;
        return view('trainee.payment.payment', [
            'lesson' => $lesson,
            'promos' => Promo::where('lesson_id', $lesson->id)
                ->orWhere('apply_all', 1)->get(),
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
        // dd($req->total_price);
        $payment->amount = $req->total_price;
        $payment->save();

        return view('trainee.payment.qr_verify');

    }

    public function applyPromo(Request $req, Lesson $lesson)
    {
        $promo_code = $this->validatePromoCode($req->promo_code);
        $discounted_price = $lesson->getUnformattedPriceAttribute() * $promo_code;
        $total_price = $lesson->getUnformattedPriceAttribute() + 3000 - $discounted_price;

        return view('trainee.payment.payment_discount', [
            'lesson' => $lesson,
            'discounted_price' => $discounted_price,
            'total_price' => $total_price
        ]);
    }

    public function validatePromoCode($promo_code)
    {
        if (!$promo_code) return 0;
        $exists = Promo::where('code', $promo_code)->first();
        if ($exists) return $exists->discount;
        else return 0;
    }

    public function discount($promo_code)
    {
        $discount = Promo::where('code', $promo_code)->first();
        if ($discount) return $discount->discount;
        else return 0;
    }

    public function availablePromo(Lesson $lesson)
    {
        return view('trainee.payment.available_promo', [
            'promos' => Promo::where('lesson_id', $lesson->id)
                ->orWhere('apply_all', 1)->get()
        ]);
    }
    public function validatePromo(Request $request, Lesson $lesson)
    {
        // $lesson = Lesson::whereId($request->lesson_id)->first();
        $discount = $this->validatePromoCode($request->promo_code);
        // $promo = Promo::where('lesson_id', $lesson->id)
        //                 ->orWhere('apply_all', 1)->first();
        $promo_code = $request->promo_code;
        // $discounted_price = 'IDR '.number_format($lesson->unformatted_price * $discount);
        $total_price = 'IDR ' . number_format($lesson->unformatted_price + 3000 - ($lesson->unformatted_price * $discount));
        // $data = collect([$lesson, $promo_code, $discounted_price, $total_price]);
        $data = collect([
            'lesson' => $lesson,
            'promo_code' => $request->promo_code,
            'discounted_price' => 'IDR ' . number_format($lesson->unformatted_price * $discount),
            'total_price' => $total_price
        ]);

        return redirect()->route('view-payment', $lesson->id)->with('data', $data);
        // return view('payment', [
        //     'lesson' => $lesson,
        //     'promo_code' => $request->promo_code,
        //     'discounted_price' => 'IDR '.number_format($lesson->unformatted_price * $discount),
        //     'total_price' => 'IDR '.number_format($total_price)
        // ]);
    }

    public function qrCode()
    {
        return view('trainee.payment.qr_code');
    }

    public function verifyLoading()
    {
        return view('trainee.payment.qr_verify');
    }

    public function viewPromo($id){
        $self_promo = Promo::where('lesson_id', $id)->get();
        $all_promo = Promo::where('apply_all', '=', 1)->get();
        $lesson = Lesson::where('id', $id)->first();
        $promos = $self_promo->merge($all_promo);

        return view('trainee.payment.available_promo', [
            'promos' => $promos,
            'lesson' => $lesson
        ]);
    }
}
