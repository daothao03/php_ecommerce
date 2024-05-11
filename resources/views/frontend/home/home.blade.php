@extends('frontend.layouts.master')

@section('title')
    {{ $settings->site_name }}
@endsection

@section('content')
    @include('frontend.home.section.slider')



    @include('frontend.home.section.flashsale')

    {{-- Brand slider --}}
    @include('frontend.home.section.brand')

    {{-- San pham ban chay --}}
    @include('frontend.home.section.selling-product')



    <!--============================
                                                                                                   MONTHLY TOP PRODUCT START
                                                                                                ==============================-->
    {{-- @include('frontend.home.section.top-category-product') --}}
    <!--============================
                                                                                                   MONTHLY TOP PRODUCT END
                                                                                                ==============================-->


    <!--============================
                                                                                                    SINGLE BANNER START
                                                                                                ==============================-->
    {{-- @include('frontend.home.section.slider-advertisement') --}}
    <!--============================
                                                                                                    SINGLE BANNER END
                                                                                                ==============================-->



    {{-- Hot deal --}}
    @include('frontend.home.section.hotdeal')

    <!-- ADS -->
    {{-- <div class="container">
        <section class="ads ads-2">
            <div class="content">
                <a href="#!" class="dis-link">
                    <img src="{{ asset('frontend/images/single_banner_66.jpg') }}" alt="" />
                </a>
                <a href="#!" class="dis-link">
                    <img src="{{ asset('frontend/images/single_banner_66.jpg') }}" alt="" />
                </a>
                <a href="#!" class="dis-link">
                    <img src="{{ asset('frontend/images/single_banner_66.jpg') }}" alt="" />
                </a>
            </div>
        </section>
    </div> --}}



    <!--============================
                                                                                                    ELECTRONIC PART START
                                                                                                ==============================-->
    {{-- <section id="wsus__electronic2">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="wsus__section_header">
                        <h3>Apparels & Clothings</h3>
                        <a class="see_btn" href="#">see more <i class="fas fa-caret-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="row flash_sell_slider">
                <div class="col-xl-3 col-sm-6 col-lg-4">
                    <div class="wsus__product_item">
                        <span class="wsus__new">New</span>
                        <span class="wsus__minus">-20%</span>
                        <a class="wsus__pro_link" href="product_details.html">
                            <img src="images/pro8.jpg" alt="product" class="img-fluid w-100 img_1" />
                            <img src="images/pro8_8.jpg" alt="product" class="img-fluid w-100 img_2" />
                        </a>
                        <ul class="wsus__single_pro_icon">
                            <li><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                                        class="far fa-eye"></i></a></li>
                            <li><a href="#"><i class="far fa-heart"></i></a></li>
                            <li><a href="#"><i class="far fa-random"></i></a>
                        </ul>
                        <div class="wsus__product_details">
                            <a class="wsus__category" href="#">fashion </a>
                            <p class="wsus__pro_rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <span>(10 review)</span>
                            </p>
                            <a class="wsus__pro_name" href="#">weman's fashion one pcs</a>
                            <p class="wsus__price">$99</p>
                            <a class="add_cart" href="#">add to cart</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-lg-4">
                    <div class="wsus__product_item">
                        <span class="wsus__minus">-20%</span>
                        <a class="wsus__pro_link" href="product_details.html">
                            <img src="images/kids_1.jpg" alt="product" class="img-fluid w-100 img_1" />
                            <img src="images/kids_2.jpg" alt="product" class="img-fluid w-100 img_2" />
                        </a>
                        <ul class="wsus__single_pro_icon">
                            <li><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                                        class="far fa-eye"></i></a></li>
                            <li><a href="#"><i class="far fa-heart"></i></a></li>
                            <li><a href="#"><i class="far fa-random"></i></a>
                        </ul>
                        <div class="wsus__product_details">
                            <a class="wsus__category" href="#">fashion </a>
                            <p class="wsus__pro_rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <span>(41 review)</span>
                            </p>
                            <a class="wsus__pro_name" href="#">kid's fashion party dress</a>
                            <p class="wsus__price">$110</p>
                            <a class="add_cart" href="#">add to cart</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-lg-4">
                    <div class="wsus__product_item">
                        <span class="wsus__new">New</span>
                        <a class="wsus__pro_link" href="product_details.html">
                            <img src="images/blazer_1.jpg" alt="product" class="img-fluid w-100 img_1" />
                            <img src="images/blazer_2.jpg" alt="product" class="img-fluid w-100 img_2" />
                        </a>
                        <ul class="wsus__single_pro_icon">
                            <li><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                                        class="far fa-eye"></i></a></li>
                            <li><a href="#"><i class="far fa-heart"></i></a></li>
                            <li><a href="#"><i class="far fa-random"></i></a>
                        </ul>
                        <div class="wsus__product_details">
                            <a class="wsus__category" href="#">fashion </a>
                            <p class="wsus__pro_rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <span>(40 review)</span>
                            </p>
                            <a class="wsus__pro_name" href="#">man's fashion blazer</a>
                            <p class="wsus__price">$180 <del>$200</del></p>
                            <a class="add_cart" href="#">add to cart</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-lg-4">
                    <div class="wsus__product_item">
                        <span class="wsus__minus">-20%</span>
                        <a class="wsus__pro_link" href="product_details.html">
                            <img src="images/wemans_2.jpg" alt="product" class="img-fluid w-100 img_1" />
                            <img src="images/wemans_1.jpg" alt="product" class="img-fluid w-100 img_2" />
                        </a>
                        <ul class="wsus__single_pro_icon">
                            <li><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                                        class="far fa-eye"></i></a></li>
                            <li><a href="#"><i class="far fa-heart"></i></a></li>
                            <li><a href="#"><i class="far fa-random"></i></a>
                        </ul>
                        <div class="wsus__product_details">
                            <a class="wsus__category" href="#">fashion </a>
                            <p class="wsus__pro_rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <span>(99 review)</span>
                            </p>
                            <a class="wsus__pro_name" href="#">weman's fashion one pcs</a>
                            <p class="wsus__price">$59</p>
                            <a class="add_cart" href="#">add to cart</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-lg-4">
                    <div class="wsus__product_item">
                        <span class="wsus__new">New</span>

                        <a class="wsus__pro_link" href="product_details.html">
                            <img src="images/wemans_2.jpg" alt="product" class="img-fluid w-100 img_1" />
                            <img src="images/wemans_1.jpg" alt="product" class="img-fluid w-100 img_2" />
                        </a>
                        <ul class="wsus__single_pro_icon">
                            <li><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                                        class="far fa-eye"></i></a></li>
                            <li><a href="#"><i class="far fa-heart"></i></a></li>
                            <li><a href="#"><i class="far fa-random"></i></a>
                        </ul>
                        <div class="wsus__product_details">
                            <a class="wsus__category" href="#">fashion </a>
                            <p class="wsus__pro_rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <span>(99 review)</span>
                            </p>
                            <a class="wsus__pro_name" href="#">weman's fashion one pcs</a>
                            <p class="wsus__price">$59</p>
                            <a class="add_cart" href="#">add to cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!--============================
                                                                                                    ELECTRONIC PART END
                                                                                                ==============================-->


    {{-- LARGE BANNER  START --}}
    {{-- @include('frontend.home.section.bannerdeal') --}}



    <!--============================
                                                                                                    WEEKLY BEST ITEM START
                                                                                                ==============================-->
    {{-- @include('frontend.home.section.product-best-weekly') --}}
    <!--============================
                                                                                                    WEEKLY BEST ITEM END
                                                                                                ==============================-->


    <!--============================
                                                                                                  HOME SERVICES START
                                                                                                ==============================-->
    {{-- <section id="wsus__home_services" class="home_service_2">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-sm-6 col-lg-3 pe-lg-0">
                <div class="wsus__home_services_single home_service_single_2 border_left">
                    <i class="fal fa-truck"></i>
                    <h5>Free Worldwide Shipping</h5>
                    <p>Free shipping coast for all country</p>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-lg-3 pe-lg-0">
                <div class="wsus__home_services_single home_service_single_2">
                    <i class="fal fa-headset"></i>
                    <h5>24/7 Customer Support</h5>
                    <p>Friendly 24/7 customer support</p>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-lg-3 pe-lg-0">
                <div class="wsus__home_services_single home_service_single_2">
                    <i class="far fa-exchange-alt"></i>
                    <h5>Money Back Guarantee</h5>
                    <p>We return money within 30 days</p>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-lg-3">
                <div class="wsus__home_services_single home_service_single_2">
                    <i class="fal fa-credit-card"></i>
                    <h5>Secure Online Payment</h5>
                    <p>We posess SSL / Secure Certificate</p>
                </div>
            </div>
        </div>
    </div>
</section> --}}
    <!--============================
                                                                                                    HOME SERVICES END
                                                                                                ==============================-->

    @include('frontend.home.section.ads-3')

    {{-- Blog --}}
    @include('frontend.home.section.blog')
@endsection
