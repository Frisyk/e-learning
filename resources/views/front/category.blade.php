<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{asset('css/output.css')}}" rel="stylesheet">
  @vite('resources/css/app.css')
  <title>Kategori | BelajarIn.</title>

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
</head>
<body class="text-black bg-[#ECF7FF] font-poppins md:pb-[50px] scroll-smooth">
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
            <a href="{{route('login')}}" class="text-white font-semibold rounded-[30px] md:p-[16px_32px] p-2 text-xs  bg-blue-800 transition-all duration-300 hover:shadow-[0_10px_20px_0_#FF612980]">
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
    <section id="Top-Categories" class="max-w-[1200px] mx-auto flex flex-col py-[70px] px-4 md:px-[100px] gap-[30px]">
        <div class="flex flex-col gap-[30px]">
            <div class="flex flex-col md:flex-row items-center gap-4">
                <img src="{{Storage::url($category->icon)}}" class="w-40 h-40 object-cover" alt="icon">
                <div class="flex flex-col">
                    <h2 class="font-bold text-[40px] leading-[60px]">{{$category->name}}</h2>
                    <p class="text-[#6D7786] text-lg -tracking-[2%]">Pilih Pelajaran Yang Kamu Minati di kategori {{$category->name}}</p>
                </div>
            </div>
    
            <div class="grid grid-cols-2 md:grid-cols-4 gap-5 w-full">
                @forelse ($courses as $course )
                    <div class="course-card">
                        <div class="flex flex-col rounded-t-[12px] rounded-b-[24px] gap-5 bg-white w-full pb-[10px] overflow-hidden ring-1 ring-[#DADEE4] transition-all duration-300 hover:ring-2 hover:ring-blue-800">
                            <a href="{{route('front.details', $course->slug)}}" class="thumbnail w-full h-[200px] shrink-0 rounded-[10px] overflow-hidden">
                                <img src="{{Storage::url($course->thumbnail)}}" class="w-full h-full object-cover" alt="thumbnail">
                            </a>
                            <div class="flex flex-col px-4 ">
                                <div class="flex flex-col gap-[10px]">
                                    <a href="{{route('front.details', $course->slug)}}" class="font-semibold text-lg line-clamp-2 hover:line-clamp-none py-2">{{$course->name}}</a>
                                </div>
                                <div class="flex items-center gap-2">
                                    <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                        <img src="{{Storage::url($course->teacher->user->avatar)}}" class="w-full h-full object-cover" alt="icon">
                                    </div>
                                    <div class="flex flex-col">
                                        <p class="font-semibold">{{$course->teacher->user->name}}</p>
                                        <p class="text-[#6D7786]">{{$course->teacher->user->occupation}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                <p>Belum tersedia kelas pada kategory ini</p>
                @endforelse
            </div>
        </div>
    </section>
    
    <footer class="max-w-[1200px] mx-auto flex flex-col py-20 md:mb-10 px-10 md:px-[100px] gap-[50px] bg-[#011C40] text-white md:rounded-[32px]">
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

    <!-- JavaScript -->
    <script src={{asset('js/main.js')}}></script>
    
</body>
</html>