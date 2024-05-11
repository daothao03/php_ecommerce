@extends('frontend.layouts.master')

@section('title')
    Wishlists || {{ $settings->site_name }}
@endsection

@section('content')
    <section id="wsus__cart_view">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="wsus__cart_list wishlist">
                        <div class="table-responsive">
                            <table>
                                <tbody>
                                    <tr class="d-flex">
                                        <th class="wsus__pro_img">
                                            product item
                                        </th>

                                        <th style="width: 581px" class="wsus__pro_name">
                                            product details
                                        </th>

                                        <th class="wsus__pro_status">
                                            status
                                        </th>



                                        <th class="wsus__pro_tk">
                                            price
                                        </th>

                                        <th class="wsus__pro_icon">
                                            action
                                        </th>
                                    </tr>
                                    @foreach ($wishlists as $wishlist)
                                        <tr class="d-flex">
                                            <td class="wsus__pro_img"><img
                                                    style="width: 100px; height: 100px; object-fit: contain"
                                                    src="{{ asset($wishlist->product->thumb_image) }}" alt="product"
                                                    class="img-fluid w-100">
                                                <a href="{{ route('user.wishlist.remove', $wishlist->id) }}"><i
                                                        class="far fa-times"></i></a>
                                            </td>

                                            <td style="width: 581px" class="wsus__pro_name">
                                                <p>{{ $wishlist->product->name }}</p>
                                            </td>

                                            <td class="wsus__pro_status">
                                                <p>
                                                    @if ($wishlist->product->qty > 0)
                                                        <p><span class="in_stock">in stock</span> </p>
                                                    @elseif ($wishlist->product->qty === 0)
                                                        <p><span class="in_stock">Sold out</span> </p>
                                                    @endif
                                                </p>
                                            </td>

                                            <td class="wsus__pro_tk">
                                                {{-- <h6>{{ $wishlist->product->price }} {{ $settings->currency_icon }}</h6> --}}
                                                @if (checkDiscount($wishlist->product))
                                                    <h6>{{ number_format($wishlist->product->offer_price) }}
                                                        {{ $settings->currency_icon }}<del>{{ number_format($wishlist->product->price) }}
                                                            {{ $settings->currency_icon }}</del></h6>
                                                @else
                                                    <h6>{{ number_format($wishlist->product->price) }}
                                                        {{ $settings->currency_icon }}</h6>
                                                @endif
                                            </td>

                                            <td class="wsus__pro_icon">
                                                <a class=""
                                                    href="{{ route('product-detail', $wishlist->product->slug) }}">See
                                                    product</a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script></script>
@endpush
