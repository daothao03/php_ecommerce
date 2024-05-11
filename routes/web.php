<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\FlashSaleController;
use App\Http\Controllers\Backend\VendorController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\FEBlogController;
use App\Http\Controllers\Frontend\FEProductController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\NewletterController;
use App\Http\Controllers\Frontend\OrderTrackingController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\PaymentController;
use App\Http\Controllers\Frontend\ReviewController;
use App\Http\Controllers\Frontend\UserAddressController;
use App\Http\Controllers\Frontend\UserDashboardController;
use App\Http\Controllers\Frontend\UserOrderController;
use App\Http\Controllers\Frontend\UserProfileController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\ProfileController;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

//Vi trong admin.php da xac thuc nguoi dung (middleware) nen khong tao tuyen duong nay trong admin.php
Route::get('admin/login', [AdminController::class, 'login'])->name('admin.login');

//flashsale
Route::get('flash-sale', [FlashSaleController::class, 'index'])->name('flash-sale');

//product detail
Route::get('products', [FEProductController::class, 'showAllProduct'])->name('products.index');
Route::get('product-detail/{slug}', [FEProductController::class, 'showProductDetail'])->name('product-detail');

//Blog
Route::get('blog-detail/{slug}', [FEBlogController::class, 'showBlogDetail'])->name('blog-detail');
Route::get('blogs', [FEBlogController::class, 'showAllBlog'])->name('blogs');

//Cart
Route::post('add-to-cart', [CartController::class, 'addToCart'])->name('add-to-cart');
Route::get('cart-view', [CartController::class, 'cartView'])->name('cart-view');
Route::post('cart/update-qty', [CartController::class, 'updateQty'])->name('cart.update-qty');
Route::get('remove-cart', [CartController::class, 'removeCart'])->name('remove-cart');
Route::get('remove-cart-product/{rowId}', [CartController::class, 'removeProduct'])->name('remove-cart-product');
Route::get('cart-count', [CartController::class, 'cartCount'])->name('cart-count');
Route::get('cart-sidebar', [CartController::class, 'getCartSidebar'])->name('cart-sidebar');
Route::post('remove-sidebar-cart-product', [CartController::class, 'removeSidebarCartProd'])->name('remove-sidebar-cart-product');
Route::get('cart-subtotal', [CartController::class, 'cartTotal'])->name('cart.cart-subtotal');
Route::get('apply-coupon', [CartController::class, 'applyCoupon'])->name('apply-coupon');
Route::get('subtotal-apply-coupon', [CartController::class, 'couponCalculation'])->name('subtotal-apply-coupon');

//Contact
Route::get('contact', [PageController::class, 'indexContact'])->name('contact.index');
Route::post('send-contact', [PageController::class, 'sendContact'])->name('send-contact');
Route::get('about', [PageController::class, 'about'])->name('about.index');
Route::get('term', [PageController::class, 'term'])->name('term.index');

//Order tracking
Route::get('order-tracking', [OrderTrackingController::class, 'index'])->name('order-tracking.index');

//newsletter
Route::post('new-letter', [NewletterController::class, 'newLetter'])->name('new-letter');
Route::get('newsletter-verify/{token}', [NewletterController::class, 'newsLetterEmailVarify'])->name('newsletter-verify');


Route::group(['middleware' => ['auth', 'verified'], 'prefix' => 'user', 'as' => 'user.'], function () {
    Route::get('dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
    Route::get('profile', [UserProfileController::class, 'index'])->name('profile');
    Route::put('profile', [UserProfileController::class, 'userUpdateProfile'])->name('profile.update');
    Route::post('profile', [UserProfileController::class, 'updatePassword'])->name('profile.update.password');

    //Address
    Route::resource('address', UserAddressController::class);

    //product review
    Route::resource('review', ReviewController::class);

    //checkout
    Route::get('checkout', [CheckoutController::class, 'index'])->name('checkout');
    //add new address form checkout
    Route::post('checkout-new-address', [CheckoutController::class, 'createNewAddress'])->name('checkout-new-address');

    Route::post('checkout-form-submit', [CheckoutController::class, 'checkoutFormSubmit'])->name('checkout-form-submit');

    Route::get('payment', [PaymentController::class, 'index'])->name('payment');
    Route::get('payment-success', [PaymentController::class, 'paymentSuccess'])->name('payment.success');
    Route::get('cod/payment', [PaymentController::class, 'payWithCod'])->name('cod.payment');

    //get order
    Route::get('order', [UserOrderController::class, 'index'])->name('order.index');
    Route::get('orders/show/{id}', [UserOrderController::class, 'show'])->name('order.show');

    //wishlist
    Route::get('wishlist/remove-product/{id}', [WishlistController::class, 'removeToWishList'])->name('wishlist.remove');
    Route::resource('wishlist', WishlistController::class);
});
