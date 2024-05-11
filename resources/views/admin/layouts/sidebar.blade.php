<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">{{ $settings->site_name }}</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="dropdown active">
                <a href="{{ route('admin.dashboard') }}" class="nav-link"><i
                        class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">Starter</li>
            <li class="dropdown {{ setActive(['admin.slider.*', 'admin.home-page-setting.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Website Management</span></a>
                <ul class="dropdown-menu">
                    <li class=" {{ setActive(['admin.slider.*']) }}"><a class="nav-link"
                            href="{{ route('admin.slider.index') }}">Slider</a></li>
                    <li class=" {{ setActive(['admin.home-page-setting.*']) }}"><a class="nav-link"
                            href="{{ route('admin.home-page-setting.index') }}">Home Page Setting</a></li>
                    <li class="{{ setActive(['admin.about.index']) }}"><a class="nav-link"
                            href="{{ route('admin.about.index') }}">About page</a></li>
                    <li class="{{ setActive(['admin.terms-and-conditions.index']) }}"><a class="nav-link"
                            href="{{ route('admin.terms-and-conditions.index') }}">Terms Page</a></li>
                </ul>
            </li>
            <li class="dropdown {{ setActive(['admin.blog-category.*', 'admin.blog.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Blog</span></a>
                <ul class="dropdown-menu">
                    <li class=" {{ setActive(['admin.blog-category.*']) }}"><a class="nav-link"
                            href="{{ route('admin.blog-category.index') }}">Blog Category</a></li>
                    <li class=" {{ setActive(['admin.blog.*']) }}"><a class="nav-link"
                            href="{{ route('admin.blog.index') }}">Blog</a></li>
                </ul>
            </li>

            <li class="dropdown {{ setActive(['admin.category.*', 'admin.subCategory.*', 'admin.childCategory.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Category</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setActive(['admin.category.*']) }}"><a class="nav-link"
                            href="{{ route('admin.category.index') }}">Category</a></li>
                    <li class="{{ setActive(['admin.subCategory.*']) }}"><a class="nav-link"
                            href="{{ route('admin.subCategory.index') }}">SubCategory</a></li>
                    <li class="{{ setActive(['admin.childCategory.*']) }}"><a class="nav-link"
                            href="{{ route('admin.childCategory.index') }}">ChildCategory</a></li>
                </ul>
            </li>

            <li class="dropdown {{ setActive(['admin.brand.*', 'admin.product.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Product</span></a>
                <ul class="dropdown-menu">
                    <li class=" {{ setActive(['admin.brand.*']) }}"><a class="nav-link"
                            href="{{ route('admin.brand.index') }}">Brands</a></li>
                    <li class=" {{ setActive(['admin.product.*']) }}"><a class="nav-link"
                            href="{{ route('admin.product.index') }}">Products</a></li>
                    <li class=" {{ setActive(['admin.review.*']) }}"><a class="nav-link"
                            href="{{ route('admin.review.index') }}">Products Review</a></li>

                </ul>
            </li>

            <li
                class="dropdown {{ setActive(['admin.customers.*', 'admin.admin-list.index', 'admin.admins.*', 'admin.admins.index']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>User </span></a>
                <ul class="dropdown-menu">
                    <li class=" {{ setActive(['admin.customers.*']) }}"><a class="nav-link"
                            href="{{ route('admin.customers.index') }}">Customer</a></li>
                    <li class=" {{ setActive(['admin-list.index']) }}"><a class="nav-link"
                            href="{{ route('admin.admin-list.index') }}">Admin</a></li>
                    <li class=" {{ setActive(['admin.admins.index']) }}"><a class="nav-link"
                            href="{{ route('admin.admins.index') }}">Manage User</a></li>
                </ul>
            </li>

            <li
                class="dropdown {{ setActive(['admin.flash-sale.*', 'admin.coupon.*', 'admin.shipping-rule.*', 'admin.payment-settings.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Ecommerce</span></a>
                <ul class="dropdown-menu">
                    <li class=" {{ setActive(['admin.flash-sale.*']) }}"><a class="nav-link"
                            href="{{ route('admin.flash-sale.index') }}">FlashSale</a></li>
                    <li class=" {{ setActive(['admin.coupon.*']) }}"><a class="nav-link"
                            href="{{ route('admin.coupon.index') }}">Coupon</a></li>
                    <li class=" {{ setActive(['admin.shipping-rule.*']) }}"><a class="nav-link"
                            href="{{ route('admin.shipping-rule.index') }}">Shipping Rule</a></li>
                    <li class="{{ setActive(['admin.payment-settings.*']) }}"><a class="nav-link"
                            href="{{ route('admin.payment-settings.index') }}">Payment Settings</a></li>
                </ul>
            </li>
            <li
                class="dropdown {{ setActive(['admin.flash-sale.*', 'admin.order.*', 'admin.pending', 'admin.processing', 'admin.drop-off', 'admin.shipped', 'admin.delivered', 'admin.canceled', 'admin.transaction.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                        class="fas fa-columns"></i>
                    <span>Orders</span></a>
                <ul class="dropdown-menu">
                    <li class=" {{ setActive(['admin.order.*']) }}"><a class="nav-link"
                            href="{{ route('admin.order.index') }}">All orders</a></li>
                    <li class=" {{ setActive(['admin.pending']) }}"><a class="nav-link"
                            href="{{ route('admin.pending') }}">Đang chờ xử lý</a></li>
                    <li class=" {{ setActive(['admin.processing']) }}"><a class="nav-link"
                            href="{{ route('admin.processing') }}">Đang chuẩn bị hàng</a></li>
                    <li class=" {{ setActive(['admin.drop-off']) }}"><a class="nav-link"
                            href="{{ route('admin.drop-off') }}">Đã gửi hàng</a></li>
                    <li class=" {{ setActive(['admin.shipped']) }}"><a class="nav-link"
                            href="{{ route('admin.shipped') }}">Đang vận chuyển</a></li>
                    <li class=" {{ setActive(['admin.delivered']) }}"><a class="nav-link"
                            href="{{ route('admin.delivered') }}">Đã giao</a></li>
                    <li class=" {{ setActive(['admin.canceled']) }}"><a class="nav-link"
                            href="{{ route('admin.canceled') }}">Đã hủy</a></li>
                    <li class=" {{ setActive(['admin.transaction.*']) }}"><a class="nav-link"
                            href="{{ route('admin.transaction.index') }}">Transaction</a></li>
                </ul>
            </li>
            <li class=" {{ setActive(['admin.advertisement.*']) }}"><a class="nav-link"
                    href="{{ route('admin.advertisement.index') }}"><i class="fas fa-cog"></i>
                    <span>Advertisements</span></a></li>
            <li
                class="dropdown {{ setActive(['admin.footer-info.*', 'admin.footer-social.*', 'admin.footer-three.*', 'admin.footer-two.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                        class="fas fa-columns"></i>
                    <span>Footer </span></a>
                <ul class="dropdown-menu">
                    <li class=" {{ setActive(['admin.footer-info.*']) }}"><a class="nav-link"
                            href="{{ route('admin.footer-info.index') }}">Footer Info</a></li>
                    <li class=" {{ setActive(['admin.footer-social.*']) }}"><a class="nav-link"
                            href="{{ route('admin.footer-social.index') }}">Footer Social</a></li>
                    <li class=" {{ setActive(['admin.footer-two.*']) }}"><a class="nav-link"
                            href="{{ route('admin.footer-two.index') }}">Footer Two</a></li>
                    <li class=" {{ setActive(['admin.footer-three.*']) }}"><a class="nav-link"
                            href="{{ route('admin.footer-three.index') }}">Footer Three</a></li>

                </ul>
            </li>
            <li class=" {{ setActive(['admin.subscriber.*']) }}"><a class="nav-link"
                    href="{{ route('admin.subscriber.index') }}"><i class="fas fa-cog"></i>
                    <span>Subscribers</span></a></li>
            <li class=" {{ setActive(['admin.setting.*']) }}"><a class="nav-link"
                    href="{{ route('admin.setting.index') }}"><i class="fas fa-cog"></i>
                    <span>Settings</span></a></li>
        </ul>
    </aside>
</div>
