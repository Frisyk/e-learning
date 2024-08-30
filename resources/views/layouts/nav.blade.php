<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> 
    <nav class="flex justify-between flex-col h-screen items-center pt-6 px-12">
        <a href="{{ url('/') }}" class="flex items-center">
            <img src="{{ asset('assets/logo/logo.svg') }}" alt="logo" class="h-8">
        </a>
        <ul class="flex items-center gap-8 ">
            <li>
                <a href="{{ route('front.index') }}" class="font-semibold">Home</a>
            </li>
            <li>
                <a href="{{ route('front.pricing') }}" class="font-semibold">Pricing</a>
            </li>
            @role('teacher|owner')
            <li>
                <a href="{{ route('dashboard') }}" class="font-semibold">Dashboard</a>
            </li>
            @endrole
        </ul>
        @auth
        <div class="flex gap-4 items-center">
            <div class="flex flex-col items-end justify-center">
                <p class="font-semibold text-white">Hi, {{ Auth::user()->name }}</p>
                @if (Auth::user()->hasActiveSubscription())
                <p class="px-3 py-1 rounded-full bg-[#FF6129] font-semibold text-xs text-white text-center">
                    PRO
                </p>
                @endif
            </div>
            <a href="{{ route('dashboard') }}">
                <div class="w-14 h-14 overflow-hidden rounded-full flex shrink-0">
                    <img src="{{ Storage::url(Auth::user()->avatar) }}" alt="photo" class="w-full h-full object-cover">
                </div>
            </a>
        </div>
        @endauth
        @guest
        <div class="flex gap-4 items-center">
            <a href="{{ route('register') }}" class="text-white font-semibold rounded-full py-4 px-8 ring-1 ring-white transition-all duration-300 hover:ring-2 hover:ring-[#FF6129]">
                Registrasi
            </a>
            <a href="{{ route('login') }}" class="text-white font-semibold rounded-full py-4 px-8 bg-[#FF6129] transition-all duration-300 hover:shadow-lg">
                Login
            </a>
        </div>
        @endguest
    </nav>
</body>
</html>