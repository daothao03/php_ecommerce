<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class FEBlogController extends Controller
{
    public function showBlogDetail(string $slug)
    {
        $blog = Blog::with(['category'])
            ->where('slug', $slug)
            ->where('status', 1)
            ->first();

        if ($blog) {
            $relatedBlogs = Blog::whereHas('category', function ($query) use ($blog) {
                $query->where('id', $blog->category->id);
            })
                ->where('id', '!=', $blog->id)
                ->limit(5)
                ->get();
        }

        return view('frontend.pages.blog-detail', compact(
            'blog',
            'relatedBlogs'
        ));
    }

    public function showAllBlog()
    {
        $blogs = Blog::with(['category'])
            ->where('status', 1)
            ->paginate(12);
        return view('frontend.pages.blog', compact('blogs'));
    }
}