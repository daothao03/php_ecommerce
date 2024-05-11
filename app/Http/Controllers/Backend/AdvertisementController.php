<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Reuse\ImageUpload;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    use ImageUpload;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $threeBanner = Advertisement::where('key', '3banner')->first();
        $threeBanner = json_decode($threeBanner->value);
        $fourBanner = Advertisement::where('key', '4banner')->first();
        $fourBanner = json_decode($fourBanner->value);
        return view('admin.advertisement.index', compact(
            'threeBanner',
            'fourBanner'
        ));
    }

    public function ThreeBanner(Request $request)
    {
        $request->validate([
            'banner_one_image' => ['image'],
            'banner_one_url' => ['required'],
            'banner_two_image' => ['image'],
            'banner_two_url' => ['required'],
            'banner_three_image' => ['image'],
            'banner_three_url' => ['required'],
        ]);

        $value = [
            'banner_one' => [
                'banner_url' => $request->banner_one_url,
                'status' => $request->banner_one_status == 'on' ? 1 : 0
            ],
            'banner_two' => [
                'banner_url' => $request->banner_two_url,
                'status' => $request->banner_two_status == 'on' ? 1 : 0
            ],
            'banner_three' => [
                'banner_url' => $request->banner_three_url,
                'status' => $request->banner_three_status == 'on' ? 1 : 0
            ]
        ];

        $imageBanner1 = $this->updateImage($request, 'banner_one_image', 'uploads');
        $imageBanner2 = $this->updateImage($request, 'banner_two_image', 'uploads');
        $imageBanner3 = $this->updateImage($request, 'banner_three_image', 'uploads');

        if (!empty($imageBanner1)) {
            $value['banner_one']['banner_image'] = $imageBanner1;
        } else {
            $value['banner_one']['banner_image'] = $request->banner_one_old_image;
        }

        if (!empty($imageBanner2)) {
            $value['banner_two']['banner_image'] = $imageBanner2;
        } else {
            $value['banner_two']['banner_image'] = $request->banner_two_old_image;
        }

        if (!empty($imageBanner3)) {
            $value['banner_three']['banner_image'] = $imageBanner3;
        } else {
            $value['banner_three']['banner_image'] = $request->banner_three_old_image;
        }

        $value = json_encode($value);

        Advertisement::updateOrCreate(
            ['key' => '3banner'],
            ['value' => $value]
        );

        toastr('Updated Successfully!', 'success', 'success');

        return redirect()->back();
    }

    public function FourBanner(Request $request)
    {
        $request->validate([
            'banner_one_image' => ['image'],
            'banner_one_url' => ['required'],
            'banner_two_image' => ['image'],
            'banner_two_url' => ['required'],
            'banner_three_image' => ['image'],
            'banner_three_url' => ['required'],
            'banner_four_image' => ['image'],
            'banner_four_url' => ['required'],
        ]);

        $value = [
            'banner_one' => [
                'banner_url' => $request->banner_one_url,
                'status' => $request->banner_one_status == 'on' ? 1 : 0
            ],
            'banner_two' => [
                'banner_url' => $request->banner_two_url,
                'status' => $request->banner_two_status == 'on' ? 1 : 0
            ],
            'banner_three' => [
                'banner_url' => $request->banner_three_url,
                'status' => $request->banner_three_status == 'on' ? 1 : 0
            ],
            'banner_four' => [
                'banner_url' => $request->banner_four_url,
                'status' => $request->banner_four_status == 'on' ? 1 : 0
            ]
        ];

        $imageBanner1 = $this->updateImage($request, 'banner_one_image', 'uploads');
        $imageBanner2 = $this->updateImage($request, 'banner_two_image', 'uploads');
        $imageBanner3 = $this->updateImage($request, 'banner_three_image', 'uploads');
        $imageBanner4 = $this->updateImage($request, 'banner_four_image', 'uploads');

        if (!empty($imageBanner1)) {
            $value['banner_one']['banner_image'] = $imageBanner1;
        } else {
            $value['banner_one']['banner_image'] = $request->banner_one_old_image;
        }

        if (!empty($imageBanner2)) {
            $value['banner_two']['banner_image'] = $imageBanner2;
        } else {
            $value['banner_two']['banner_image'] = $request->banner_two_old_image;
        }

        if (!empty($imageBanner3)) {
            $value['banner_three']['banner_image'] = $imageBanner3;
        } else {
            $value['banner_three']['banner_image'] = $request->banner_three_old_image;
        }

        if (!empty($imageBanner4)) {
            $value['banner_four']['banner_image'] = $imageBanner4;
        } else {
            $value['banner_four']['banner_image'] = $request->banner_four_old_image;
        }

        $value = json_encode($value);

        Advertisement::updateOrCreate(
            ['key' => '4banner'],
            ['value' => $value]
        );

        toastr('Updated Successfully!', 'success', 'success');

        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}