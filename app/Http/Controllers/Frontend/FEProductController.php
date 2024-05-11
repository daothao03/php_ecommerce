<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\Brand;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\Product;
use App\Models\Review;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FEProductController extends Controller
{
    public function showProductDetail(string $slug)
    {
        $product = Product::with(['reviews', 'category', 'productImageGalleries', 'variants', 'brand'])
            ->where('slug', $slug)
            ->where('status', 1)
            ->first();
        if ($product) {
            $relatedProducts = Product::whereHas('category', function ($query) use ($product) {
                $query->where('id', $product->category->id);
            })
                ->where('id', '!=', $product->id)
                ->limit(5)
                ->get();
        }
        $reviews = Review::where('product_id', $product->id)->paginate(10);
        return view('frontend.pages.product-detail', compact(
            'product',
            'relatedProducts',
            'reviews'
        ));
    }

    public function showAllProduct(Request $request)
    {
        // dd(explode(';', $request->price_filter));
        if ($request->has('category')) {
            $category = Category::where('slug', $request->category)->first();
            $products = Product::with('reviews')->where([
                'category_id' => $category->id,
                'status' => 1,

            ])
                ->when($request->has('price_filter'), function ($query) use ($request) {
                    $price = explode(';', $request->price_filter);
                    $from = $price[0];
                    $to = $price[1];

                    return $query->where('price', '>=', $from)->where('price', '<=', $to);
                })
                ->paginate(12);
        } elseif ($request->has('subcategory')) {
            $category = SubCategory::where('slug', $request->subcategory)->firstOrFail();
            $products = Product::with('reviews')->where([
                'sub_category_id' => $category->id,
                'status' => 1
            ])
                ->when($request->has('price_filter'), function ($query) use ($request) {
                    $price = explode(';', $request->price_filter);
                    $from = $price[0];
                    $to = $price[1];

                    return $query->where('price', '>=', $from)->where('price', '<=', $to);
                })
                ->paginate(12);
        } elseif ($request->has('childcategory')) {
            $category = ChildCategory::where('slug', $request->childcategory)->firstOrFail();

            $products = Product::with('reviews')->where([
                'child_category_id' => $category->id,
                'status' => 1
            ])
                ->when($request->has('price_filter'), function ($query) use ($request) {
                    $price = explode(';', $request->price_filter);
                    $from = $price[0];
                    $to = $price[1];

                    return $query->where('price', '>=', $from)->where('price', '<=', $to);
                })
                ->paginate(12);
        } elseif ($request->has('brand')) {
            $brand = Brand::where('slug', $request->brand)->firstOrFail();

            $products = Product::with('reviews')->where([
                'brand_id' => $brand->id,
                'status' => 1
            ])
                ->when($request->has('price_filter'), function ($query) use ($request) {
                    $price = explode(';', $request->price_filter);
                    $from = $price[0];
                    $to = $price[1];

                    return $query->where('price', '>=', $from)->where('price', '<=', $to);
                })
                ->paginate(12);
        } elseif ($request->has('search')) {
            $products = Product::with('reviews')->where(function ($query) use ($request) {
                $query->where('status', 1)->where('name', 'like', '%' . $request->search . '%');
            })
                ->orWhereHas('category', function ($query) use ($request) {
                    $query->where('name', 'like', '%' . $request->search . '%');
                })
                ->paginate(12);
        } else {
            $products = Product::with('reviews')->where('status', 1)
                ->orderBy('id', 'DESC')
                ->paginate(12);
        }

        $categories = Category::where(['status' => 1])->get();
        $brands = Brand::where(['status' => 1])->get();

        $fourBanner = Advertisement::where('key', '4banner')->first();
        $fourBanner = json_decode($fourBanner->value);
        return view('frontend.pages.product', compact(
            'products',
            'categories',
            'brands',
            'fourBanner'
        ));
    }

    // public function showAllProductBestSelling()
    // {
    //     $bestSellingProducts = Product::with(['variants', 'category', 'productImageGalleries'])
    //         ->select('products.*', DB::raw('SUM(order_details.qty) as total_quantity'))
    //         ->leftJoin('order_details', 'products.id', '=', 'order_details.product_id')
    //         ->leftJoin('orders', 'order_details.order_id', '=', 'orders.id')
    //         ->where('orders.order_status', '=', 'delivered') // chỉ tính toán đơn hàng đã hoàn thành
    //         ->groupBy('products.id')
    //         ->orderByDesc('total_quantity')
    //         ->take(7)
    //         ->get();

    // }
}
