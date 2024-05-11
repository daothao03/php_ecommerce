<?php

namespace App\Http\Controllers\Frontend;

use App\DataTables\UserReviewDataTable;
use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\ReviewGallery;
use App\Reuse\ImageUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    use ImageUpload;
    /**
     * Display a listing of the resource.
     */
    public function index(UserReviewDataTable $dataTable)
    {
        return $dataTable->render('frontend.dashboard.review.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'rating' => ['required'],
            'review' => ['required', 'max:200'],
            'images.*' => ['image']
        ]);

        $checkReviewExist = Review::where(['product_id' => $request->product_id, 'user_id' => Auth::user()->id])->first();
        if ($checkReviewExist) {
            toastr('Bạn đã đánh giá sản phẩm!', 'error', 'error');
            return redirect()->back();
        }

        $imagePaths = $this->uploadMultiImage($request, 'images', 'uploads');

        $review = new Review();
        $review->product_id = $request->product_id;
        $review->user_id = Auth::user()->id;
        $review->review = $request->review;
        $review->rating = $request->rating;
        $review->save();

        if (!empty($imagePaths)) {

            foreach ($imagePaths as $path) {
                $reviewGallery = new ReviewGallery();
                $reviewGallery->review_id = $review->id;
                $reviewGallery->image = $path;
                $reviewGallery->save();
            }
        }

        toastr('Review added successfully!', 'success', 'success');

        return redirect()->back();
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
