@extends('frontend.layouts.master')

@section('title')
    Payment || {{ $settings->site_name }}
@endsection

@section('content')
    <section id="wsus__cart_view">
        <div class="container">
            <div class="wsus__pay_info_area">
                <div class="row">
                    <div class="col-xl-3 col-lg-3">
                        <div class="wsus__payment_menu" id="sticky_sidebar">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">


                                <button class="nav-link common_btn" id="v-pills-profile-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-cod" type="button" role="tab"
                                    aria-controls="v-pills-stripe" aria-selected="false">COD</button>


                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-5">
                        <div class="tab-content" id="v-pills-tabContent" id="sticky_sidebar">


                            {{-- <div class="tab-pane fade show active" id="v-pills-paypal" role="tabpanel"
                            aria-labelledby="v-pills-home-tab">
                                <div class="row">
                                    <div class="col-xl-12 m-auto">
                                        <div class="wsus__payment_area">
                                            <a class="nav-link common_btn text-center" href="{{route('user.paypal.payment')}}">Pay with Paypal</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @include('frontend.pages.payment-gateway.stripe')

                            @include('frontend.pages.payment-gateway.razorpay') --}}

                            @include('frontend.pages.payment-gateway.cod')



                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4">
                        <div class="wsus__pay_booking_summary" id="sticky_sidebar2">
                            <h5>Order </h5>
                            <p>subtotal: <span>{{ number_format(getCartTotal()) }} {{ $settings->currency_icon }}</span></p>
                            <p>shipping fee: <span>{{ number_format(getShppingFee()) }}
                                    {{ $settings->currency_icon }}</span></p>
                            <p>coupon(-) : <span>{{ number_format(getCartDiscount()) }}
                                    {{ $settings->currency_icon }}</span></p>
                            <h6>total <span>{{ number_format(getFinalPayableAmount()) }}
                                    {{ $settings->currency_icon }}</span></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
