@extends('frontend.layouts.master')

@section('title')
    Contact|| {{ $settings->site_name }}
@endsection

@section('content')
    <section id="wsus__contact">
        <div class="container">
            <div class="wsus__contact_area">
                <div class="row">
                    <div class="col-xl-4">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="wsus__contact_single">
                                    <i class="fal fa-envelope"></i>
                                    <h5>mail address</h5>
                                    <a href="mailto:{{ $settings->contact_email }}">{{ @$settings->contact_email }}</a>
                                    <span><i class="fal fa-envelope"></i></span>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="wsus__contact_single">
                                    <i class="far fa-phone-alt"></i>
                                    <h5>phone number</h5>
                                    <a href="macallto: {{ @$settings->contact_phone }}">{{ @$settings->contact_phone }}</a>
                                    <span><i class="far fa-phone-alt"></i></span>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="wsus__contact_single">
                                    <i class="fal fa-map-marker-alt"></i>
                                    <h5>contact address</h5>
                                    <a href="mailto:{{ $settings->contact_address }}">{{ $settings->contact_address }}</a>
                                    <span><i class="fal fa-map-marker-alt"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8">
                        <div class="wsus__contact_question">
                            <h5>Send Us a Message</h5>
                            <form id="contact-form" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="wsus__con_form_single">
                                            <input type="text" placeholder="Your Name" name="name">
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="wsus__con_form_single">
                                            <input type="email" placeholder="Email" name="email">
                                        </div>
                                    </div>
                                    {{-- <div class="col-xl-6">
                                        <div class="wsus__con_form_single">
                                            <input type="text" placeholder="Phone" name="phone">
                                        </div>
                                    </div> --}}
                                    <div class="col-xl-12">
                                        <div class="wsus__con_form_single">
                                            <input type="text" placeholder="Subject" name="subject">
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="wsus__con_form_single">
                                            <textarea cols="3" rows="5" placeholder="Message" name="message"></textarea>
                                        </div>
                                        <button type="submit" class="common_btn">send now</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="wsus__con_map">
                            <iframe src="{{ $settings->map }}" width="1600" height="450" style="border:0;"
                                allowfullscreen="100" loading="lazy"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#contact-form').on('submit', function(event) {
                event.preventDefault();
                let formData = $(this).serialize()
                $.ajax({
                    url: "{{ route('send-contact') }}",
                    method: 'POST',
                    data: formData,
                    beforeSend: function() {
                        $('#submitCheckout').html(
                            '<i class="fas fa-spinner fa-spin fa-1x"></i>')
                    },
                    success: function(data) {
                        if (data.status === 'success') {
                            $('#submitCheckout').text('send');
                            toastr.success(data.message);
                        }
                    },
                    error: function(data) {
                        let errors = data.responseJSON.errors;

                        $.each(errors, function(key, value) {
                            toastr.error(value);
                        })
                    }
                })
            })
        })
    </script>
@endpush
