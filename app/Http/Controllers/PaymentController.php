<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutRequest;
use App\Models\Payment;
use App\Models\PaymentDetail;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function index()
    {
    	if (!Auth::check()) {
            return redirect()->route('login');
        }

        return view('checkout');
    }

    public function store(CheckoutRequest $request)
    {
        if (!Auth::check()) {
            return "isNotLogin";
        }

        $cart = session()->get('cart');

        $total = 0;
        foreach ($cart as $item) {
            $total += $item['game']->price;
        }

        if ($total == 0) {
            return "noGameInCart";
        }

        $payment = Payment::create([
            'account_id' => Auth::id(),
            'payment_date' => date('Y-m-d'),
            'amount' => $total,
        ]);

        foreach ($cart as $item) {
            PaymentDetail::create([
                'game_id' => $item['game']->id,
                'quantity' => 1,
                'subtotal' => $item['game']->price,
                'payment_id' => $payment->id,
                'account_id' => Auth::id(),
            ]);
        }

        session()->forget('cart');

        return "success";
    }

    public function finish(Request $request)
    {
        if($request->missing('success')) {
            return redirect()->route('checkout.index');
        }

        return view('thankyou');
    }

    public function history()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::user()->role != 1) {
            return redirect()->back();
        }

        $payments = Payment::where('account_id', Auth::id())->orderBy('id', 'desc')->paginate(5);

        return view('profile.payment-history', compact('payments'));
    }

    public function detail(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::user()->role != 1) {
            return redirect()->back();
        }

        if($request->missing('id')) {
            return redirect()->back();
        }

        $payment = Payment::findOrFail($request->id);
        $paymentDetails = PaymentDetail::where('payment_id', $request->id)->paginate(5);

        return view('payment-detail', compact('payment', 'paymentDetails'));
    }
}
