<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Promo;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function viewPayment(Lesson $lesson)
    {
        // dd($_REQUEST);
        // dd('masuk');
        // dd($lesson);
        // $selected = Lesson::whereId($lesson->id)->first();
        $discounted_price = 0;
        $total_price = $lesson->getUnformattedPriceAttribute() + 3000;
        return view('trainee.payment.payment', [
            'lesson' => $lesson,
            'promos' => Promo::where('lesson_id', $lesson->id)
                ->orWhere('apply_all', 1)->get(),
            'discounted_price' => $discounted_price,
            'total_price' => $total_price
        ]);
    }

    public function validatePayment(Lesson $lesson, Request $req)
    {

        $validateInput = $req->validate([
            'email' => 'required|email',
            'card_details' => 'required|regex:#^\d{16}$#',
            'exp_date' => 'required|regex:#^[0-9][0-9]/[0-9][0-9]$#',
            'cvv' => 'required|regex:#^[0-9][0-9][0-9]$#',
            'name' => 'required|alpha',
        ]);

        //save tke table payments

        return view('trainee.payment.qr_verify');


        // $discounted_price = $lesson->price * $this->discount($req->promo_code);
        // $total_price = $lesson->unformatted_price - $discounted_price + 3000;

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
}
