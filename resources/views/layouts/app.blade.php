<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'e-Registry') }}| @yield('pageTitle')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="shortcut icon" href="/assets/images/favicon.ico">

    <!-- Icons css  (Mandatory in All Pages) -->
    <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css">

    <!-- App css  (Mandatory in All Pages) -->
    <link href="/assets/css/app.min.css" rel="stylesheet" type="text/css">
    <!-- Scripts -->
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css">
    @stack('styles')
</head>

<body class="font-sans antialiased">
    <div class="wrapper">

        <!-- Start Sidebar -->
        @include('layouts.partials.sidebar')
        <!-- End Sidebar -->

        <!-- Start Page Content here -->
        <div class="page-content">

            <!-- Topbar Start -->
            @include('layouts.partials.header')
            <!-- Topbar End -->

            <main>
                <div class="flex flex-wrap items-center gap-2 mb-5 md:justify-between">
                    <h4 class="text-lg font-semibold text-default-900">@yield('pageTitle')</h4>

                    <div class="items-center hidden gap-3 text-sm font-semibold md:flex">
                        <a href="#" class="text-sm font-medium text-default-700">Home</a>

                        <i class="flex-shrink-0 text-lg i-tabler-chevron-right text-default-500 rtl:rotate-180"></i>

                        <a href="#" class="text-sm font-medium text-default-700">@yield('pageTitle')</a>
                    </div>
                </div>

                <!-- Page Title Start -->
                @yield('content')
                <!-- Page Title End -->
            </main>

            <!-- Footer Start -->
            @include('layouts.partials.footer')
            <!-- Footer End -->

        </div>
        <!-- End Page content -->

    </div>

    <!-- Plugin Js (Mandatory in All Pages) -->
    <script src="/assets/libs/jquery/jquery.min.js"></script>
    <script src="/assets/libs/preline/preline.js"></script>
    <script src="/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="/assets/libs/iconify-icon/iconify-icon.min.js"></script>
    <script src="/assets/libs/node-waves/waves.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@9.0.3"></script>

    <!-- App Js (Mandatory in All Pages) -->
    <script src="/assets/js/app.js"></script>
    @stack('scripts');
</body>

</html>
