<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\Blog;
use App\Models\Brand;
use App\Models\Category;
use App\Models\FlashSale;
use App\Models\FlashSaleItem;
use App\Models\HomePageSetting;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('status', 1)->orderBy('serial', 'asc')->get();
        $brands = Brand::where('status', 1)
            ->where('is_featured', 1)
            ->get();
        $flashSaleDate = FlashSale::first();
        $flashSaleProducts = FlashSaleItem::where('show_at_home', 1)
            ->where('status', 1)
            ->get();
        $beautyTrends = HomePageSetting::where('key', 'beauty_trend')->first();

        $bestSellingProducts = Product::with(['variants', 'category', 'productImageGalleries', 'reviews'])
            ->select('products.*', DB::raw('SUM(order_details.qty) as total_quantity'))
            ->leftJoin('order_details', 'products.id', '=', 'order_details.product_id')
            ->leftJoin('orders', 'order_details.order_id', '=', 'orders.id')
            ->where('orders.order_status', '=', 'delivered') // chỉ tính toán đơn hàng đã hoàn thành
            ->groupBy('products.id')
            ->orderByDesc('total_quantity')
            ->take(7)
            ->get();

        $blogs = Blog::where('status', 1)->get();

        $threeBanner = Advertisement::where('key', '3banner')->first();
        $threeBanner = json_decode($threeBanner->value);
        $fourBanner = Advertisement::where('key', '4banner')->first();
        $fourBanner = json_decode($fourBanner->value);

        return view('frontend.home.home', compact(
            'sliders',
            'brands',
            'flashSaleDate',
            'flashSaleProducts',
            'beautyTrends',
            'bestSellingProducts',
            'blogs',
            'threeBanner',
            'fourBanner'
        ));
    }
}
