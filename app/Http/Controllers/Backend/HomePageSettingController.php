<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\HomePageSetting;
use Illuminate\Http\Request;

class HomePageSettingController extends Controller
{
    public function index()
    {
        $categories = Category::where('status', 1)->get();
        $beautyTrends = HomePageSetting::where('key', 'beauty_trend')->first();
        return view('admin.homePageSetting.index', compact(
            'categories',
            'beautyTrends'
        ));
    }

    public function updateBeautyTrend(Request $request)
    {
        $request->validate([
            'cat_one' => ['required'],
            'cat_two' => ['required'],
            'cat_three' => ['required'],
        ]);

        $data = [
            [
                'category' => $request->cat_one,
                'sub_category' => $request->sub_cat_one,
                'child_category' => $request->child_cat_one
            ],
            [
                'category' => $request->cat_two,
                'sub_category' => $request->sub_cat_two,
                'child_category' => $request->child_cat_two
            ],
            [
                'category' => $request->cat_three,
                'sub_category' => $request->sub_cat_three,
                'child_category' => $request->child_cat_three
            ],
        ];
        HomePageSetting::updateOrCreate(
            [
                'key' => 'beauty_trend'
            ],
            [
                'value' => json_encode($data)
            ]
        );
        toastr('Updated successfully!', 'success', 'success');

        return redirect()->back();
    }
}
