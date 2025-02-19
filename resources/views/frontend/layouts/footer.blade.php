@php
    $footerInfo = \App\Models\FooterInfo::first();
    $footerSocials = \App\Models\FooterSocial::where('status', 1)->get();
    $title = \App\Models\FooterTitle::first();
    $footerTwo = \App\Models\FooterTwo::where('status', 1)->get();
    $footerThree = \App\Models\FooterThree::where('status', 1)->get();
@endphp

<footer class="footer_2">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-xl-3 col-sm-7 col-md-6 col-lg-3">
                <div class="wsus__footer_content">
                    <a class="wsus__footer_2_logo" href="#">
                        <img src="{{ asset($footerInfo->logo) }}" alt="logo">
                    </a>
                    <a class="action" href="callto:+8896254857456"><i class="fas fa-phone-alt"></i>
                        {{ $footerInfo->phone }}</a>
                    <a class="action" href="mailto:example@gmail.com"><i class="far fa-envelope"></i>
                        {{ $footerInfo->email }}</a>
                    <p><i class="fal fa-map-marker-alt"></i> {{ $footerInfo->address }}</p>
                    <ul class="wsus__footer_social">
                        @foreach ($footerSocials as $footerSocial)
                            <li><a class="facebook" href="{{ $footerSocial->url }}"><i
                                        class="{{ $footerSocial->icon }}"></i></a></li>
                        @endforeach

                    </ul>
                </div>
            </div>
            <div class="col-xl-3 col-sm-5 col-md-4 col-lg-2">
                <div class="wsus__footer_content">
                    <h5>{{ $title->footer_two_title }}</h5>
                    <ul class="wsus__footer_menu">
                        @foreach ($footerTwo as $item)
                            <li><a href="{{ $item->url }}"> {{ $item->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-xl-3 col-sm-5 col-md-4 col-lg-2">
                <div class="wsus__footer_content">
                    <h5>{{ $title->footer_three_title }}</h5>
                    <ul class="wsus__footer_menu">
                        @foreach ($footerThree as $item)
                            <li><a href="{{ $item->url }}">
                                    {{ $item->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                    </ul>
                </div>
            </div>
            <div class="col-xl-3 col-sm-7 col-md-8 col-lg-5">
                <div class="wsus__footer_content wsus__footer_content_2">
                    <h3>Subscribe To Our Newsletter</h3>
                    <p>Get all the latest information on Events, Sales and Offers.
                        Get all the latest information on Events.</p>
                    <form action="{{ route('new-letter') }}" method="post" id="new-letter">
                        @csrf
                        <input class="newsletter_email" name="email" type="text" placeholder="Email...">
                        <button type="submit" class="subscribe_btn common_btn">subscribe</button>
                    </form>
                    <div class="footer_payment">
                        <p>We're using safe payment for :</p>
                        <img src="images/credit2.png" alt="card" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="wsus__footer_bottom">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="wsus__copyright d-flex justify-content-center">
                        <p>Copyright © 2021 Sazao shop. All Rights Reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
