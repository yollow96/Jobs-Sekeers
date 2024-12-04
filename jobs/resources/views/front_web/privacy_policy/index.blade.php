@extends('front_web.layouts.app')
@section('title')
    {{ __('messages.setting.privacy_policy') }}
@endsection
@section('content')
    <section class="hero-section position-relative bg-light py-40">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6  text-center mb-lg-0 mb-md-5 mb-sm-4 ">
                    <div class="hero-content">
                        <h1 class="text-secondary mb-3">
                            {{ __('messages.setting.privacy_policy') }}
                        </h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb  justify-content-center mb-0">
                                <li class="breadcrumb-item "><a href="{{ route('front.home') }}" class="fs-18 text-gray">{{ __('web.home') }}</a>
                                </li>
                                <li class="breadcrumb-item text-primary fs-18" aria-current="page">{{ __('messages.setting.privacy_policy') }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>

{{--    <section class="tnc-section">--}}
{{--        <div class="auto-container">--}}
{{--            <div class="text-box">--}}
{{--                <p>{!! nl2br($privacyPolicy[0]['value']) !!}</p>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
    <div class="py-60">
        <div class="container">
            <div class="mb-40">
                <div class="privacy-policy">
                    {!! nl2br($privacyPolicy) !!}
                </div>
            </div>
        </div>
    </div>
@endsection

{{--@section('scripts')--}}
{{--    <script>--}}
        {{--let registerSaveUrl = "{{ route('front.save.register') }}";--}}
        {{--let logInUrl = "{{ route('login') }}";--}}
{{--    </script>--}}
{{--    <script src="{{asset('assets/js/front_register/front_register.js')}}"></script>--}}
{{--@endsection--}}
