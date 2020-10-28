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
            $locale = config('app.locale');
            switch($locale) {
                case 'vi':
                    return number_format($number , 0, ',', '.') . config('string.vnd');
                    break;
                case 'en':
                    return number_format($number/23000 , 2, ',', '.') . config('string.usd');
                    break;
            }
        }
    }

    if (!function_exists('isUser')) {
        function isUser()
        {
            if(Auth::check()) {
                if(Auth::user()->role == 1) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
    }

    if (!function_exists('isAdmin')) {
        function isAdmin()
        {
            if(Auth::check()) {
                if(Auth::user()->role == 9) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
    }
