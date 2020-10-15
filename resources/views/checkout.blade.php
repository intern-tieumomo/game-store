@extends('layouts.app')

@section('page-title')
	{{ "Checkout || Game Store" }}
@endsection

@section('content')
	<!--Checkout Area Start-->
    <div class="checkout-area section pt-95 pt-lg-75 pt-md-65 pt-sm-55 pt-xs-45">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Checkout Form Start-->
                    <form action="{{ route('checkout.store') }}" method="POST" class="checkout-form">
                    	@csrf
                       <div class="row row-40">

                           <div class="col-lg-7">
                           		@include('layouts.error')

                               <!-- Billing Address -->
                               <div id="billing-form" class="mb-10">
                                   <h4 class="checkout-title">Billing Address</h4>

                                   <div class="row">

                                       <div class="col-md-6 col-12 mb-20">
                                           <label>Name*</label>
                                           <input type="text" placeholder="Name" value="{{ $user->name }}" disabled>
                                       </div>

                                       <div class="col-md-6 col-12 mb-20">
                                           <label>Email Address*</label>
                                           <input type="email" placeholder="Email Address" value="{{ Auth::user()->email }}" disabled>
                                       </div>

                                       <div class="col-md-6 col-12 mb-20">
                                           <label>Phone no*</label>
                                           <input type="text" placeholder="Phone number" value="{{ $user->phone }}" disabled>
                                       </div>

                                   </div>

                               </div>

                               <div id="billing-form" class="mb-10">
                                   <h4 class="checkout-title">Payment</h4>
                                   <h5>Accepted Card 

                                   	<i class="fa fa-cc-amex" style="color: blue" data-toggle="tooltip" data-placement="top"title="AMEX"></i>
                                   	<i class="fa fa-cc-visa" style="color: navy"  data-toggle="tooltip" data-placement="top"title="VISA"></i>
                                   	<i class="fa fa-cc-mastercard" style="color: red"  data-toggle="tooltip" data-placement="top"title="MASTERCARD"></i>
                                   	<i class="fa fa-cc-discover" style="color: orange"  data-toggle="tooltip" data-placement="top"title="DISCOVER"></i>

                                   </h5>

                                   <div class="row">

                                       <div class="col-md-6 col-12 mb-20">
                                           <label>Name on Card*</label>
                                           <input type="text" name="name" placeholder="Name. Ex: Elfie Welch" value="{{ old('name') }}" autofocus>
                                       </div>

                                       <div class="col-md-6 col-12 mb-20">
                                           <label>Credit Card Number*</label>
                                           <input type="text" name="card-number" placeholder="Credit card number. Ex: 1234567890" value="{{ old('card-number') }}">
                                       </div>

                                       <div class="col-md-6 col-12 mb-20">
                                           <label>CVV*</label>
                                           <input type="text" name="cvv" placeholder="CVV. Ex: 123" value="{{ old('cvv') }}">
                                       </div>
                                       <div class="col-md-6 col-12 mb-20"></div>

                                       <div class="col-md-6 col-12 mb-20">
                                           <label>Exp Month*</label>
                                           <input type="text" name="exp-month" placeholder="Exp Month. Ex: 3" value="{{ old('exp-month') }}">
                                       </div>
                                       <div class="col-md-6 col-12 mb-20">
                                           <label>Exp Year*</label>
                                           <input type="text" name="exp-year" placeholder="Exp Year. Ex: 2021" value="{{ old('exp-year') }}">
                                       </div>

                                       <div class="col-md-6 col-12 mb-20">
                                            <button class="btn btn-primary" id="update" type="submit" value="CHECKOUT">CHECKOUT</button>
                                            <button class="btn btn-danger" id="reset" type="reset" value="RESET">RESET</button>
                                        </div> 

                                   </div>

                               </div>

                           </div>

                           <div class="col-lg-5">
                               <div class="row">

                                   <!-- Cart Total -->
                                   <div class="col-12 mb-60">

                                       <h4 class="checkout-title">Cart Total</h4>

                                       <div class="checkout-cart-total">

                                           <h4>Games <span>Total</span></h4>

                                           <ul>
                                           	@foreach($cart as $item)
                                               <li>{{ $item->name }} X 01 <span>{{ $item->price." VND" }}</span></li>
                                            @endforeach
                                           </ul>

                                           <h4>Grand Total <span>{{ $total." VND" }}</span></h4>

                                       </div>

                                   </div>

                               </div>
                           </div>

                       </div>
                    </form> 
                    <!-- Checkout Form End-->
                </div>
            </div>
        </div>
    </div>
    <!--Checkout Area End-->

    <div>
    	&nbsp;
    </div>
@endsection
