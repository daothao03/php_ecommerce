@extends('frontend.layouts.master')

@section('title')
    All Product || {{ $settings->site_name }}
@endsection

@section('content')
    <section id="wsus__product_page">
        <div class="container">
            <div class="row">
                {{-- <div class="col-xl-12">
                    <div class="wsus__pro_page_bammer">
                        <img src="images/pro_banner_1.jpg" alt="banner" class="img-fluid w-100">
                    </div>
                    <div class="wsus__pro_page_bammer_text">
                        <div class="wsus__pro_page_bammer_text_center">
                            <p>up to <span>70% off</span></p>
                            <h5>wemen's jeans Collection</h5>
                            <h3>fashion for wemen's</h3>
                            <a href="#" class="add_cart">Discover Now</a>
                        </div>
                    </div>
                </div> --}}
                <div class="col-xl-3 col-lg-4">
                    <div class="wsus__sidebar_filter ">
                        <p>filter</p>
                        <span class="wsus__filter_icon">
                            <i class="far fa-minus" id="minus"></i>
                            <i class="far fa-plus" id="plus"></i>
                        </span>
                    </div>
                    <div class="wsus__product_sidebar" id="sticky_sidebar">
                        <div class="accordion" id="accordionExample">
                            {{-- filter with  category --}}
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        All Categories
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <ul>
                                            @foreach ($categories as $category)
                                                <li><a
                                                        href="{{ route('products.index', ['category' => $category->slug]) }}">{{ $category->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            {{-- filter with price --}}
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Price
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="price_ranger">
                                            <form action="{{ url()->current() }}">
                                                @foreach (request()->query() as $key => $value)
                                                    @if ($key !== 'price_filter')
                                                        <input type="hidden" name="{{ $key }}"
                                                            value="{{ $value }}" />
                                                    @endif
                                                @endforeach
                                                <input type="hidden" name="price_filter" id="slider_range"
                                                    class="flat-slider" />
                                                <button type="submit" class="common_btn">filter</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- filter with brand --}}
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree3">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree3" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        brand
                                    </button>
                                </h2>
                                <div id="collapseThree3" class="accordion-collapse collapse show"
                                    aria-labelledby="headingThree3" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <ul>
                                            @foreach ($brands as $brand)
                                                <li><a
                                                        href="{{ route('products.index', ['brand' => $brand->slug]) }}">{{ $brand->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                        color
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse show"
                                    aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefaultc1">
                                            <label class="form-check-label" for="flexCheckDefaultc1">
                                                black
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckCheckedc2">
                                            <label class="form-check-label" for="flexCheckCheckedc2">
                                                white
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckCheckedc3">
                                            <label class="form-check-label" for="flexCheckCheckedc3">
                                                green
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckCheckedc4">
                                            <label class="form-check-label" for="flexCheckCheckedc4">
                                                pink
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckCheckedc5">
                                            <label class="form-check-label" for="flexCheckCheckedc5">
                                                red
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8">
                    <div class="row">
                        <div class="col-xl-12 d-none d-md-block mt-md-4 mt-lg-0">
                            <div class="wsus__product_topbar">
                                <div class="wsus__product_topbar_left">
                                    <div class="nav nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                        <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill"
                                            data-bs-target="#v-pills-home" type="button" role="tab"
                                            aria-controls="v-pills-home" aria-selected="true">
                                            <i class="fas fa-th"></i>
                                        </button>

                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                                aria-labelledby="v-pills-home-tab">
                                <div class="row">
                                    @foreach ($products as $product)
                                        {{-- <div class="col-xl-4  col-sm-6">
                                            <div class="wsus__product_item">
                                                <span class="wsus__new">New</span>
                                                <span class="wsus__minus">-20%</span>
                                                <a class="wsus__pro_link" href="product_details.html">
                                                    <img src="images/pro4.jpg" alt="product"
                                                        class="img-fluid w-100 img_1" />
                                                    <img src="images/pro4_4.jpg" alt="product"
                                                        class="img-fluid w-100 img_2" />
                                                </a>
                                                <ul class="wsus__single_pro_icon">
                                                    <li><a href="#" data-bs-toggle="modal"
                                                            data-bs-target="#exampleModal"><i class="far fa-eye"></i></a>
                                                    </li>
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
                                                        <span>(17 review)</span>
                                                    </p>
                                                    <a class="wsus__pro_name" href="#">men's casual fashion
                                                        watch</a>
                                                    <p class="wsus__price">$159 <del>$200</del></p>
                                                    <a class="add_cart" href="#">add to cart</a>
                                                </div>
                                            </div>
                                        </div> --}}
                                        <div class="col-xl-4 col-sm-6 col-lg-4">

                                            <div class="wsus__product_item">
                                                <span class="wsus__new">{{ productType($product->product_type) }}</span>
                                                @if (checkDiscount($product))
                                                    <span
                                                        class="wsus__minus">-{{ calculateDiscountPercent($product->price, $product->offer_price) }}%</span>
                                                @endif
                                                <a class="wsus__pro_link"
                                                    href="{{ route('product-detail', $product->slug) }}">
                                                    <img src="{{ asset($product->thumb_image) }}" alt="product"
                                                        class="img-fluid w-100 img_1" />
                                                    <img src="
                                                    @if (isset($product->productImageGalleries[0]->image)) {{ asset($product->productImageGalleries[0]->image) }}
                                                    @else
                                                        {{ asset($product->thumb_image) }} @endif
                                                "
                                                        alt="product" class="img-fluid w-100 img_2" />
                                                </a>
                                                <ul class="wsus__single_pro_icon">
                                                    <li><a href="#" data-bs-toggle="modal"
                                                            data-bs-target="#exampleModal-{{ $product->id }}"><i
                                                                class="far fa-eye"></i></a></li>
                                                    <li><a href="#"><i class="far fa-heart"></i></a></li>
                                                    <li><a href="#"><i class="far fa-random"></i></a>
                                                </ul>
                                                <div class="wsus__product_details">
                                                    <a class="wsus__category"
                                                        href="#">{{ $product->category->name }} </a>
                                                    <p class="wsus__pro_rating">
                                                        @php
                                                            $avg = $product->reviews()->avg('rating');
                                                            $fullrating = round($avg);
                                                        @endphp
                                                        @for ($i = 1; $i <= 5; $i++)
                                                            @if ($i <= $fullrating)
                                                                <i class="fas fa-star"></i>
                                                            @else
                                                                <i class="far fa-star"></i>
                                                            @endif
                                                        @endfor

                                                        <span>({{ count($product->reviews) }} review)</span>
                                                    </p>
                                                    <a class="wsus__pro_name"
                                                        href="{{ route('product-detail', $product->slug) }}">{{ limitText($product->name) }}</a>
                                                    @if (checkDiscount($product))
                                                        <p class="wsus__price">{{ number_format($product->offer_price) }}
                                                            {{ $settings->currency_icon }}<del>{{ number_format($product->price) }}
                                                                {{ $settings->currency_icon }}</del></p>
                                                    @else
                                                        <p class="wsus__price">{{ number_format($product->price) }}
                                                            {{ $settings->currency_icon }}</p>
                                                    @endif

                                                    <form class="shopping-cart-form">
                                                        <input type="hidden" name="product_id"
                                                            value="{{ $product->id }}">
                                                        @foreach ($product->variants as $variant)
                                                            <select class=" d-none" name="variants_items[]">
                                                                @foreach ($variant->productVariantItems as $variantItem)
                                                                    <option value="{{ $variantItem->id }}"
                                                                        {{ $variantItem->is_default == 1 ? 'selected' : '' }}>
                                                                        {{ $variantItem->name }}
                                                                        ({{ $variantItem->price }}đ)
                                                                    </option>
                                                                @endforeach

                                                            </select>
                                                        @endforeach
                                                        <input name="qty" type="hidden" min="1"
                                                            max="100" value="1" />
                                                        <button type="submit" class="add_cart" href="#"
                                                            style="border:none">add to
                                                            cart</button>
                                                    </form>
                                                </div>
                                            </div>

                                        </div>
                                    @endforeach
                                </div>
                                {{-- <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                                    aria-labelledby="v-pills-profile-tab">
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="wsus__product_item wsus__list_view">
                                                <span class="wsus__new">New</span>
                                                <span class="wsus__minus">-20%</span>
                                                <a class="wsus__pro_link" href="product_details.html">
                                                    <img src="images/pro4.jpg" alt="product"
                                                        class="img-fluid w-100 img_1" />
                                                    <img src="images/pro4_4.jpg" alt="product"
                                                        class="img-fluid w-100 img_2" />
                                                </a>
                                                <div class="wsus__product_details">
                                                    <a class="wsus__category" href="#">fashion </a>
                                                    <p class="wsus__pro_rating">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star-half-alt"></i>
                                                        <span>(17 review)</span>
                                                    </p>
                                                    <a class="wsus__pro_name" href="#">men's casual fashion
                                                        watch</a>
                                                    <p class="wsus__price">$159 <del>$200</del></p>
                                                    <p class="list_description">Ultrices eros in cursus turpis massa cursus
                                                        mattis. Volutpat ac tincidunt vitae semper quis lectus. Aliquam id
                                                        diam maecenas ultricies… </p>
                                                    <ul class="wsus__single_pro_icon">
                                                        <li><a class="add_cart" href="#">add to cart</a></li>
                                                        <li><a href="#"><i class="far fa-heart"></i></a></li>
                                                        <li><a href="#"><i class="far fa-random"></i></a>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>

                    @if (count($products) === 0)
                        <div class="text-center mt-3">
                            <h5>Product not found</h5>
                        </div>
                    @endif
                </div>

                <div class="col-xl-12">
                    <div class="mt-5" style="display: flex; justify-content:center">
                        @if ($products->hasPages())
                            {{ $products->withQueryString()->links() }}
                        @endif
                    </div>
                </div>
            </div>

    </section>
    @include('frontend.home.section.ads-3')

    @foreach ($products as $product)
        <section class="product_popup_modal">
            <div class="modal fade" id="exampleModal-{{ $product->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                                    class="far fa-times"></i></button>
                            <div class="row">
                                <div class="col-xl-6 col-12 col-sm-10 col-md-8 col-lg-6 m-auto display">
                                    <div class="wsus__quick_view_img">
                                        {{-- <a class="venobox wsus__pro_det_video" data-autoplay="true" data-vbtype="video"
                                    href="https://youtu.be/7m16dFI1AF8">
                                    <i class="fas fa-play"></i>
                                </a> --}}
                                        <div class="row modal_slider">
                                            <div class="col-xl-12">
                                                <div class="modal_slider_img">
                                                    <img src="{{ asset($product->thumb_image) }}"
                                                        alt="{{ $product->name }}" class="img-fluid w-100">
                                                </div>
                                            </div>

                                            @if (count($product->productImageGalleries) === 0)
                                                <div class="col-xl-12">
                                                    <div class="modal_slider_img">
                                                        <img src="{{ asset($product->thumb_image) }}"
                                                            alt="{{ $product->name }}" class="img-fluid w-100">
                                                    </div>
                                                </div>
                                            @endif
                                            @foreach ($product->productImageGalleries as $image)
                                                <div class="col-xl-12">
                                                    <div class="modal_slider_img">
                                                        <img src="{{ asset($image->image) }}" alt="{{ $product->name }}"
                                                            class="img-fluid w-100">
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>


                                    </div>
                                </div>
                                <div class="col-xl-6 col-12 col-sm-12 col-md-12 col-lg-6">
                                    <div class="wsus__pro_details_text">
                                        <a class="title" href="#">{{ $product->name }}</a>
                                        <p class="wsus__stock_area"><span class="in_stock">in stock</span> (167 item)</p>
                                        @if (checkDiscount($product))
                                            <h4>{{ number_format($product->offer_price) }}
                                                {{ $settings->currency_icon }}<del>{{ number_format($product->price) }}
                                                    {{ $settings->currency_icon }}</del></h4>
                                        @else
                                            <h4>{{ number_format($product->price) }} {{ $settings->currency_icon }}</h4>
                                        @endif
                                        <p class="review">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                            <span>20 review</span>
                                        </p>
                                        <p class="description">{{ $product->short_description }}</p>

                                        <form class="shopping-cart-form">
                                            <div class="wsus__selectbox">
                                                <div class="row">

                                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                    @foreach ($product->variants as $variant)
                                                        @if ($variant->status !== 0)
                                                            <div class="col-xl-6 col-sm-6">
                                                                <h5 class="mb-2">{{ $variant->name }}:</h5>
                                                                <select class="select_2" name="variants_items[]">
                                                                    @foreach ($variant->productVariantItems as $variantItem)
                                                                        @if ($variantItem->status !== 0)
                                                                            <option value="{{ $variantItem->id }}"
                                                                                {{ $variantItem->is_default == 1 ? 'selected' : '' }}>
                                                                                {{ $variantItem->name }}
                                                                                ({{ $variantItem->price }}đ)
                                                                            </option>
                                                                        @endif
                                                                    @endforeach

                                                                </select>
                                                            </div>
                                                        @endif
                                                    @endforeach

                                                </div>
                                            </div>
                                            <div class="wsus__quentity">
                                                <h5>quantity :</h5>
                                                <div class="select_number">
                                                    <input name="qty" class="number_area" type="text"
                                                        min="1" max="100" value="1" />
                                                </div>
                                                {{-- <h3>$50.00</h3> --}}
                                            </div>

                                            <ul class="wsus__button_area">
                                                <li><button type="submit" class="add_cart" href="#">add to
                                                        cart</button></li>
                                                <li><a class="buy_now" href="#">buy now</a></li>
                                                <li><a href="#"><i class="fal fa-heart"></i></a></li>
                                                <li><a href="#"><i class="far fa-random"></i></a></li>
                                            </ul>
                                        </form>
                                        <p class="brand_model"><span>brand :</span> {{ $product->brand->name }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endforeach
@endsection

@push('scripts')
    <script>
        @php
            if (request()->has('price_filter') && request()->price_filter != '') {
                $price = explode(';', request()->price_filter);
                $from = $price[0];
                $to = $price[1];
            } else {
                $from = 0;
                $to = 3000000;
            }

        @endphp
        jQuery(function() {
            jQuery("#slider_range").flatslider({
                min: 0,
                max: 3000000,
                step: 100,
                values: [{{ $from }}, {{ $to }}],
                range: true,
                einheit: '{{ $settings->currency_icon }}'
            });
        });
    </script>
@endpush
