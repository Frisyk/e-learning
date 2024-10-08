<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('css/output.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css" />
    @vite('resources/css/app.css')
    <title>Langganan | BelajarIn.</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
</head>
<body class="text-black bg-[#ECF7FF] font-poppins h-screen">
    <nav class="flex justify-between border-b border-blue-900 bg-[#011C40] items-center p-6">
        <a href="/">
            <h1 class="font-bold text-2xl text-white ml-2 md:ml-5 transition-transform duration-300 ease-in-out hover:scale-110">
                BelajarIn.
            </h1>
        </a>
        <ul class="md:flex items-center hidden gap-5 text-white">
            <li>
                <a href="{{route('front.index')}}" class="font-semibold transition-colors duration-300 ease-in-out hover:text-blue-400">
                    Beranda
                </a>
            </li>
            <li>
                <a href="{{route('front.categories')}}" class="font-semibold transition-colors duration-300 ease-in-out hover:text-blue-400">
                    Kategori
                </a>
            </li>
            <li>
                <a href="{{route('front.classes')}}" class="font-semibold transition-colors duration-300 ease-in-out hover:text-blue-400">
                    Kursus
                </a>
            </li>
            @role('teacher|owner')
            <li>
                <a href="{{route('dashboard')}}" class="font-semibold transition-colors duration-300 ease-in-out hover:text-blue-400">
                    Dashboard
                </a>
            </li>
            @endrole
            <li>
                <a href="{{route('front.pricing')}}" class="font-semibold transition-colors duration-300 ease-in-out hover:text-blue-400">
                    Langganan
                </a>
            </li>
        </ul>
        @auth
        <div class="flex gap-[10px] items-center mr-2 md:mr-5">
            <div class="flex flex-col items-end justify-center">
                <p class="font-semibold capitalize text-white">Hi, {{Auth::user()->name}}!</p>
                @if (Auth::user()->hasActiveSubscription())
                <p class="p-[2px_10px] rounded-full bg-blue-800 font-semibold text-xs text-white text-center transition-transform duration-300 ease-in-out hover:scale-105">
                    PRO
                </p>
                @endif
            </div>
            <a href="{{route('dashboard')}}">
                <div class="md:w-10 md:h-10 w-8 h-8 ring-2 overflow-hidden rounded-full flex shrink-0 transition-transform duration-300 ease-in-out hover:scale-110">
                    <img src="{{Storage::url(Auth::user()->avatar)}}" class="w-full h-full object-cover" alt="photo">
                </div>
            </a>
        </div>
        @endauth
        @guest
        <div class="flex gap-[10px] items-center">
            <a href="{{route('register')}}" class="text-white font-semibold rounded-[30px] md:p-[16px_32px] p-2 text-xs  ring-1 ring-white transition-all duration-300 hover:ring-2 hover:ring-blue-800">
                Sign Up
            </a>
            <a href="{{route('login')}}" class="text-white font-semibold rounded-[30px] md:p-[16px_32px] p-2 text-xs bg-blue-800 transition-all duration-300 hover:shadow-[0_10px_20px_0_#FF612980]">
                Sign In
            </a>
        </div>
        @endguest
    </nav>
    <ul class="flex md:hidden text-xs flex-wrap items-center justify-center bg-[#011C40] mx-auto py-5 text-center w-full gap-5 text-white">
        <li>
            <a href="{{route('front.index')}}" class="font-semibold transition-colors duration-300 ease-in-out hover:text-blue-400">
                Beranda
            </a>
        </li>
        <li>
            <a href="{{route('front.categories')}}" class="font-semibold transition-colors duration-300 ease-in-out hover:text-blue-400">
                Kategori
            </a>
        </li>
        <li>
            <a href="{{route('front.classes')}}" class="font-semibold transition-colors duration-300 ease-in-out hover:text-blue-400">
                Kursus
            </a>
        </li>
        @role('teacher|owner')
        <li>
            <a href="{{route('dashboard')}}" class="font-semibold transition-colors duration-300 ease-in-out hover:text-blue-400">
                Dashboard
            </a>
        </li>
        @endrole
        <li>
            <a href="{{route('front.pricing')}}" class="font-semibold transition-colors duration-300 ease-in-out hover:text-blue-400">
                Langganan
            </a>
        </li>
    </ul>

<div class="flex items-center justify-center md:mt-10">
        <div class="bg-white p-8 rounded-3xl md:shadow-lg w-full max-w-lg">
            @if ($user == null || !$user->hasActiveSubscription())
            <div id="subs" class="flex flex-col gap-8">
                <div class="text-center">
                    <p class="font-semibold text-4xl leading-tight mb-4">Langganan</p>
                    <p class="text-[#475466] text-lg mb-6">Akses Semua kelas untuk memaksimalkan belajarmu</p>
                    <p class="font-semibold text-4xl leading-tight mb-4">Rp 100.000<span class="text-[#475466] text-lg">/bulan</span></p>
                </div>
                <div class="flex flex-col gap-4">
                    <div class="flex gap-3 items-center">
                        <div class="w-6 h-6 flex shrink-0">
                            <img src="assets/icon/tick-circle.svg" class="w-full h-full object-cover" alt="icon">
                        </div>
                        <p class="text-[#475466]">Akses ke Semua Materi Pelajaran</p>
                    </div>
                    <div class="flex gap-3 items-center">
                        <div class="w-6 h-6 flex shrink-0">
                            <img src="assets/icon/tick-circle.svg" class="w-full h-full object-cover" alt="icon">
                        </div>
                        <p class="text-[#475466]">Materi interaktif membuat Anda belajar dengan menyenangkan.</p>
                    </div>
                    <div class="flex gap-3 items-center">
                        <div class="w-6 h-6 flex shrink-0">
                            <img src="assets/icon/tick-circle.svg" class="w-full h-full object-cover" alt="icon">
                        </div>
                        <p class="text-[#475466]">Dapatkan materi pembelajaran yang mendukung semua gaya belajar</p>
                    </div>
                    <div class="flex gap-3 items-center">
                        <div class="w-6 h-6 flex shrink-0">
                            <img src="assets/icon/tick-circle.svg" class="w-full h-full object-cover" alt="icon">
                        </div>
                        <p class="text-[#475466]">Memperluas Kesempatan Pendidikan dan Mendorong Anda Berinovasi</p>
                    </div>
                </div>
                <a href="{{route('front.checkout')}}" class="p-[20px_32px] bg-[#FF6129] text-white rounded-full text-center font-semibold text-xl transition-all duration-300 hover:shadow-[0_10px_20px_0_#FF612980]">Langganan Sekarang!</a>
            </div>
            @else
            <div class="p-8 text-center">
                <p class="font-semibold text-4xl leading-tight mb-6">Kamu Sudah Berlangganan</p>
                <a href="{{route('front.index')}}">
                    <button class="bg-[#011C40] text-white px-6 py-3 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300">
                        Kembali ke halaman utama
                    </button>
                </a>
            </div>
            @endif
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.plyr.io/3.7.8/plyr.polyfilled.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <script src={{asset('js/main.js')}}></script>
</body>
</html>
