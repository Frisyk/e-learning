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
    <title>Roadmap for {{$user->name}} | BelajarIn.</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
</head>
<body class="text-black bg-[#ECF7FF] font-poppins min-h-screen">
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
            <a href="{{route('register')}}" class="text-white font-semibold rounded-[30px] md:p-[16px_32px] p-2 text-xs ring-1 ring-white transition-all duration-300 hover:ring-2 hover:ring-blue-800">
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
    <section class="w-full text-center h-screen grid place-content-center" id="loading">
        <div class="flex flex-col items-center justify-center gap-1">
            <div class="typewriter">
                <div class="slide"><i></i></div>
                <div class="paper"></div>
                <div class="keyboard"></div>
            </div>
            <h1>Sedang Membuat Roadmapmu...</h1>
        </div>
    </section>
    <section id="roadmap" class="flex md:w-4/5 flex-col md:flex-row mx-auto mb-10 items-center space-x-8 md:p-8 p-4 bg-blue-50">
        <!-- Left side: Title -->
        <div class="md:w-1/2 md:sticky top-10">
            <h1 class="text-7xl font-bold mb-2">RoadMap</h1>
            <h2 class="text-4xl font-extrabold text-blue-700 capitalize">Untuk {{$user->name}}🔥</h2>
        </div>
        
        <!-- Right side: Roadmap list (scrollable) -->
        <div id="course-slider" class="md:w-1/2 no-scrollbar md:max-h-screen p-6 md:overflow-y-scroll space-y-4">
            @forelse ($roadmap as $index => $road )
                <div class="relative ">
                    <!-- Number circle -->
                    <div class="flex absolute -top-4 -left-4 items-center justify-center md:h-12 md:w-12 w-8 h-8 rounded-full bg-red-500 text-white text-md md:text-xl font-bold">
                        {{ $index + 1 }}
                    </div>
                    <!-- Roadmap text -->
                    <div class="bg-white md:px-10 my-10 md:py-16 p-6 rounded-lg ring-1 tracking-wide leading-relaxed text-wrap">
                        <p class="md:text-4xl text-2xl font-semibold">{{ $road }}</p>
                    </div>
                </div>
            @empty
                <p>Tidak ada roadmap yang tersedia</p>
            @endforelse
        </div>
    </section>
    
    <footer class="max-w-[1200px] mx-auto flex flex-col py-20 md:my-10 px-10 md:px-[100px] gap-[50px] bg-[#011C40] text-white md:rounded-[32px]">
        <div class="flex flex-col gap-5 md:flex-row justify-between">
            <a href="">
                <h1 class="text-2xl font-bold">BelajarIn.</h1>
            </a>
            <div class="flex flex-col gap-5">
                <p class="font-semibold text-lg">Products</p>
                <ul class="flex flex-col gap-[14px]">
                    <li>
                        <a href="" class="text-[#6D7786]">Online Courses</a>
                    </li>
                    <li>
                        <a href="" class="text-[#6D7786]">Career Guidance</a>
                    </li>
                    <li>
                        <a href="" class="text-[#6D7786]">Expert Handbook</a>
                    </li>
                    <li>
                        <a href="" class="text-[#6D7786]">Interview Simulations</a>
                    </li>
                </ul>
            </div>
            <div class="flex flex-col gap-5">
                <p class="font-semibold text-lg">Company</p>
                <ul class="flex flex-col gap-[14px]">
                    <li>
                        <a href="" class="text-[#6D7786]">About Us</a>
                    </li>
                    <li>
                        <a href="" class="text-[#6D7786]">Media Press</a>
                    </li>
                    <li class="flex items-center gap-[10px]">
                        <a href="" class="text-[#6D7786]">Careers</a>
                        <div class="gradient-badge w-fit p-[6px_10px] rounded-full border border-[#FED6AD] flex items-center">
                            <p class="font-medium text-xs text-blue-800">We’re Hiring</p>
                        </div>
                    </li>
                    <li>
                        <a href="" class="text-[#6D7786]">Developer APIs</a>
                    </li>
                </ul>
            </div>
            <div class="flex flex-col gap-5">
                <p class="font-semibold text-lg">Resources</p>
                <ul class="flex flex-col gap-[14px]">
                    <li>
                        <a href="" class="text-[#6D7786]">Blog</a>
                    </li>
                    <li>
                        <a href="" class="text-[#6D7786]">FAQ</a>
                    </li>
                    <li>
                        <a href="" class="text-[#6D7786]">Help Center</a>
                    </li>
                    <li>
                        <a href="" class="text-[#6D7786]">Terms & Conditions</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="w-full h-[51px] flex items-end border-t border-[#E7EEF2]">
            <p class="mx-auto text-sm text-center text-[#6D7786] -tracking-[2%]">All Rights Reserved <span class="font-bold text-gray-300">BelajarIn.</span><br> 2024</p>
        </div>
    </footer>

     <script>
        // Wait for 3 seconds and then display the section, hiding the loading effect
        setTimeout(() => {
            document.getElementById('roadmap').style.display = 'flex';
            document.getElementById('loading').style.display = 'none';
        }, 4000); // 3000 milliseconds = 3 seconds
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.plyr.io/3.7.8/plyr.polyfilled.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <script src={{asset('js/main.js')}}></script>
</body>
</html>
