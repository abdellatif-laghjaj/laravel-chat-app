<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Abdel ChatX</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-image: url('bg.svg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }
    </style>
</head>
<body class="antialiased">
<div
    class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

    <div class="container col-xxl-8 px-4 py-5">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
            <div class="col-10 col-sm-8 col-lg-6">
                <img src="https://i.ibb.co/0rqKzzn/Screenshot-2022-09-20-022354.png"
                     class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500"
                     loading="lazy">
            </div>
            <div class="col-lg-6">
                <h1 class="display-5 fw-bold lh-1 mb-3">
                    Abdel <span class="text-primary">ChatX</span>
                </h1>
                <p class="lead">
                    Abdel ChatX is a simple chat application that allows you to chat with your friends and family in
                    real time.
                </p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                    @if(Route::has('login'))
                        @auth
                            <a href="{{ url('/home') }}" class="btn btn-primary btn-lg px-4 me-md-2">Home</a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-primary btn-lg px-4 me-md-2">Log in</a>
                            @if(Route::has('register'))
                                <a href="{{ route('register') }}"
                                   class="btn btn-outline-secondary btn-lg px-4">Register</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
