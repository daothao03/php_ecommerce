@php
    $beautyTrends = json_decode($beautyTrends->value, true);
@endphp

<section id="wsus__hot_deals" class="wsus__hot_deals_2">
    <div class="container">
        <section class="ads ads-2 mb-5">
            <div class="content">
                @if ($threeBanner->banner_one->status == 1)
                    <a href="{{ $threeBanner->banner_one->banner_url }}" class="dis-link">
                        <img src="{{ asset($threeBanner->banner_one->banner_image) }}" alt="" />
                    </a>
                @endif
                @if ($threeBanner->banner_two->status == 1)
                    <a href="{{ $threeBanner->banner_two->banner_url }}" class="dis-link">
                        <img src="{{ asset($threeBanner->banner_two->banner_image) }}" alt="" />
                    </a>
                @endif
                @if ($threeBanner->banner_three->status == 1)
                    <a href="{{ $threeBanner->banner_three->banner_url }}" class="dis-link">
                        <img src="{{ asset($threeBanner->banner_three->banner_image) }}" alt="" />
                    </a>
                @endif
            </div>
        </section>

        <div class="row">
            <div class="col-xl-5"></div>
            <div class="col-xl-7">
                <div class="wsus__section_header">
                    <h3>XU HƯỚNG LÀM ĐẸP</h3>
                </div>
            </div>
        </div>
        {{-- <div class="row hot_deals_slider_2">
            <div class="col-xl-4 col-lg-6">
                <div class="wsus__hot_deals_offer">
                    <div class="wsus__hot_deals_img">
                        <img src="images/pro0010.jpg" alt="mobile" class="img-fluid w-100">
                    </div>
                    <div class="wsus__hot_deals_text">
                        <a class="wsus__hot_title" href="product_details.html">apple smart watch</a>
                        <p class="wsus__rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <span>(127 review)</span>
                        </p>
                        <p class="wsus__hot_deals_proce">$160 <del>$200</del></p>
                        <P class="wsus__details">
                            Lorem ipsum dolor sit amet, cons
                            ectetur incid duut labore et dol.
                            Re magna atellus in metus.
                        </P>
                        <ul>
                            <li><a class="add_cart" href="#">add to cart</a></li>
                            <li><a href="#"><i class="far fa-heart"></i></a></li>
                            <li><a href="#"><i class="far fa-random"></i></a></li>
                        </ul>
                        <div class="simply-countdown simply-countdown-one"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6">
                <div class="wsus__hot_deals_offer">
                    <div class="wsus__hot_deals_img">
                        <img src="images/pro0011.jpg" alt="mobile" class="img-fluid w-100">
                    </div>
                    <div class="wsus__hot_deals_text">
                        <a class="wsus__hot_title" href="product_details.html">portable mobile Speaker</a>
                        <p class="wsus__rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <span>(176 review)</span>
                        </p>
                        <p class="wsus__hot_deals_proce">$200 <del>$220</del></p>
                        <P class="wsus__details">
                            Lorem ipsum dolor sit amet, cons
                            ectetur incid duut labore et dol.
                            Re magna atellus in metus.
                        </P>
                        <ul>
                            <li><a class="add_cart" href="#">add to cart</a></li>
                            <li><a href="#"><i class="far fa-heart"></i></a></li>
                            <li><a href="#"><i class="far fa-random"></i></a></li>
                        </ul>
                        <div class="simply-countdown simply-countdown-one"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6">
                <div class="wsus__hot_deals_offer">
                    <div class="wsus__hot_deals_img">
                        <img src="images/pro0012.jpg" alt="mobile" class="img-fluid w-100">
                    </div>
                    <div class="wsus__hot_deals_text">
                        <a class="wsus__hot_title" href="product_details.html">apple smart watch</a>
                        <p class="wsus__rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <span>(127 review)</span>
                        </p>
                        <p class="wsus__hot_deals_proce">$160 <del>$200</del></p>
                        <P class="wsus__details">
                            Lorem ipsum dolor sit amet, cons
                            ectetur incid duut labore et dol.
                            Re magna atellus in metus.
                        </P>
                        <ul>
                            <li><a class="add_cart" href="#">add to cart</a></li>
                            <li><a href="#"><i class="far fa-heart"></i></a></li>
                            <li><a href="#"><i class="far fa-random"></i></a></li>
                        </ul>
                        <div class="simply-countdown simply-countdown-one"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6">
                <div class="wsus__hot_deals_offer">
                    <div class="wsus__hot_deals_img">
                        <img src="images/pro0013.jpg" alt="mobile" class="img-fluid w-100">
                    </div>
                    <div class="wsus__hot_deals_text">
                        <a class="wsus__hot_title" href="product_details.html">portable mobile Speaker</a>
                        <p class="wsus__rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <span>(176 review)</span>
                        </p>
                        <p class="wsus__hot_deals_proce">$200 <del>$220</del></p>
                        <P class="wsus__details">
                            Lorem ipsum dolor sit amet, cons
                            ectetur incid duut labore et dol.
                            Re magna atellus in metus vulpue
                            te eu sceleri que felis.
                        </P>
                        <ul>
                            <li><a class="add_cart" href="#">add to cart</a></li>
                            <li><a href="#"><i class="far fa-heart"></i></a></li>
                            <li><a href="#"><i class="far fa-random"></i></a></li>
                        </ul>
                        <div class="simply-countdown simply-countdown-one"></div>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="wsus__hot_large_item">
            <div class="row">
                <div class="col-xl-5"></div>
                <div class="col-xl-7">
                    <div class="wsus__section_header justify-content-start">
                        <div class="monthly_top_filter2 mb-1">
                            @php
                                $product = [];
                            @endphp
                            @foreach ($beautyTrends as $key => $item)
                                @php
                                    $lastKey = [];
                                    foreach ($item as $key => $category) {
                                        if ($category === null) {
                                            break;
                                        }
                                        //ghi đè cặp key-value đến khi xuất hiện value null
                                        $lastKey = [$key => $category];
                                    }
                                    //array_keys -> lấy về tập hợp các key của mảng
                                    if (array_keys($lastKey)[0] === 'category') {
                                        $category = \App\Models\Category::find($lastKey['category']);
                                        $products[] = \App\Models\Product::with([
                                            'variants',
                                            'category',
                                            'productImageGalleries',
                                            'reviews',
                                        ])
                                            ->where('category_id', $category->id)
                                            ->orderBy('id', 'DESC')
                                            ->take(12)
                                            ->get();
                                    } elseif (array_keys($lastKey)[0] === 'sub_category') {
                                        $category = \App\Models\SubCategory::find($lastKey['sub_category']);
                                        $products[] = \App\Models\Product::with([
                                            'variants',
                                            'category',
                                            'productImageGalleries',
                                            'reviews',
                                        ])
                                            ->where('sub_category_id', $category->id)
                                            ->orderBy('id', 'DESC')
                                            ->take(12)
                                            ->get();
                                    } else {
                                        $category = \App\Models\ChildCategory::find($lastKey['child_category']);
                                        $products[] = \App\Models\Product::with([
                                            'variants',
                                            'category',
                                            'productImageGalleries',
                                            'reviews',
                                        ])
                                            ->where('child_category_id', $category->id)
                                            ->orderBy('id', 'DESC')
                                            ->take(12)
                                            ->get();
                                    }
                                @endphp
                                <button class="{{ $loop->index == 0 ? 'auto_click active' : '' }} "
                                    data-filter=".category-{{ $loop->index }}">{{ $category->name }}</button>
                            @endforeach
                            {{-- <button class="ms-0 active" data-filter="*">music</button> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row grid2">
                @foreach ($products as $key => $product)
                    @foreach ($product as $item)
                        <div class="col-xl-3 col-sm-6 col-md-4 col-lg-3 category-{{ $key }}">
                            <div class="wsus__product_item">
                                <span class="wsus__minus">-20%</span>
                                <a class="wsus__pro_link" href="{{ route('product-detail', $item->slug) }}">
                                    {{-- <img src="{{ asset($item->thumb_image) }}" alt="product"
                                        class="img-fluid w-100 img_1" />
                                    <img src="" alt="product" class="img-fluid w-100 img_2" /> --}}
                                    <img src="{{ asset($item->thumb_image) }}" alt="product"
                                        class="img-fluid w-100 img_1" />
                                    <img src="
                                @if (isset($item->productImageGalleries[0]->image)) {{ asset($item->productImageGalleries[0]->image) }}
                                @else
                                    {{ asset($item->thumb_image) }} @endif
                            "
                                        alt="product" class="img-fluid w-100 img_2" />
                                </a>
                                <ul class="wsus__single_pro_icon">
                                    <li><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                                                class="far fa-eye"></i></a></li>
                                    <li><a href="#" data-id="{{ $item->id }}" class="add-wishlist"><i
                                                class="far fa-heart"></i></a></li>
                                    <li><a href="#"><i class="far fa-random"></i></a>
                                </ul>
                                <div class="wsus__product_details">
                                    <a class="wsus__category" href="#">{{ $item->category->name }} </a>
                                    <p class="wsus__pro_rating">
                                        @php
                                            $avg = $item->reviews()->avg('rating');
                                            $fullrating = round($avg);
                                        @endphp
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $fullrating)
                                                <i class="fas fa-star"></i>
                                            @else
                                                <i class="far fa-star"></i>
                                            @endif
                                        @endfor

                                        <span>({{ count($item->reviews) }} review)</span>
                                    </p>
                                    <a class="wsus__pro_name" href="#">{!! limitText($item->name) !!}</a>
                                    @if (checkDiscount($item))
                                        <p class="wsus__price">{{ number_format($item->offer_price) }}
                                            {{ $settings->currency_icon }}<del>{{ number_format($item->price) }}
                                                {{ $settings->currency_icon }}</del></p>
                                    @else
                                        <p class="wsus__price">{{ number_format($item->price) }}
                                            {{ $settings->currency_icon }}</p>
                                    @endif
                                    <form class="shopping-cart-form">
                                        <input type="hidden" name="product_id" value="{{ $item->id }}">
                                        @foreach ($item->variants as $variant)
                                            <select class=" d-none" name="variants_items[]">
                                                @foreach ($variant->productVariantItems as $variantItem)
                                                    <option value="{{ $variantItem->id }}"
                                                        {{ $variantItem->is_default == 1 ? 'selected' : '' }}>
                                                        {{ $variantItem->name }} ({{ $variantItem->price }}đ)</option>
                                                @endforeach

                                            </select>
                                        @endforeach
                                        <input name="qty" type="hidden" min="1" max="100"
                                            value="1" />
                                        <button type="submit" class="add_cart" href="#" style="border:none">add
                                            to
                                            cart</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>

        {{-- <section id="wsus__single_banner" class="home_2_single_banner">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="row">
                            <div class="col-4 mt-lg-4">
                                <div class="wsus__single_banner_content">
                                    <div class="wsus__single_banner_img">
                                        <a href="">
                                            <img src="{{ asset('frontend/images/single_banner_66.jpg') }}"
                                                alt="banner" class="img-fluid w-100">
                                        </a>
                                    </div>
                                    <div class="wsus__single_banner_text">
                                        <h6>sell on <span>42% off</span></h6>
                                        <h3>winter collection</h3>
                                        <a class="shop_btn" href="#">shop now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 mt-lg-4">
                                <div class="wsus__single_banner_content">
                                    <div class="wsus__single_banner_img">
                                        <a href="">
                                            <img src="{{ asset('frontend/images/single_banner_66.jpg') }}"
                                                alt="banner" class="img-fluid w-100">
                                        </a>
                                    </div>
                                    <div class="wsus__single_banner_text">
                                        <h6>sell on <span>42% off</span></h6>
                                        <h3>winter collection</h3>
                                        <a class="shop_btn" href="#">shop now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 mt-lg-4">
                                <div class="wsus__single_banner_content">
                                    <div class="wsus__single_banner_img">
                                        <img src="{{ asset('frontend/images/single_banner_66.jpg') }}" alt="banner"
                                            class="img-fluid w-100">
                                    </div>
                                    <div class="wsus__single_banner_text">
                                        <h6>sell on <span>42% off</span></h6>
                                        <h3>winter collection</h3>
                                        <a class="shop_btn" href="#">shop now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}

        {{-- <section class="ads ads-2">
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
        </section> --}}

    </div>

    {{-- <div class="wsus__hot_small_item wsus__hot_small_item_2">
            <div class="row">
                <div class="col-xl-2 col-6 col-sm-6 col-md-4 col-lg-3">
                    <a class="wsus__hot_deals__single" href="#">
                        <div class="wsus__hot_deals__single_img">
                            <img src="images/pro4_4.jpg" alt="bag" class="img-fluid w-100">
                        </div>
                        <div class="wsus__hot_deals__single_text">
                            <h5>men's casual watch</h5>
                            <p class="wsus__rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </p>
                            <p class="wsus__tk">$120.20 <del>130.00</del></p>
                        </div>
                    </a>
                </div>
                <div class="col-xl-2 col-6 col-sm-6 col-md-4 col-lg-3">
                    <a class="wsus__hot_deals__single" href="#">
                        <div class="wsus__hot_deals__single_img">
                            <img src="images/pro9.jpg" alt="bag" class="img-fluid w-100">
                        </div>
                        <div class="wsus__hot_deals__single_text">
                            <h5>men's sholder bag</h5>
                            <p class="wsus__rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </p>
                            <p class="wsus__tk">$120.20 <del>130.00</del></p>
                        </div>
                    </a>
                </div>
                <div class="col-xl-2 col-6 col-sm-6 col-md-4 col-lg-3">
                    <a class="wsus__hot_deals__single" href="#">
                        <div class="wsus__hot_deals__single_img">
                            <img src="images/pro9_9.jpg" alt="bag" class="img-fluid w-100">
                        </div>
                        <div class="wsus__hot_deals__single_text">
                            <h5>men's sholder bag</h5>
                            <p class="wsus__rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </p>
                            <p class="wsus__tk">$120.20 <del>130.00</del></p>
                        </div>
                    </a>
                </div>
                <div class="col-xl-2 col-6 col-sm-6 col-md-4 col-lg-3">
                    <a class="wsus__hot_deals__single" href="#">
                        <div class="wsus__hot_deals__single_img">
                            <img src="images/pro10.jpg" alt="bag" class="img-fluid w-100">
                        </div>
                        <div class="wsus__hot_deals__single_text">
                            <h5>MSI gaming chair</h5>
                            <p class="wsus__rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </p>
                            <p class="wsus__tk">$120.20 <del>130.00</del></p>
                        </div>
                    </a>
                </div>
                <div class="col-xl-2 col-6 col-sm-6 col-md-4 col-lg-3">
                    <a class="wsus__hot_deals__single" href="#">
                        <div class="wsus__hot_deals__single_img">
                            <img src="images/pro2.jpg" alt="bag" class="img-fluid w-100">
                        </div>
                        <div class="wsus__hot_deals__single_text">
                            <h5>men's shoes</h5>
                            <p class="wsus__rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </p>
                            <p class="wsus__tk">$120.20 <del>130.00</del></p>
                        </div>
                    </a>
                </div>
                <div class="col-xl-2 col-6 col-sm-6 col-md-4 col-lg-3">
                    <a class="wsus__hot_deals__single" href="#">
                        <div class="wsus__hot_deals__single_img">
                            <img src="images/pro2.jpg" alt="bag" class="img-fluid w-100">
                        </div>
                        <div class="wsus__hot_deals__single_text">
                            <h5>men's shoes</h5>
                            <p class="wsus__rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </p>
                            <p class="wsus__tk">$120.20 <del>130.00</del></p>
                        </div>
                    </a>
                </div>
                <div class="col-xl-2 col-6 col-sm-6 col-md-4 col-lg-3">
                    <a class="wsus__hot_deals__single" href="#">
                        <div class="wsus__hot_deals__single_img">
                            <img src="images/pro2.jpg" alt="bag" class="img-fluid w-100">
                        </div>
                        <div class="wsus__hot_deals__single_text">
                            <h5>men's shoes</h5>
                            <p class="wsus__rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </p>
                            <p class="wsus__tk">$120.20 <del>130.00</del></p>
                        </div>
                    </a>
                </div>
                <div class="col-xl-2 col-6 col-sm-6 col-md-4 col-lg-3">
                    <a class="wsus__hot_deals__single" href="#">
                        <div class="wsus__hot_deals__single_img">
                            <img src="images/pro2.jpg" alt="bag" class="img-fluid w-100">
                        </div>
                        <div class="wsus__hot_deals__single_text">
                            <h5>men's shoes</h5>
                            <p class="wsus__rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </p>
                            <p class="wsus__tk">$120.20 <del>130.00</del></p>
                        </div>
                    </a>
                </div>
                <div class="col-xl-2 col-6 col-sm-6 col-md-4 col-lg-3">
                    <a class="wsus__hot_deals__single" href="#">
                        <div class="wsus__hot_deals__single_img">
                            <img src="images/pro10.jpg" alt="bag" class="img-fluid w-100">
                        </div>
                        <div class="wsus__hot_deals__single_text">
                            <h5>MSI gaming chair</h5>
                            <p class="wsus__rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </p>
                            <p class="wsus__tk">$120.20 <del>130.00</del></p>
                        </div>
                    </a>
                </div>
                <div class="col-xl-2 col-6 col-sm-6 col-md-4 col-lg-3">
                    <a class="wsus__hot_deals__single" href="#">
                        <div class="wsus__hot_deals__single_img">
                            <img src="images/pro9_9.jpg" alt="bag" class="img-fluid w-100">
                        </div>
                        <div class="wsus__hot_deals__single_text">
                            <h5>men's sholder bag</h5>
                            <p class="wsus__rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </p>
                            <p class="wsus__tk">$120.20 <del>130.00</del></p>
                        </div>
                    </a>
                </div>
                <div class="col-xl-2 col-6 col-sm-6 col-md-4 col-lg-3">
                    <a class="wsus__hot_deals__single" href="#">
                        <div class="wsus__hot_deals__single_img">
                            <img src="images/pro9.jpg" alt="bag" class="img-fluid w-100">
                        </div>
                        <div class="wsus__hot_deals__single_text">
                            <h5>men's sholder bag</h5>
                            <p class="wsus__rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </p>
                            <p class="wsus__tk">$120.20 <del>130.00</del></p>
                        </div>
                    </a>
                </div>
                <div class="col-xl-2 col-6 col-sm-6 col-md-4 col-lg-3">
                    <a class="wsus__hot_deals__single" href="#">
                        <div class="wsus__hot_deals__single_img">
                            <img src="images/pro4_4.jpg" alt="bag" class="img-fluid w-100">
                        </div>
                        <div class="wsus__hot_deals__single_text">
                            <h5>men's casual watch</h5>
                            <p class="wsus__rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </p>
                            <p class="wsus__tk">$120.20 <del>130.00</del></p>
                        </div>
                    </a>
                </div>
            </div>
        </div> --}}
    </div>
</section>
