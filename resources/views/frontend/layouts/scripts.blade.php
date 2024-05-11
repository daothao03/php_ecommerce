<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        //add to cart
        $('.shopping-cart-form').on('submit', function(e) {
            e.preventDefault();
            let formData = $(this).serialize();

            // console.log(formData);
            $.ajax({
                method: 'POST',
                data: formData,
                url: "{{ route('add-to-cart') }}",
                success: function(data) {
                    if (data.status === 'success') {
                        cartCount()
                        fetchCartModal()
                        $('.mini_cart_actions').removeClass('d-none');
                        toastr.success(data.message);
                    } else if (data.status === 'error') {
                        toastr.error(data.message);
                    }
                },
                error: function(data) {

                }
            })
        })

        function cartCount() {
            $.ajax({
                method: 'GET',
                url: "{{ route('cart-count') }}",
                success: function(data) {
                    $('#cart-count').text(data);
                },
                error: function(data) {

                }
            })
        }

        //them li khi add to cart
        function fetchCartModal() {

            $.ajax({
                method: 'GET',
                url: "{{ route('cart-sidebar') }}",
                success: function(data) {
                    // toastr.success(data.message)
                    console.log(data);

                    var html = '';
                    for (let item in data) {
                        html += (`
                        <li id="mini_cart_${data[item].rowId}">
                        <div class="wsus__cart_img">
                            <a href="{{ url('product-detail') }}/${data[item].options.slug}"><img src="{{ asset('/') }}${data[item].options.image}" alt="product" class="img-fluid w-100"></a>
                            <a class="wsis__del_icon remove_sidebar_product" data-id="${data[item].rowId}" href=""><i class="fas fa-minus-circle"></i></a>
                        </div>
                        <div class="wsus__cart_text">
                            <a class="wsus__cart_title" href="{{ url('product-detail') }}/${data[item].options.slug}">${data[item].name}</a>
                            <p>${data[item].price}{{ $settings->currency_icon }}</p>
                            <small>Variants total: ${data[item].options.variants_total}{{ $settings->currency_icon }}</small>
                            <br>
                            <small>Quantity: ${data[item].qty}</small>
                        </div>
                    </li>`)
                    }

                    $('.mini-cart-wrapper').html(html);

                    getSidebarCartSubtoal();
                },
                error: function(data) {

                }
            })
        }

        //xoa sp tai sidebar
        $('body').on('click', '.remove_sidebar_product', function(e) {
            e.preventDefault()
            let rowId = $(this).data('id');
            $.ajax({
                method: 'POST',
                url: "{{ route('remove-sidebar-cart-product') }}",
                data: {
                    rowId: rowId
                },
                success: function(data) {
                    let productId = '#mini_cart_' + rowId;
                    $(productId).remove()

                    getSidebarCartSubtoal()

                    // console.log("Number of items in the cart:", $('.mini_cart_wrapper').find('li').length);

                    if ($('.mini-cart-wrapper').find('li').length === 0) {
                        $('.mini_cart_actions').addClass('d-none');
                        $('.mini-cart-wrapper').html(
                            '<li class="text-center">Cart Is Empty!</li>');
                    }

                    toastr.success(data.message);
                },
                error: function(data) {
                    console.log(data);
                }
            })
        })
        // tong tien tai sidebar
        function getSidebarCartSubtoal() {
            $.ajax({
                method: 'GET',
                url: "{{ route('cart.cart-subtotal') }}",
                success: function(data) {
                    $('#mini_cart_subtotal').text(data + "{{ $settings->currency_icon }}");
                    // console.log(data)
                },
                error: function(data) {

                }
            })
        }

        //wishlist
        $('.add-wishlist').on('click', function(event) {
            event.preventDefault();
            let id = $(this).data('id');
            $.ajax({
                method: 'GET',
                url: "{{ route('user.wishlist.create') }}",
                data: {
                    id: id
                },
                success: function(data) {
                    if (data.status === 'success') {
                        $('#wishlist_count').text(data.count);
                        toastr.success(data.message);
                    } else if (data.status === 'error') {
                        toastr.error(data.message);
                    }
                },
                error: function(data) {
                    console.log(data);
                }
            })
        })

        //new-letter

        $('#new-letter').on('submit', function(event) {
            event.preventDefault();
            // alert('hello')
            let data = $(this).serialize();

            $.ajax({
                method: 'POST',
                url: "{{ route('new-letter') }}",
                data: data,
                beforeSend: function() {
                    $('.subscribe_btn').text('Loading...');
                },
                success: function(data) {
                    if (data.status === 'success') {
                        $('.subscribe_btn').text('Subscribe');
                        $('.newsletter_email').val('');
                        toastr.success(data.message);

                    } else if (data.status === 'error') {
                        $('.subscribe_btn').text('Subscribe');
                        toastr.error(data.message);
                    }
                },
                error: function(data) {
                    console.log(data)
                    let errors = data.responseJSON.errors;
                    if (errors) {
                        $.each(errors, function(key, value) {
                            toastr.error(value);
                        })
                    }
                    // $('.subscribe_btn').text('Subscribe');
                }
            })
        })
    })
</script>
