@extends('frontend.layouts.master')

@section('title')
    Checkout || {{ $settings->site_name }}
@endsection

@section('content')
    <section id="wsus__cart_view">
        <div class="container">

            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <div class="wsus__check_form">
                        <h5>Checkout <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">add
                                new address</a></h5>
                        <div class="row">
                            @foreach ($addresses as $address)
                                <div class="col-xl-6">
                                    <div class="wsus__checkout_single_address">
                                        <div class="form-check">
                                            <input class="form-check-input shipping_address" type="radio"
                                                name="flexRadioDefault" id="flexRadioDefault1" data-id="{{ $address->id }}"
                                                checked>
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Select Address
                                            </label>
                                        </div>
                                        <ul>
                                            <li> {{ $address->name }} - {{ $address->phone }}</li>
                                            {{-- <li><span>Phone :</span> {{ $address->phone }}</li>
                                                <li><span>Email :</span> {{ $address->email }}</li>
                                                <li><span>Country :</span> {{ $address->country }}</li>
                                                <li><span>City :</span> {{ $address->city }}</li> --}}
                                            <li>{{ $address->address }}, {{ $address->city }},
                                                {{ $address->state }}, {{ $address->country }}</li>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5">
                    <div class="wsus__order_details" id="sticky_sidebar">
                        <p class="wsus__product">shipping Methods</p>
                        @foreach ($shipping as $shippingMethod)
                            @if ($shippingMethod->type === 'min_cost' && getCartTotal() >= $shippingMethod->min_cost)
                                <div class="form-check">
                                    <input class="form-check-input shipping_method" type="radio" name="exampleRadios"
                                        id="exampleRadios1" value="{{ $shippingMethod->id }}"
                                        data-id="{{ $shippingMethod->cost }}">
                                    <label class="form-check-label" for="exampleRadios1">
                                        {{ $shippingMethod->name }} (Minimum order value:
                                        {{ $shippingMethod->min_cost }})
                                        <span>({{ number_format($shippingMethod->cost) }}
                                            {{ $settings->currency_icon }})</span>
                                    </label>
                                </div>
                            @elseif ($shippingMethod->type === 'flat_cost')
                                <div class="form-check">
                                    <input class="form-check-input shipping_method" type="radio" name="exampleRadios"
                                        id="exampleRadios1" value="{{ $shippingMethod->id }}"
                                        data-id="{{ $shippingMethod->cost }}">
                                    <label class="form-check-label" for="exampleRadios1">
                                        {{ $shippingMethod->name }}
                                        <span>({{ number_format($shippingMethod->cost) }}
                                            {{ $settings->currency_icon }})</span>
                                    </label>
                                </div>
                            @endif
                        @endforeach
                        <div class="wsus__order_details_summery">
                            <p>subtotal: <span>{{ number_format(getCartTotal()) }}
                                    {{ $settings->currency_icon }}</span>
                            </p>
                            <p>shipping fee: <span id="shipping_fee">0{{ $settings->currency_icon }}</span></p>
                            <p>coupon(-):
                                <span>{{ number_format(getCartDiscount()) }}{{ $settings->currency_icon }}</span>
                            </p>
                            <p><b>total:</b>
                                <span id="total_amount"
                                    data-id="{{ getMainCartTotal() }}"><b>{{ number_format(getMainCartTotal()) }}{{ $settings->currency_icon }}</b></span>
                            </p>
                        </div>
                        <div class="terms_area">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked3"
                                    checked>
                                <label class="form-check-label" for="flexCheckChecked3">
                                    I have read and agree to the website <a href="#">terms and conditions *</a>
                                </label>
                            </div>
                        </div>
                        <form action="" id="checkOutForm">
                            <input type="hidden" name="shipping_method_id" value="" id="shipping_method_id">
                            <input type="hidden" name="shipping_address_id" value="" id="shipping_address_id">
                        </form>
                        <a href="" id="submitCheckout" class="common_btn">Payment</a>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <div class="wsus__popup_address">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">add new address</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-0">
                        <div class="wsus__check_form p-3">
                            <form action="{{ route('user.checkout-new-address') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="wsus__check_single_form">
                                            <input type="text" value="{{ old('name') }}" placeholder="Name"
                                                name="name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="wsus__check_single_form">
                                            <input type="email" value="{{ old('email') }}" placeholder="Email"
                                                name="email">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="wsus__check_single_form">
                                            <input type="text" value="{{ old('phone') }}" placeholder="Phone"
                                                name="phone">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="wsus__check_single_form">
                                            <select class="select_2" name="country">
                                                <option>Select</option>
                                                @foreach (config('settings.country_list') as $country)
                                                    <option {{ $country === old('country') ? 'selected' : '' }}
                                                        value="{{ $country }}">{{ $country }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="wsus__check_single_form">
                                            <input type="text" value="{{ old('state') }}" placeholder="State"
                                                name="state">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="wsus__check_single_form">
                                            <input type="text" value="{{ old('city') }}" placeholder="City"
                                                name="city">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="wsus__check_single_form">
                                            <input type="text" value="{{ old('address') }}" placeholder="Address"
                                                name="address">
                                        </div>
                                    </div>

                                    <div class="col-xl-12">
                                        <div class="wsus__check_single_form">
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // khi tai lai trang => radio van duoc check, gia tri thi mat
            $('input[type="radio"]').prop('checked', false);
            $('#shipping_method_id').val("");
            $('#shipping_address_id').val("");

            $('.shipping_method').on('click', function() {
                let shippingFee = $(this).data('id');
                let current_total = $('#total_amount').data('id');
                let total = current_total + shippingFee;

                $('#shipping_method_id').val($(this).val());
                // console.log(input.val());
                $('#shipping_fee').text(shippingFee + "{{ $settings->currency_icon }}");

                $('#total_amount').text(total + "{{ $settings->currency_icon }}")
            })

            $('.shipping_address').on('click', function() {
                $('#shipping_address_id').val($(this).data('id'));
            })

            // $('#submitCheckout').on('click', function(event) {
            //     event.preventDefault();
            //     if ($('#shipping_method_id').val() == "") {
            //         toastr.error('Please choose payment method');
            //     } else if ($('#shipping_address_id').val() == "") {
            //         toastr.error('Please select delivery address');
            //     } else if (!$('.agree_term').prop('checked')) {
            //         toastr.error('You have to agree website terms and conditions');
            //     } else {
            //         $.ajax({
            //             url: "{{ route('user.checkout-form-submit') }}",
            //             method: 'post',
            //             data: $('#checkOutForm').serialize(),
            //             success: function(data) {
            //                 if (data.status === 'success') {
            //                     // $('#submitCheckoutForm').text('Place Order')
            //                     // // redirect user to next page
            //                     // window.location.href = data.redirect_url;
            //                 }
            //             },
            //             error: function(data) {
            //                 console.log(data);
            //             }
            //         })
            //     }
            // })

            // submit checkout form
            $('#submitCheckout').on('click', function(e) {
                e.preventDefault();
                if ($('#shipping_method_id').val() == "") {
                    toastr.error('Please choose payment method');
                } else if ($('#shipping_address_id').val() == "") {
                    toastr.error('Please select delivery address');
                } else {
                    $.ajax({
                        url: "{{ route('user.checkout-form-submit') }}",
                        method: 'POST',
                        data: $('#checkOutForm').serialize(),
                        beforeSend: function() {
                            $('#submitCheckout').html(
                                '<i class="fas fa-spinner fa-spin fa-1x"></i>')
                        },
                        success: function(data) {
                            if (data.status === 'success') {
                                $('#submitCheckout').text('Order')
                                window.location.href = data.redirect_url;
                            }
                        },
                        error: function(data) {
                            console.log(data);
                        }
                    })
                }
            })
        })
    </script>
@endpush
