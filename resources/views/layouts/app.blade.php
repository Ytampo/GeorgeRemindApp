<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{-- CSRF Token --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap');
            @import url('https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@200..900&display=swap');
        </style>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
        <link rel="manifest" href="{{ asset('js/manifest.json') }}">
        <script src="{{ asset('js/no-scroll.js') }}" defer></script>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        @yield('css')
        @yield('js')

        <!-- デバイス表示領域の設定 -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')
            <!-- ノッチ領域の余白 -->
            <div class="notch-bar"></div>

            <!-- 画面上部の余白 -->
            <div class="space"></div>

            <!-- Page Content -->
            <main>
                @yield('content')
            </main>

            <!-- 画面下部タブバー -->
            <footer>
                <div class="footer-item">
                    <a href="{{ route('add-task') }}"><img class="footer-logo" src="{{ asset('img/reg-assignment-logo.png') }}"></a>
                </div>
                <div class="footer-item">
                    <a href="{{ route('dashboard') }}"><img class="footer-logo" src="{{ asset('img/home-logo.png') }}"></a>
                </div>
                <div class="footer-item">
                    <a href="{{ route('schedule') }}"><img class="footer-logo" src="{{ asset('img/time-logo.png') }}"></a>
                </div>
            </footer>
            
            <!-- ServiceWorkerの登録情報(PWAに必要) -->
            <script>
                if ('serviceWorker' in navigator) {
                    window.addEventListener('load', function() {
                        navigator.serviceWorker.register('/js/service-worker.js')
                            .then(function(registration) {
                                console.log('ServiceWorker registration successful with scope: ', registration.scope);
                            }, function(err) {
                                console.log('ServiceWorker registration failed: ', err);
                            });
                    });
                }
            </script>
        </div>
    </body>
</html>
