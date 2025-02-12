<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <meta charset="utf-8" />
    <link rel="icon" href="{{ asset('assets/media/images/logo/logo.png') }}" type="image/icon type">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    @yield('css')
</head>

<body class="aside-enabled">
    @include('layouts.partials.theme_mode')
    <!--begin::Main-->
    <div class="d-flex flex-column flex-root">
        <div class="page d-flex flex-row flex-column-fluid">
            @include('layouts.partials.sidebar')
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                <!--begin::Header-->
                <div id="kt_header" style="" class="header align-items-stretch">
                    <div class="header-brand">
                        <!--begin::Logo-->
                        <a href="index.html">
                            <img alt="Logo" src="{{ asset('assets/media/images/logo/logo.png') }}"
                                class="h-25px h-lg-25px" />
                        </a>
                        <!--begin::Aside minimize-->
                        <div id="kt_aside_toggle"
                            class="btn btn-icon w-auto px-0 btn-active-color-primary aside-minimize"
                            data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
                            data-kt-toggle-name="aside-minimize">
                            <i class="ki-duotone ki-entrance-right fs-1 me-n1 minimize-default">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            <i class="ki-duotone ki-entrance-left fs-1 minimize-active">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </div>
                        <!--begin::Aside toggle-->
                        <div class="d-flex align-items-center d-lg-none me-n2" title="Show aside menu">
                            <div class="btn btn-icon btn-active-color-primary w-30px h-30px"
                                id="kt_aside_mobile_toggle">
                                <i class="ki-duotone ki-abstract-14 fs-1">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </div>
                        </div>
                    </div>
                    <!--begin::Toolbar-->
                    @include('layouts.partials.navbar')
                </div>
                <!--begin::Content-->
                @include('common.alert')
                @yield('content')
                <!--begin::Footer-->
                {{-- @include('layouts.partials.footer') --}}
            </div>
        </div>
    </div>
    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <i class="ki-duotone ki-arrow-up">
            <span class="path1"></span>
            <span class="path2"></span>
        </i>
    </div>
    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/master.js') }}"></script>
    <script src="{{ asset('assets/js/filter.js') }}"></script>
    @yield('script')
</body>

</html>
