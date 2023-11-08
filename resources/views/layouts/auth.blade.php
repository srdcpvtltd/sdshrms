<!DOCTYPE html>
@php
    $logos = \App\Models\Utility::get_file('uploads/logo/');
    
    $logo = Utility::get_superadmin_logo();
    $company_favicon = Utility::getValByName('company_favicon');
    
    $dark_mode = Utility::getValByName('dark_mode');
    $theme_color = Utility::getValByName('theme_color');
    // $SITE_RTL = env('SITE_RTL');
    $SITE_RTL = \App\Models\Utility::getValByName('SITE_RTL');
    
    $setting = App\Models\Utility::colorset();
    $mode_setting = App\Models\Utility::mode_layout();
    $color = 'theme-3';
    if (!empty($mode_setting['theme_color'])) {
        $color = $mode_setting['theme_color'];
    }
    
    $getseo = App\Models\Utility::getSeoSetting();
    $metatitle = isset($getseo['meta_title']) ? $getseo['meta_title'] : '';
    $metadesc = isset($getseo['meta_description']) ? $getseo['meta_description'] : '';
    $meta_image = \App\Models\Utility::get_file('uploads/meta/');
    $meta_logo = isset($getseo['meta_image']) ? $getseo['meta_image'] : '';
    $enable_cookie = \App\Models\Utility::getCookieSetting('enable_cookie');
    
    if ($lang == 'ar' || $lang == 'he') {
        $SITE_RTL = 'on';
    }
    
@endphp
<html lang="en">
{{-- <html dir="{{ env('SITE_RTL') == 'on' ? 'rtl' : '' }}"> --}}
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ $SITE_RTL == 'on' ? 'rtl' : '' }}">


<head>

    <title>
        {{ Utility::getValByName('title_text') ? Utility::getValByName('title_text') : config('app.name', 'HRMGo') }}
        - @yield('page-title')</title>

    <!-- SEO META -->
    <meta name="title" content="{{ $metatitle }}">
    <meta name="description" content="{{ $metadesc }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ env('APP_URL') }}">
    <meta property="og:title" content="{{ $metatitle }}">
    <meta property="og:description" content="{{ $metadesc }}">
    <meta property="og:image"
        content="{{ isset($meta_logo) && !empty(asset('storage/uploads/meta/' . $meta_logo)) ? asset('storage/uploads/meta/' . $meta_logo) : 'hrmgo.png' }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ env('APP_URL') }}">
    <meta property="twitter:title" content="{{ $metatitle }}">
    <meta property="twitter:description" content="{{ $metadesc }}">
    <meta property="twitter:image"
        content="{{ isset($meta_logo) && !empty(asset('storage/uploads/meta/' . $meta_logo)) ? asset('storage/uploads/meta/' . $meta_logo) : 'hrmgo.png' }}">


    <!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 11]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />


    <meta name="description" content="Dashboard Template Description" />
    <meta name="keywords" content="Dashboard Template" />
    <meta name="author" content="SRDC Private Limited" />

    <!-- Favicon icon -->
    <link rel="icon" href="{{ asset(Storage::url('uploads/logo')) . '/favicon.png' }}" type="image/x-icon" />

    <!-- font css -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/tabler-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/material.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/stylesheet.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <!-- vendor css -->

    <link rel="stylesheet" href="{{ asset('assets/css/customizer.css') }}">


    @if ($SITE_RTL == 'on')
        <link rel="stylesheet" href="{{ asset('assets/css/style-rtl.css') }}">
    @endif

    @if (isset($mode_setting['dark_mode']) && $mode_setting['dark_mode'] == 'on')
        <link rel="stylesheet" href="{{ asset('assets/css/style-dark.css') }}">
    @elseif ($SITE_RTL == 'on')
        <link rel="stylesheet" href="{{ asset('assets/css/style-rtl.css') }}">
    @else
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    @endif

    @if (isset($mode_setting['dark_mode']) && $mode_setting['dark_mode'] == 'on')
        <link rel="stylesheet" href="{{ asset('assets/css/custom-dark.css') }}">
    @endif

</head>

<body class="{{ $color }}">
    <!-- [ auth-signup ] start -->
    <div class="auth-wrapper auth-v3">
        <div class="bg-auth-side bg-primary"></div>
        <div class="auth-content">
            <nav class="navbar navbar-expand-md navbar-light default">
                <div class="container-fluid pe-2">
                    <a class="navbar-brand" href="#">
                        <img src="{{ $logos . $logo }}" alt="{{ env('APP_NAME') }}" class="logo logo-lg" />
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                   
                </div>
            </nav>
            <div class="card">
                <div class="row align-items-center text-start">
                    @yield('content')

                </div>
            </div>
            <div class="auth-footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-6">
                            &copy;{{ date(' Y') }}
                            {{ App\Models\Utility::getValByName('footer_text') ? App\Models\Utility::getValByName('footer_text') : config('app.name', 'HRMGo') }}

                            {{-- &copy;{{ __('Copyright') }}
                            {{ Utility::getValByName('footer_text') ? Utility::getValByName('footer_text') : config('app.name', 'HRMGo') }}
                            {{ date('Y') }} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ auth-signup ] end -->

    <!-- Required Js -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor-all.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/feather.min.js') }}"></script>
    <script>
        feather.replace();
    </script>

    {{-- @if ($SITE_RTL == 'on')
        <link rel="stylesheet" href="{{ asset('assets/css/style-rtl.css') }}">
    @endif --}}

    <input type="checkbox" class="d-none" id="cust-theme-bg"
        {{ Utility::getValByName('cust_theme_bg') == 'on' ? 'checked' : '' }} />
    <input type="checkbox" class="d-none" id="cust-darklayout"
        {{ Utility::getValByName('cust_darklayout') == 'on' ? 'checked' : '' }} />

    {{-- Dark Mode ReCaptcha --}}
    @if ($dark_mode == 'on')
        <style>
            .g-recaptcha {
                filter: invert(1) hue-rotate(180deg) !important;
            }
        </style>
    @endif

    <script src="{{ asset('js/custom.js') }}"></script>
    <script>
        var toster_pos = "{{ $SITE_RTL == 'on' ? 'left' : 'right' }}";
    </script>
    @stack('script')
    @stack('custom-scripts')

    {{-- @stack('custom-scripts') --}}
    @stack('custom-scripts')
    @if ($enable_cookie['enable_cookie'] == 'on')
        @include('layouts.cookie_consent')
    @endif

    @if ($message = Session::get('success'))
        <script>
            show_toastr('Success', '{!! $message !!}', 'success');
        </script>
    @endif
    @if ($message = Session::get('error'))
        <script>
            show_toastr('Error', '{!! $message !!}', 'error');
        </script>
    @endif
</body>

</html>
