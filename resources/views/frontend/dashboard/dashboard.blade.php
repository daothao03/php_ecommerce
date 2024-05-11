@extends('frontend.dashboard.layouts.master')

@section('title')
    Dashboard || {{ $settings->site_name }}
@endsection

@section('content')
    <section id="wsus__dashboard">
        <div class="container-fluid">
            @include('frontend.dashboard.layouts.sidebar')
            <div class="row">
                <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                    <div class="dashboard_content">
                        <div class="wsus__dashboard">
                            <div class="row">
                                <h4 class="mb-5">USER DASHBOARD</h4>

                                <div class="col-xl-3 col-6 col-md-4">
                                    <a class="wsus__dashboard_item red" href="{{ route('user.order.index') }}">
                                        <i class="far fa-cart-plus"></i>
                                        <p>Tất cả</p>
                                        <h5 style="color: #fff" class="text-lite">{{ $totalOrder }}</h5>
                                    </a>
                                </div>
                                <div class="col-xl-3 col-6 col-md-4">
                                    <a class="wsus__dashboard_item green" href="{{ route('user.order.index') }}">
                                        <i class="fal fa-cart-plus"></i>
                                        <p>Chờ xác nhận</p>
                                        <h5 style="color: #fff" class="text-lite">{{ $pendingOrder }}</h5>
                                    </a>
                                </div>
                                <div class="col-xl-3 col-6 col-md-4">
                                    <a class="wsus__dashboard_item sky" href="{{ route('user.order.index') }}">
                                        <i class="fas fa-star"></i>
                                        <p>Đã vận chuyển</p>
                                        <h5 style="color: #fff" class="text-lite">{{ $deliveredOrder }}</h5>
                                    </a>
                                </div>
                                <div class="col-xl-3 col-6 col-md-4">
                                    <a class="wsus__dashboard_item blue" href="{{ route('user.review.index') }}">
                                        <i class="far fa-heart"></i>
                                        <p>Review</p>
                                        <h5 style="color: #fff" class="text-lite">{{ $review }}</h5>
                                    </a>
                                </div>
                                {{-- <div class="col-xl-2 col-6 col-md-4">
                                    <a class="wsus__dashboard_item orange" href="dsahboard_profile.html">
                                        <i class="fas fa-user-shield"></i>
                                        <p>profile</p>
                                    </a>
                                </div>
                                <div class="col-xl-2 col-6 col-md-4">
                                    <a class="wsus__dashboard_item purple" href="dsahboard_address.html">
                                        <i class="fal fa-map-marker-alt"></i>
                                        <p>address</p>
                                    </a>
                                </div> --}}
                            </div>
                            {{-- <div class="row">
                                <div class="col-md-5"></div>
                                <div class=" col-md-2 mb-3">
                                    <div style="border: none" class="wsus__dash_pro_img">
                                        <img style="border-radius: 999px"
                                            src="{{ Auth::user()->image ? asset(Auth::user()->image) : asset('frontend/images/ts-2.jpg') }}"
                                            alt="img" class="img-fluid w-100 mb-3">
                                    </div>
                                    <h2 class="">{{ Auth::user()->name }}</h2>
                                </div>
                            </div> --}}
                            <div class="row">

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
