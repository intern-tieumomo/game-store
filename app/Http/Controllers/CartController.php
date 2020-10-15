<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\PaymentDetail;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $total = 0;
        if (session()->get('cart') != null) {
            foreach (session()->get('cart') as $item) {
                $total += $item['game']->price;
            }
        }

        return view('cart', compact('total'));
    }

    public function isBought(int $id)
    {
        $paymentDetail = PaymentDetail::where([
            'game_id' => $id,
            'account_id' => Auth::id(),
        ])->first();

        if ($paymentDetail !== null) {
            return true;
        } elseif (Auth::user()->role == config('role.publisher')) {
            return false;
        }
    }

    public function add(Request $request)
    {
        if (!Auth::check()) {
            return config('string.not_login');
        }

        if ($request->missing('id')) {
            return config('string.not_exist');
        }

        if (CartController::isBought($request->id))
            return config('string.owned');
        elseif (Auth::user()->role == config('role.publisher'))
            return config('string.publisher');

        $cart = session()->get('cart');
        if (!$cart) {
            $game = Game::find($request->id);
            $cart = [
                $request->id => [
                    'game' => $game,
                ]
            ];
            session()->put('cart-total', $game->price);
            session()->put('cart', $cart);

            return config('string.success');
        }
        if (isset($cart[$request->id]))
            return config('string.in_cart');
        
        $game = Game::find($request->id);
        $cart[$request->id] = [
            'game' => $game,
        ];
        $total = session()->get('cart-total');
        session()->put('cart-total', $total + $game->price);
        session()->put('cart', $cart);

        return config('string.success');
    }

    public function destroy(Request $request)
    {
        if (!Auth::check()) {
            return config('string.not_login');
        }

        if ($request->missing('id')) {
            return config('string.not_exist');
        }

        $cart = session()->get('cart');
        if (isset($cart[$request->id])) {
            unset($cart[$request->id]);
            session()->put('cart', $cart);
        }

        return config('string.success');
    }
}
