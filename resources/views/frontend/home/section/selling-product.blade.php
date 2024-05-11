<section id="wsus__electronic">
    <div class="container">
        <div class="row">

            <div class="col-xl-5"></div>
            <div class="col-xl-7">
                <div class="wsus__section_header">
                    <h3>TOP SẢN PHẨM BÁN CHẠY</h3>
                    <a class="see_btn" href="#">see more <i class="fas fa-caret-right"></i></a>
                </div>
            </div>

        </div>
        <div class="row flash_sell_slider">
            @foreach ($bestSellingProducts as $product)
                <div class="col-xl-3 col-sm-6 col-lg-4">
                    <div class="wsus__product_item">
                        <span class="wsus__new">New</span>
                        <a class="wsus__pro_link" href="{{ route('product-detail', $product->slug) }}">
                            {{-- <img src="{{ asset($product->thumb_image) }}" alt="product"
                                class="img-fluid w-100 img_1" />
                            <img src="" alt="product" class="img-fluid w-100 img_2" /> --}}
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
                                    data-bs-target="#exampleModal-{{ $product->id }}"><i class="far fa-eye"></i></a>
                            </li>
                            <li><a href="#" data-id="{{ $product->id }}" class="add-wishlist"><i
                                        class="far fa-heart"></i></a></li>
                            <li><a href="#"><i class="far fa-random"></i></a>
                        </ul>
                        <div class="wsus__product_details">
                            <a class="wsus__category" href="#">{{ $product->category->name }}</a>
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
                            <a class="wsus__pro_name" href="#">{!! limitText($product->name) !!}</a>
                            @if (checkDiscount($product))
                                <p class="wsus__price">{{ number_format($product->offer_price) }}
                                    {{ $settings->currency_icon }}<del>{{ number_format($product->price) }}
                                        {{ $settings->currency_icon }}</del></p>
                            @else
                                <p class="wsus__price">{{ number_format($product->price) }}
                                    {{ $settings->currency_icon }}</p>
                            @endif
                            <form class="shopping-cart-form">
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                @foreach ($product->variants as $variant)
                                    <select class=" d-none" name="variants_items[]">
                                        @foreach ($variant->productVariantItems as $variantItem)
                                            <option value="{{ $variantItem->id }}"
                                                {{ $variantItem->is_default == 1 ? 'selected' : '' }}>
                                                {{ $variantItem->name }} ({{ $variantItem->price }}đ)</option>
                                        @endforeach

                                    </select>
                                @endforeach
                                <input name="qty" type="hidden" min="1" max="100" value="1" />
                                <button type="submit" class="add_cart" href="#" style="border:none">add
                                    to
                                    cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
