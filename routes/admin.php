<?php

use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\AdminListController;
use App\Http\Controllers\Backend\AdminVendorProfileController;
use App\Http\Controllers\Backend\AdvertisementController;
use App\Http\Controllers\Backend\BlogCategoryController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ChildCategoryController;
use App\Http\Controllers\Backend\CodSettingController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\FlashSaleController;
use App\Http\Controllers\Backend\FooterInfoController;
use App\Http\Controllers\Backend\FooterSocialController;
use App\Http\Controllers\Backend\FooterThreeController;
use App\Http\Controllers\Backend\FooterTwoController;
use App\Http\Controllers\Backend\HomePageSettingController;
use App\Http\Controllers\Backend\ManageAdminController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\PaymentSettingController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ProductImageGalleryController;
use App\Http\Controllers\Backend\ProductVariantController;
use App\Http\Controllers\Backend\ProductVariantItemController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\ReviewController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\ShippingRuleController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\SubscriberController;
use App\Http\Controllers\Backend\TermsAndConditionController;
use App\Http\Controllers\Backend\TransactionController;
use App\Http\Controllers\Backend\VendorProfileController;
use App\Models\Backend\AdminReviewController;
use App\Models\BlogCategory;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Route;

Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

// Profile
Route::get('profile', [ProfileController::class, 'index'])->name('profile');
Route::post('profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
Route::post('profile/update/password', [ProfileController::class, 'updatePassword'])->name('password.update');

// Slider
Route::resource('slider', SliderController::class);
Route::put('changeStatus', [SliderController::class, 'changeStatus'])->name('slider.changeStatus');

//Customer
Route::put('customer/change-status', [CustomerController::class, 'changeStatus'])->name('customer.status-change');
Route::get('customers', [CustomerController::class, 'index'])->name('customers.index');
Route::get('admin-list', [AdminListController::class, 'index'])->name('admin-list.index');
Route::put('admin-list/status-change', [AdminListController::class, 'changeStatus'])->name('admin-list.status-change');
Route::delete('admin-list/{id}', [AdminListController::class, 'destroy'])->name('admin-list.destroy');

//manage user
Route::get('admins', [ManageAdminController::class, 'index'])->name('admins.index');
Route::post('create', [ManageAdminController::class, 'createUser'])->name('create.user');

//Category
Route::put('change-status', [CategoryController::class, 'changeStatus'])->name('category.change-status');
Route::resource('category', CategoryController::class);

// SubCategory
Route::put('subCategory/changeStatus', [SubCategoryController::class, 'changeStatus'])->name('subCategory.change-status');
Route::resource('subCategory', SubCategoryController::class);

// ChildCategory
Route::put('childCategory/changeStatus', [ChildCategoryController::class, 'changeStatus'])->name('childCategory.change-status');
Route::get('get-subcategories', [ChildCategoryController::class, 'getSubCategories'])->name('get-subcategories');
Route::resource('childCategory', ChildCategoryController::class);

// Product
Route::put('brand/changeStatus', [BrandController::class, 'changeStatus'])->name('brand.change-status');
Route::resource('brand', BrandController::class);


//Blog category
Route::put('blog-category/changeStatus', [BlogCategoryController::class, 'changeStatus'])->name('blog-category.change-status');
Route::resource('blog-category', BlogCategoryController::class);

//Blog
Route::put('blog/changeStatus', [BlogController::class, 'changeStatus'])->name('blog.change-status');
Route::resource('blog', BlogController::class);

//Vendor Profile
Route::resource('vendor-profile', AdminVendorProfileController::class);

//Product
Route::get('product/get-subcategories', [ProductController::class, 'getSubCategories'])->name('product.get-subcategories');
Route::get('product/get-child-categories', [ProductController::class, 'getChildCategories'])->name('product.get-child-categories');
Route::put('product/changeStatus', [ProductController::class, 'changeStatus'])->name('product.change-status');
Route::resource('product', ProductController::class);

//ProductImageGallery
Route::resource('products-image-gallery', ProductImageGalleryController::class);

//Variant
Route::put('products-variant/change-status', [ProductVariantController::class, 'changeStatus'])->name('products-variant.change-status');
Route::resource('products-variant', ProductVariantController::class);


//Variant Item
Route::put('products-variant-item/change-status', [ProductVariantItemController::class, 'changeStatus'])->name('products-variant.change-status');
Route::resource('products-variant-item', ProductVariantItemController::class);

//product review
Route::resource('review', ReviewController::class);

//Variant Item
// Route::put('products-variant-item/change-status', [ProductVariantItemController::class, 'changeStatus'])->name('products-variant.change-status');
// Route::resource('flash-sale', FlashSaleController::class);

Route::get('flash-sale', [FlashSaleController::class, 'index'])->name('flash-sale.index');
Route::put('flash-sale', [FlashSaleController::class, 'update'])->name('flash-sale.update');
Route::post('flash-sale/add-product', [FlashSaleController::class, 'addProduct'])->name('flash-sale.add-product');
Route::put('flash-sale/change-status', [FlashSaleController::class, 'changeStatus'])->name('flash-sale.change-status');
Route::put('flash-sale/show-at-home/change-status', [FlashSaleController::class, 'changeStatusShowAtHome'])->name('flash-sale.show-at-home.change-status');
Route::delete('flash-sale/{id}', [FlashSaleController::class, 'destroy'])->name('flash-sale.destroy');


//Setting
Route::get('setting', [SettingController::class, 'index'])->name('setting.index');
Route::put('setting-update', [SettingController::class, 'generalSettingUpdate'])->name('setting.update');

//mail
Route::put('email-setting-update', [SettingController::class, 'emailConfigSettingUpdate'])->name('email-setting-update');

//chi dinh category hien thi tai tap chuyen doi
Route::get('home-page-setting', [HomePageSettingController::class, 'index'])->name('home-page-setting.index');
Route::put('beauty-trend', [HomePageSettingController::class, 'updateBeautyTrend'])->name('home-page-setting.beauty-trend');

//Coupon
Route::put('coupon/change-status', [CouponController::class, 'changeStatus'])->name('coupon.change-status');
Route::resource('coupon', CouponController::class);

//Shipping Rule
Route::put('shipping-rule/change-status', [ShippingRuleController::class, 'changeStatus'])->name('shipping-rule.change-status');
Route::resource('shipping-rule', ShippingRuleController::class);

//Order
Route::get('payment/status', [OrderController::class, 'changePaymentStatus'])->name('payment.status');
Route::get('order/status', [OrderController::class, 'changeOrderStatus'])->name('order.status');
Route::get('pending-order', [OrderController::class, 'pending'])->name('pending');
Route::get('processed-order', [OrderController::class, 'processing'])->name('processing');
Route::get('drop-off', [OrderController::class, 'dropoff'])->name('drop-off');
Route::get('shipped', [OrderController::class, 'shipped'])->name('shipped');
Route::get('delivered', [OrderController::class, 'delivered'])->name('delivered');
Route::get('canceled', [OrderController::class, 'canceled'])->name('canceled');
Route::resource('order', OrderController::class);

//Transaction
Route::get('transaction', [TransactionController::class, 'index'])->name('transaction.index');


//Payment Setting
Route::get('payment-settings', [PaymentSettingController::class, 'index'])->name('payment-settings.index');
Route::put('cod-setting/{id}', [CodSettingController::class, 'update'])->name('cod-setting.update');


//advertisement
Route::put('advertisement/threebanner', [AdvertisementController::class, 'ThreeBanner'])->name('advertisement.threebanner');
Route::put('advertisement/fourbanner', [AdvertisementController::class, 'FourBanner'])->name('advertisement.fourbanner');
Route::resource('advertisement', AdvertisementController::class);

//footer
Route::resource('footer-info', FooterInfoController::class);
Route::put('footer-social/change-status', [FooterSocialController::class, 'changeStatus'])->name('footer-social.change-status');
Route::resource('footer-social', FooterSocialController::class);
Route::put('footer-two/change-status', [FooterTwoController::class, 'changeStatus'])->name('footer-two.change-status');
Route::put('footer-two/change-title', [FooterTwoController::class, 'changeTitle'])->name('footer-two.change-title');
Route::resource('footer-two', FooterTwoController::class);
Route::put('footer-three/change-status', [FooterThreeController::class, 'changeStatus'])->name('footer-three.change-status');
Route::put('footer-three/change-title', [FooterThreeController::class, 'changeTitle'])->name('footer-three.change-title');
Route::resource('footer-three', FooterThreeController::class);


//subscribers
Route::post('send-email', [SubscriberController::class, 'sendEmail'])->name('send-email');
Route::resource('subscriber', SubscriberController::class);

/** about routes */
Route::get('about', [AboutController::class, 'index'])->name('about.index');
Route::put('about/update', [AboutController::class, 'update'])->name('about.update');
/** terms and conditons routes */
Route::get('terms-and-conditions', [TermsAndConditionController::class, 'index'])->name('terms-and-conditions.index');
Route::put('terms-and-conditions/update', [TermsAndConditionController::class, 'update'])->name('terms-and-conditions.update');
