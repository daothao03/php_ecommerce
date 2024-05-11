<section class="ads-3">
    <div class="container">
        @if ($fourBanner->banner_one->status == 1)
            <a href="{{ $fourBanner->banner_one->banner_url }}" class="dis-link">
                <img src="{{ asset($fourBanner->banner_one->banner_image) }}" alt="" />
            </a>
        @endif
        @if ($fourBanner->banner_two->status == 1)
            <a href="{{ $fourBanner->banner_two->banner_url }}" class="dis-link">
                <img src="{{ asset($fourBanner->banner_two->banner_image) }}" alt="" />
            </a>
        @endif
        @if ($fourBanner->banner_three->status == 1)
            <a href="{{ $fourBanner->banner_three->banner_url }}" class="dis-link">
                <img src="{{ asset($fourBanner->banner_three->banner_image) }}" alt="" />
            </a>
        @endif
        @if ($fourBanner->banner_four->status == 1)
            <a href="{{ $fourBanner->banner_four->banner_url }}" class="dis-link">
                <img src="{{ asset($fourBanner->banner_four->banner_image) }}" alt="" />
            </a>
        @endif
    </div>
</section>
