<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{asset('css/output.css')}}" rel="stylesheet">
  @vite('resources/css/app.css')

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
</head>
<body class="text-black font-poppins md:pt-10 pb-[50px] scroll-smooth">
    <div id="hero-section" class="max-w-[1200px] mx-auto w-full flex flex-col gap-10 bg-center bg-no-repeat bg-cover md:rounded-[32px] overflow-hidden">  
        <nav class="flex justify-between border-b border-blue-900 bg-slate-950 items-center p-6">
            <a href="">
                <h1 class="font-bold text-2xl text-white ml-5">BelajarIn.</h1>
            </a>
            <ul class="flex items-center gap-5 text-white">
                <li>
                    <a href="{{route('front.index')}}" class="font-semibold">Home</a>
                </li>
                <li>
                    <a href="#courses" class="font-semibold">Courses</a>
                </li>
                <li>
                    <a href="#categories" class="font-semibold">Category</a>
                </li>
                @role('teacher|owner')
                <li>
                    <a href="{{route('dashboard')}}" class="font-semibold">Dashboard</a>
                </li>
                @endrole
                <li>
                    <a href="{{route('front.pricing')}}" class="font-semibold">Donation</a>
                </li>
            </ul>
            @auth
                
            <div class="flex gap-[10px] items-center mr-5">
                <div class="flex flex-col items-end justify-center">
                    <p class="font-semibold text-white">Hi, {{Auth::user()->name}}</p>
                    @if (Auth::user()->hasActiveSubscription())
                        
                    <p class="p-[2px_10px] rounded-full bg-[#FF6129] font-semibold text-xs text-white text-center">PRO</p>
                    @endif
                </div>
                <a href="{{route('dashboard')}}">
                    <div class="w-[56px] h-[56px] overflow-hidden rounded-full flex shrink-0">
                        <img src="{{Storage::url(Auth::user()->avatar)}}" class="w-full h-full object-cover" alt="photo">
                    </div>
                </a>
            </div>
            @endauth
            @guest
            <div class="flex gap-[10px] items-center">
                <a href="{{route('register')}}" class="text-white font-semibold rounded-[30px] p-[16px_32px] ring-1 ring-white transition-all duration-300 hover:ring-2 hover:ring-[#FF6129]">Sign Up</a>
                <a href="{{route('login')}}" class="text-white font-semibold rounded-[30px] p-[16px_32px] bg-[#FF6129] transition-all duration-300 hover:shadow-[0_10px_20px_0_#FF612980]">Sign In</a>
            </div>
            @endguest
        </nav>
    </div>
    <section id="Top-Categories" class="max-w-[1200px] mx-auto flex flex-col py-[70px] px-4 md:px-[100px] gap-[30px]">
        <div class="flex flex-col gap-[30px]">
            <div class="flex flex-col md:flex-row items-center gap-4">
                    <img src="{{Storage::url($category->icon)}}" class="w-40 h-40 object-cover" alt="icon">
                    <div class="flex flex-col">
                        <h2 class="font-bold text-[40px] leading-[60px]">{{$category->name}}</h2>
                        <p class="text-[#6D7786] text-lg -tracking-[2%]">Pilih Pelajaran Yang Kamu Minati di kategori {{$category->name}}</p>
                    </div>
            </div>


            <div class="flex flex-wrap flex-col md:flex-row gap-[30px] w-full">
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

    <footer class="mx-auto flex flex-col pt-[70px] gap-[50px] bg-[#F5F8FA] rounded-[32px]">
        <div class="flex justify-between">
            
        <div class="w-full h-[51px]  text-center flex items-end border-t border-[#E7EEF2]">
            <p class="mx-auto text-sm text-[#6D7786] -tracking-[2%]">All Rights Reserved BelajarLah. <br> 2024</p>
        </div>
    </footer>

    <!-- JavaScript -->
    <script src={{asset('js/main.js')}}></script>
    
</body>
</html>