<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }} | {{ config('app.name') }}</title>
    <link rel="icon"
        href="https://static.wixstatic.com/media/bb5bf7_7f64b40bf2b2499c87edc173a5e23266~mv2.png/v1/fill/w_560,h_560,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/aura%20esport%20logo.png"
        type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('style')
</head>

<body>
    @include('user.layouts.sidebar')
    <div class="p-4 sm:ml-64">
        <div class="p-4">
            @yield('content')
        </div>
    </div>
</body>

</html>
@include('user.layouts.modalSignout')
