<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('css/output.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <!-- CSS -->
    <title>{{$course->name}} | BelajarIn.</title>
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css" />
    @vite('resources/css/app.css')

    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"
    />
</head>
<body class="text-black bg-[#ECF7FF] font-poppins md:pb-[50px]">
    <nav class="flex justify-between border-b border-blue-900 bg-[#011C40] items-center p-6">
        <a href="">
            <h1 class="font-bold text-2xl text-white ml-5">BelajarIn.</h1>
        </a>
        <ul class="md:flex items-center hidden gap-5 text-white">
            <li>
                <a href="{{route('front.index')}}" class="font-semibold">Home</a>
            </li>
            <li>
                <a href="{{route('front.index')}}#courses" class="font-semibold">Courses</a>
            </li>
            <li>
                <a href="{{route('front.index')}}#categories" class="font-semibold">Category</a>
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
                    
                <p class="p-[2px_10px] rounded-full bg-blue-800 font-semibold text-xs text-white text-center">PRO</p>
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
            <a href="{{route('register')}}" class="text-white font-semibold rounded-[30px] p-[16px_32px] ring-1 ring-white transition-all duration-300 hover:ring-2 hover:ring-blue-800">Sign Up</a>
            <a href="{{route('login')}}" class="text-white font-semibold rounded-[30px] p-[16px_32px] bg-blue-800 transition-all duration-300 hover:shadow-[0_10px_20px_0_#FF612980]">Sign In</a>
        </div>
        @endguest
    </nav>
    <ul class="flex md:hidden items-center justify-center bg-[#011C40] mx-auto py-5 text-center w-full  gap-5 text-white">
        <li>
            <a href="{{route('front.index')}}" class="font-semibold">Home</a>
        </li>
        <li>
            <a href="{{route('front.index')}}#courses" class="font-semibold">Courses</a>
        </li>
        <li>
            <a href="{{route('front.index')}}#categories" class="font-semibold">Category</a>
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
    <section id="video-content" class="max-w-[1100px] mt-10  w-full mx-auto md:mt-[100px]">
        <div class="video-player p-3 relative flex flex-col md:flex-row flex-nowrap md:gap-5">
            <div class="plyr__video-embed w-full overflow-hidden relative md:rounded-[20px]" id="player">
                <iframe
                    src="https://www.youtube.com/embed/{{$course->path_trailer}}?origin=https://plyr.io&amp;iv_load_policy=3&amp;modestbranding=1&amp;playsinline=1&amp;showinfo=0&amp;rel=0&amp;enablejsapi=1"
                    allowfullscreen
                    allowtransparency
                    allow="autoplay"
                ></iframe>
            </div>
            <div class="video-player-sidebar m-5 flex flex-col shrink-0 md:w-[330px] h-[470px] bg-[#1243A6] rounded-[20px] p-5 gap-5 pb-0 overflow-y-scroll no-scrollbar">
                <p class="font-bold text-lg text-white">{{$course->course_videos->count()}} Lessons</p>
                <div class="flex flex-col gap-3">
                    <a href="{{route('front.details', $course)}}">
                        <div class="group p-[12px_16px] flex items-center gap-[10px] rounded-full transition-all duration-300 
                            {{ request()->routeIs('front.details') ? 'bg-[#1D64F2] text-white' : 'bg-[#E9EFF3] text-black hover:bg-[#1D64F2] hover:text-white' }}">
                            <div>
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.97 2C6.44997 2 1.96997 6.48 1.96997 12C1.96997 17.52 6.44997 22 11.97 22C17.49 22 21.97 17.52 21.97 12C21.97 6.48 17.5 2 11.97 2ZM14.97 14.23L12.07 15.9C11.71 16.11 11.31 16.21 10.92 16.21C10.52 16.21 10.13 16.11 9.76997 15.9C9.04997 15.48 8.61997 14.74 8.61997 13.9V10.55C8.61997 9.72 9.04997 8.97 9.76997 8.55C10.49 8.13 11.35 8.13 12.08 8.55L14.98 10.22C15.7 10.64 16.13 11.38 16.13 12.22C16.13 13.06 15.7 13.81 14.97 14.23Z" fill="currentColor"/>
                                </svg>
                            </div>
                            <p class="font-semibold transition-all duration-300">Course Trailer</p>
                        </div>
                    </a>
                    
                    @forelse ($course->course_videos as $video )
                    <a href="{{route('front.learning', [$course, 'courseVideoId' => $video->id])}}">
                        <div class="group p-[12px_16px] flex items-center gap-[10px] rounded-full transition-all duration-300 
                            {{ request()->routeIs('front.learning') && request('courseVideoId') == $video->id ? 'bg-[#1D64F2] text-white' : 'bg-[#E9EFF3] text-black hover:bg-[#1D64F2] hover:text-white' }}">
                            <div>
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.97 2C6.44997 2 1.96997 6.48 1.96997 12C1.96997 17.52 6.44997 22 11.97 22C17.49 22 21.97 17.52 21.97 12C21.97 6.48 17.5 2 11.97 2ZM14.97 14.23L12.07 15.9C11.71 16.11 11.31 16.21 10.92 16.21C10.52 16.21 10.13 16.11 9.76997 15.9C9.04997 15.48 8.61997 14.74 8.61997 13.9V10.55C8.61997 9.72 9.04997 8.97 9.76997 8.55C10.49 8.13 11.35 8.13 12.08 8.55L14.98 10.22C15.7 10.64 16.13 11.38 16.13 12.22C16.13 13.06 15.7 13.81 14.97 14.23Z" fill="currentColor"/>
                                </svg>
                            </div>
                            <p class="font-semibold transition-all duration-300">{{$video->name}}</p>
                        </div>
                    </a>
                    @empty
                    @endforelse
                </div>
            </div>
        </div>
    </section>
    <section id="Video-Resources" class="flex flex-col mb-20 mx-5">
        <div class="max-w-[1100px] w-full mx-auto flex flex-col gap-3">
            <h1 class="title font-extrabold text-[30px] leading-[45px] text-center sm:text-left">{{$course->name}}</h1>
            <div class="flex items-center justify-center sm:justify-start gap-5">
                <div class="flex items-center gap-[6px]">
                    <div>
                        <img src="{{Storage::url($course->category->icon)}}" class="w-8 h-8" alt="icon">
                    </div>
                    <p class="font-semibold">{{$course->category->name}}</p>
                </div>
            </div>
        </div>
        <div class="max-w-[1100px] w-full mx-auto mt-10 tablink-container flex gap-3 px-4 sm:p-0 no-scrollbar overflow-x-scroll">
            <div class="tablink font-semibold text-lg h-[47px] transition-all duration-300 cursor-pointer hover:text-[#f24822]" onclick="openPage('About', this)" id="defaultOpen">About</div>
        </div>
        <div class="max-w-[1100px] px-5 md:px-0 w-full mx-auto flex flex-col gap-[70px]">
            <div class="flex flex-col lg:flex-row gap-[50px]">
                <div class="tabs-container w-full lg:w-[700px] flex shrink-0">
                    <div id="About" class="tabcontent hidden">
                        <div class="flex flex-col gap-5">
                            <p class="font-medium leading-[30px] mt-5">{{$course->about}}</p>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-[30px] gap-y-5">
                                @forelse ($course->course_keypoints as $keypoint)
                                    <div class="benefit-card flex items-center gap-3">
                                        <div class="w-6 h-6 flex shrink-0">
                                            <img src="{{asset('assets/icon/tick-circle.svg')}}" alt="icon">
                                        </div>
                                        <p class="font-medium leading-[30px]">{{$keypoint->name}}</p>
                                    </div>
                                @empty
                                    <p>No keypoints available.</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mentor-sidebar flex flex-col gap-[30px] w-full">
                    <div class="mentor-info bg-[#1243A6] flex flex-col gap-4 rounded-2xl p-5">
                        <p class="font-bold text-lg text-left w-full text-white">Teacher</p>
                        <div class="flex items-center justify-between w-full">
                            <div class="flex items-center gap-3">
                                <a href="" class="w-[50px] h-[50px] flex shrink-0 rounded-full overflow-hidden">
                                    <img src="{{Storage::url($course->teacher->user->avatar)}}" class="w-full h-full object-cover" alt="photo">
                                </a>
                                <div class="flex flex-col gap-[2px]">
                                    <a href="" class="font-semibold text-white">{{$course->teacher->user->name}}</a>
                                    <p class="text-sm text-[#a4a8b0]">{{$course->teacher->user->occupation}}</p>
                                </div>
                            </div>
                            <a href="" class="p-[4px_12px] rounded-full bg-[#f24822] font-semibold text-xs text-white text-center">Follow</a>
                        </div>
                    </div>
                </div>
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
    <script
        src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous">
    </script>

    <script src="https://cdn.plyr.io/3.7.8/plyr.polyfilled.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>  

    <script src={{asset('js/main.js')}}></script>
    </body>
</html>