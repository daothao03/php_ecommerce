@extends('frontend.layouts.master')

@section('title')
    Cart || {{ $settings->site_name }}
@endsection

@section('content')
    <section id="wsus__cart_view">
        <div class="container">
            <div class="row">
                <div class="col-xl-9">
                    <div class="wsus__cart_list">
                        <div class="table-responsive">
                            <table>
                                <tbody>
                                    <tr class="d-flex">
                                        <th class="wsus__pro_img">
                                            product item
                                        </th>

                                        <th class="wsus__pro_name">
                                            product details
                                        </th>

                                        <th class="wsus__pro_tk">
                                            Unit price
                                        </th>

                                        <th class="wsus__pro_select">
                                            quantity
                                        </th>

                                        <th class="wsus__pro_tk">
                                            Total price
                                        </th>

                                        <th class="wsus__pro_icon">
                                            <a href="#" class="common_btn clear_cart">clear cart</a>
                                        </th>
                                    </tr>
                                    @foreach ($cartItems as $cartItem)
                                        <tr class="d-flex">
                                            <td class="wsus__pro_img"><img src="{{ asset($cartItem->options->image) }}"
                                                    alt="product" class="img-fluid w-100">
                                            </td>

                                            <td class="wsus__pro_name">
                                                <p>{!! $cartItem->name !!}</p>
                                                @foreach ($cartItem->options->variants as $key => $variant)
                                                    <span>{{ $key }}: {{ $variant['name'] }} -
                                                        {{ $cartItem->price + $variant['price'] . $settings->currency_icon }}</span>
                                                @endforeach

                                            </td>

                                            <td class="wsus__pro_tk">
                                                <h6>{{ $cartItem->price . $settings->currency_icon }}</h6>
                                            </td>

                                            <td class="wsus__pro_select">
                                                <div class="product_qty_wrapper">
                                                    <button class="btn product-decrement">-</button>
                                                    <input data-rowid="{{ $cartItem->rowId }}" value="{{ $cartItem->qty }}"
                                                        class="product-qty" type="text" min="1" max="100"
                                                        value="1" readonly />
                                                    <button class="btn product-increment">+</button>
                                                </div>
                                            </td>

                                            <td class="wsus__pro_tk">
                                                <h6 id={{ $cartItem->rowId }}>
                                                    {{-- {{ ($cartItem->price + $cartItem->options->variants_total) * $cartItem->qty . $settings->currency_icon }} --}}
                                                    {{ number_format(($cartItem->price + $cartItem->options->variants_total) * $cartItem->qty, 2) . $settings->currency_icon }}

                                                </h6>
                                            </td>


                                            <td class="wsus__pro_icon">
                                                <a href="{{ route('remove-cart-product', $cartItem->rowId) }}"><i
                                                        class="far fa-times"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach

                                    @if (count($cartItems) === 0)
                                        <tr class="d-flex">
                                            <td class="wsus__pro_icon" rowspan="2" style="width:100%">
                                                Cart is empty!
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="wsus__cart_list_footer_button" id="sticky_sidebar">
                        <h6>total cart</h6>
                        {{-- {{ getCartTotal() }}{{ $settings->currency_icon }} --}}
                        <p>subtotal: <span
                                id="sub_total">{{ number_format(getCartTotal()) }}{{ $settings->currency_icon }}</span>
                        </p>
                        {{-- {{ getCartDiscount() }}{{ $settings->currency_icon }} --}}
                        <p>discount: <span
                                id="discount">{{ number_format(getCartDiscount()) }}{{ $settings->currency_icon }}</span>
                        </p>
                        {{-- {{ $settings->currency_icon }}{{ getMainCartTotal() }} --}}
                        <p class="total"><span>total:</span> <span
                                id="cart_total">{{ number_format(getMainCartTotal()) }}{{ $settings->currency_icon }}</span>
                        </p>

                        <form id="coupon-form">
                            <input type="text" name="coupon_code"
                                value="{{ session()->has('coupon') ? session()->get('coupon')['coupon_code'] : '' }}"
                                placeholder="Coupon Code">
                            <button type="submit" class="common_btn">apply</button>
                        </form>

                        <a class="common_btn mt-4 w-100 text-center" href="{{ route('user.checkout') }}">checkout</a>
                        <a class="common_btn mt-1 w-100 text-center" href="{{ route('home') }}"><i
                                class="fab fa-shopify"></i> keep shopping</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- <section id="wsus__single_banner">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="wsus__single_banner_content">
                        <div class="wsus__single_banner_img">
                            <img src="images/single_banner_2.jpg" alt="banner" class="img-fluid w-100">
                        </div>
                        <div class="wsus__single_banner_text">
                            <h6>sell on <span>35% off</span></h6>
                            <h3>smart watch</h3>
                            <a class="shop_btn" href="#">shop now</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="wsus__single_banner_content single_banner_2">
                        <div class="wsus__single_banner_img">
                            <img src="images/single_banner_3.jpg" alt="banner" class="img-fluid w-100">
                        </div>
                        <div class="wsus__single_banner_text">
                            <h6>New Collection</h6>
                            <h3>Cosmetics</h3>
                            <a class="shop_btn" href="#">shop now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            //tang slg
            $('.product-increment').on('click', function() {
                let input = $(this).siblings('.product-qty');
                let quantity = parseInt(input.val()) + 1;
                input.val(quantity);
                let rowId = input.data('rowid');
                // console.log(quantity);

                $.ajax({
                    url: "{{ route('cart.update-qty') }}",
                    method: 'POST',
                    data: {
                        rowId: rowId,
                        quantity: quantity
                    },
                    success: function(data) {
                        if (data.status === 'success') {
                            let productId = '#' + rowId;
                            let totalAmount = data.product_total +
                                "{{ $settings->currency_icon }}"
                            $(productId).text(totalAmount)

                            renderCartSubTotal();
                            couponCalculation();
                            // calculateCouponDescount()

                            toastr.success(data.message)
                        } else if (data.status === 'error') {
                            toastr.error(data.message)
                        }
                    },
                    error: function(data) {

                    }
                })

            })

            //giam slg
            $('.product-decrement').on('click', function() {
                let input = $(this).siblings('.product-qty');
                let quantity = parseInt(input.val()) - 1;

                if (quantity < 1) {
                    quantity = 1;
                }
                input.val(quantity);
                let rowId = input.data('rowid');
                // console.log(quantity);

                $.ajax({
                    url: "{{ route('cart.update-qty') }}",
                    method: 'POST',
                    data: {
                        rowId: rowId,
                        quantity: quantity
                    },
                    success: function(data) {
                        if (data.status === 'success') {
                            let productId = '#' + rowId;
                            let totalAmount = data.product_total +
                                "{{ $settings->currency_icon }}"
                            $(productId).text(totalAmount)

                            renderCartSubTotal()
                            couponCalculation()
                            // calculateCouponDescount()

                            toastr.success(data.message)
                        } else if (data.status === 'error') {
                            toastr.error(data.message)
                        }
                    },
                    error: function(data) {

                    }
                })

            })

            //remove all cart
            $('.clear_cart').on('click', function(event) {
                event.preventDefault();

                Swal.fire({
                    title: 'Are you sure?',
                    text: "Clear your cart!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes'
                }).then((result) => {
                    if (result.isConfirmed) {

                        $.ajax({
                            type: 'get',
                            url: "{{ route('remove-cart') }}",

                            success: function(data) {
                                if (data.status === 'success') {
                                    window.location.reload();
                                }
                            },
                            error: function(xhr, status, error) {
                                console.log(error);
                            }
                        })
                    }
                })
            })

            // get subtotal of cart and put it on dom
            function renderCartSubTotal() {
                $.ajax({
                    method: 'GET',
                    url: "{{ route('cart.cart-subtotal') }}",
                    success: function(data) {
                        $('#sub_total').text(data + "{{ $settings->currency_icon }}");
                    },
                    error: function(data) {

                    }
                })
            }

            //apply Coupon
            $('#coupon-form').on('submit', function(event) {
                event.preventDefault();
                let formData = $(this).serialize();
                $.ajax({
                    method: 'GET',
                    data: formData,
                    url: "{{ route('apply-coupon') }}",
                    success: function(data) {
                        // console.log(data);
                        if (data.status === 'success') {
                            couponCalculation()
                            toastr.success(data.message)
                        } else if (data.status === 'error') {
                            toastr.error(data.message)
                        }
                    },
                    error: function(data) {

                    }
                })
            })

            //tong tien khi ap dung phieu giam gia
            function couponCalculation() {
                $.ajax({
                    method: 'GET',
                    url: "{{ route('subtotal-apply-coupon') }}",
                    success: function(data) {
                        // console.log(data);
                        if (data.status === 'success') {
                            $('#discount').text(data.discount + '{{ $settings->currency_icon }}');
                            $('#cart_total').text(data.cart_total + '{{ $settings->currency_icon }}');
                        }
                    },
                    error: function(data) {

                    }
                })
            }

        })
    </script>
@endpush
