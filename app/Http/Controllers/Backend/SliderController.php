<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\SliderDataTable;
use App\Http\Controllers\Controller;
use App\Models\ProductVariant;
use App\Models\Slider;
use App\Reuse\ImageUpload;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    use ImageUpload;
    /**
     * Display a listing of the resource.
     */
    public function index(SliderDataTable $dataTable)
    {
        return $dataTable->render('admin.slider.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request -> validate([
            'banner' => ['required', 'image', 'max:2000'],
            'title' => ['required', 'max:200'],
            'btn_url' => ['url'],
            'serial' => ['required', 'integer'],
            'status' => ['required']
        ]);

        $slider = new Slider();

        $imagePath = $this -> imageUpload($request, 'banner', 'uploads');

        $slider -> banner = $imagePath;
        $slider -> title = $request -> title;
        $slider -> btn_url = $request -> btn_url;
        $slider -> serial = $request -> serial;
        $slider -> status = $request -> status;

        $slider -> save();

        toastr('Create Successfully', 'success');
        return redirect() -> route('admin.slider.index');
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
        $slider = Slider::findOrFail($id);


        return view('admin.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request -> validate([
            'banner' => ['nullable', 'image', 'max:2000'],
            'title' => ['required', 'max:200'],
            'btn_url' => ['url'],
            'serial' => ['required', 'integer'],
            'status' => ['required']
        ]);

        $slider = Slider::findOrFail($id);

        $imagePath = $this -> updateImage($request, 'banner', 'uploads', $slider -> banner);

        // $slider -> banner = $imagePath;
        $slider->banner =  empty(!$imagePath) ? $imagePath : $slider->banner;
        $slider -> title = $request -> title;
        $slider -> btn_url = $request -> btn_url;
        $slider -> serial = $request -> serial;
        $slider -> status = $request -> status;

        $slider -> save();

        toastr('Update Successfully', 'success');
        return redirect() -> route('admin.slider.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $slider = Slider::findOrFail($id);
        $this->deleteImage($slider->banner);
        $slider->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }

    public function changeStatus(Request $request) {
        $slider = Slider::findOrFail($request->id);
        $slider->status = $request->status == 'true' ? 1 : 0;
        $slider->save();

        return response(['message' => 'Status has been updated!']);
    }
}