<div class="checkout-area section pt-95 pt-lg-75 pt-md-65 pt-sm-55 pt-xs-45">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="checkout-form">
                    <div class="row row-40">
                        <div class="col-lg-7">
                            <div id="billing-form" class="mb-10">
                                <h4 class="checkout-title">
                                    {{ trans('text.profile.user_info') }}
                                    <label class="switch">
                                        <input type="checkbox" id="user-switch">
                                        <span class="slider"></span>
                                    </label>
                                </h4>
                                
                                @include('layouts.error')

                                @if (session('message'))
                                    <div class="alert alert-success">
                                        <i class="fa fa-check-circle"></i> {{session('message')}}
                                    </div>
                                @endif

                                <form action="{{ route('user.profile.store') }}" method="POST">
                                    @csrf
                                    @method('POST')
                                    <div class="row">
                                        <div class="col-md-6 col-12 mb-20">
                                            <label>{{ trans('text.profile.name') }}</label>
                                            <input id="name" type="text" name="name" placeholder="{{ trans('text.profile.name') }}" value="{{ $user->name }}" autofocus disabled>
                                        </div>

                                        <div class="col-md-6 col-12 mb-20">
                                            <label>{{ trans('text.profile.birthday') }}</label>
                                            <input id="birthday" type="date" name="birthday" placeholder="{{ trans('text.profile.birthday') }}" value="{{ $user->birthday }}" disabled>
                                        </div>

                                        <div class="col-md-6 col-12 mb-20">
                                            <label>{{ trans('text.profile.address') }}</label>
                                            <input id="address" type="text" name="address" placeholder="{{ trans('text.profile.address') }}" value="{{ $user->address }}" disabled>
                                        </div>

                                        <div class="col-md-6 col-12 mb-20">
                                            <label>{{ trans('text.profile.phone') }}</label>
                                            <input id="phone" type="text" name="phone" placeholder="{{ trans('text.profile.phone') }}" value="{{ $user->phone }}" disabled>
                                        </div>

                                        <div class="col-md-6 col-12 mb-20">
                                            <button class="btn btn-primary" id="update" type="submit" value="UPDATE" disabled>{{ trans('text.profile.update') }}</button>
                                            <button class="btn btn-danger" id="reset" type="reset" value="RESET" disabled>{{ trans('text.profile.reset') }}</button>
                                        </div>                                    
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="col-lg-5">
                           <div class="row">
                               <div class="col-12 mb-60">
                                   <h4 class="checkout-title">{{ trans('text.profile.payment_history') }}</h4>

                                   <div class="checkout-cart-total">
                                        <h4>{{ trans('text.profile.recently') }}</h4>
                                        <h4># <span>{{ trans('text.profile.payment') }}</span></h4>

                                        <ul>
                                            @foreach($payments as $payment)
                                                <li><a href="{{ route('checkout.detail', ['id' => $payment->id]) }}">{{ $payment->payment_date }}</a> <span>{{ $payment->amount." VND" }}</span></li>
                                            @endforeach
                                        </ul>
                                       <h4><a href="{{ route('checkout.history') }}">{{ trans('text.profile.view_all') }} </a><span><i class="fa fa-arrow-right"></i></i></span></h4>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
