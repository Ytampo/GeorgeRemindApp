<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{ asset('img/logo-fire.jpg') }}">
    <title>単位危機管理アプリ</title>

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

    <!-- デバイス表示領域の設定 -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
</head>
<body>
    <div class="min-h-screen bg-gray-100">

        <!-- ノッチ領域の余白 -->
        <div class="notch-bar"></div>

        <!-- 画面上部の余白 -->
        <div class="space"></div>

        <!-- ログイン等ナビゲーションバー -->
        <div class="nav-bar">
            @if (Route::has('login'))
                <nav class="nav-right">
                    @auth
                        <div class="nav-guide-btn">
                            <a href="{{ url('/dashboard') }}" class="guide-mypage">
                                マイページ
                            </a>
                        </div>
                    @else
                        <div class="nav-guide-btn">
                            <a href="{{ route('login') }}" class="guide-login">
                                ログイン
                            </a>
                        </div>
    
                        @if (Route::has('register'))
                            <div class="nav-guide-btn">
                                <a href="{{ route('register') }}" class="guide-reg">
                                    登録
                                </a>
                            </div>
                        @endif
                    @endauth
                </nav>
            @endif
        </div>

        <script src="{{ asset('js/index-script.js') }}" defer></script>
        <div class="eye-catch">
            <img src="{{ asset('img/logo-fire-rad.png') }}" alt="">
            <h1>単位危機管理アプリ</h1>
        </div>
        <main class="main-content">
            <div class="top-img">
                <img src="{{ asset('img/angry-men.jpg') }}" alt="">
            </div>
            <p>
                課題を<br>
                全力で<br>
                リマインド
            </p>
        </main>
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
