@extends('frontend.layouts.master')

@section('title')
    Blog Detail || {{ $settings->site_name }}
@endsection

@section('content')
    <section id="wsus__blogs">
        <div class="container">
            <div class="row">
                @foreach ($blogs as $blog)
                    <div class="col-xl-4 col-sm-6 col-lg-4 col-xxl-3">
                        <div class="wsus__single_blog wsus__single_blog_2">
                            <a class="wsus__blog_img" href="{{ route('blog-detail', $blog->slug) }}">
                                <img src="{{ asset($blog->image) }}" alt="blog" class="img-fluid w-100">
                            </a>
                            <div class="wsus__blog_text">
                                <a class="blog_top red" href="#">{{ $blog->category->name }}</a>
                                <div class="wsus__blog_text_center">
                                    <a href="{{ route('blog-detail', $blog->slug) }}">{{ limitText($blog->title, 50) }}</a>
                                    <p class="date">{{ $blog->created_at }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            {{-- <div id="pagination">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <i class="fas fa-chevron-left"></i>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link page_active" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <i class="fas fa-chevron-right"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div> --}}
            <div class="col-xl-12">
                <div class="mt-5" style="display: flex; justify-content:center">
                    @if ($blogs->hasPages())
                        {{ $blogs->withQueryString()->links() }}
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
