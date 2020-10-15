<?php

namespace App\Http\Controllers;

use App\Http\Requests\BecomePublisherRequest;
use App\Mail\BecomePublisherEmail;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function publisherRequest(BecomePublisherRequest $request)
    {
        $objDemo = new \stdClass();
        $objDemo->name = $request->name;
        $objDemo->phone = $request->phone;
        $objDemo->address = $request->address;
        $objDemo->description = $request->description;
        if ($objDemo->description == "") {
        	$objDemo->description == "No description";
        }
        $objDemo->email = Auth::user()->email;
        
        Account::find(Auth::id())->update(['role' => 5]);
 		$demo = new BecomePublisherEmail($objDemo);
        Mail::to("intern.tieumomo@gmail.com")->send($demo);
    }
}
