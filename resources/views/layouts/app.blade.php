<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
    <title>{{ $title ?? config('app.name') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">

        @if (Auth::check() && !Auth::user()->email_verified_at)
            <div class="alert alert-danger mb-n1 text-center" role="alert">
                Anda Belum Verifikasi Email,
                <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Verifikasi ulang') }}</button>.
                </form>
            </div>
        @endif

        <x-navbar></x-navbar>

        <main class="py-4">
            <div class="container">
                <div class="row justify-content-end">
                    <div class="col-md-6">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('Tautan Verifikasi baru telah dikirim ke alamat email anda.') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            @yield('content')
        </main>
    </div>
</body>
</html>
