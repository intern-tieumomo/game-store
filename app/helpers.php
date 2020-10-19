<?php
    use App\Models\PaymentDetail;
    use Illuminate\Support\Facades\Auth;
    
    if (!function_exists('canAdd')) {
        function canAdd($id)
        {
            if(!Auth::check() || Auth::user()->role == 2) {
                return "isPublisher";
            }

            $paymentDetail = PaymentDetail::where([
                'game_id' => $id,
                'account_id' => Auth::id(),
            ])->first();

            if ($paymentDetail !== null) {
                return "isOwned";
            } else {
                return "canAdd";
            }
        }
    }

    if (!function_exists('moneyFormat')) {
        function moneyFormat($number)
        {
            return number_format($number , 0, ',', '.');
        }
    }
