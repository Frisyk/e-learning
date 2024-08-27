<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{asset('css/output.css')}}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <!-- CSS -->
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <title>BelajarIn | Home</title>
</head>
<body class="text-black font-poppins scroll-smooth">
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
    <section class="bg-[#011c40] flex-col md:flex-row flex w-full">
        <div class="text flex flex-col gap-10 flex-1 p-6 md:pl-20 md:py-40">
            <h1 class="text-7xl font-bold leading-normal text-white">Temukan, Mulai, <br> dan Tekuni</h1>
            <p class="text-xl leading-relaxed text-slate-300">"Jika kamu tidak sanggup menahan lelahnya belajar maka kamu harus sanggup menahan perihnya kebodohan" - Imam Syafi'i</p>
            <a href="#courses"><button class="text-xl font-semibold w-fit text-white p-6 px-10 rounded-full bg-blue-800 hover:shadow-[0_10px_20px_0_#FF612980]">➡️Mulai Belajar</button></a>
        </div>
        <img src="assets/background/hero.png" class="md:w-1/2 bottom-0 md:mt-40" alt="hero banner">

    </section>


        <section id="Zero-to-Success" class=" mx-auto flex flex-col py-[70px] px-[50px] gap-[30px] bg-white">
            <div class="flex flex-col gap-[30px] items-center text-center">
                
                <div class="flex flex-col">
                    <h2 class="font-bold text-[40px] leading-[60px]">Browse Categories</h2>
                    <p class="text-[#6D7786] text-lg -tracking-[2%]">Cari dan Pilih Kategori Yang Kamu Inginkan</p>
                </div>
            </div>
            <div class="testi w-full overflow-hidden flex flex-col gap-6 relative">
                <div class="fade-overlay absolute z-10 h-full w-[50px] bg-gradient-to-r from-white to-[#F5F8FA00]"></div>
                <div class="fade-overlay absolute right-0 z-10 h-full w-[50px] bg-gradient-to-r from-[#F5F8FA00] to-white"></div>
        
                <div class="group/slider flex flex-nowrap w-max items-center">
                    <div class="logo-container animate-[slideToR_20s_linear_infinite] group-hover/slider:pause-animate flex gap-6 pl-6 items-center flex-nowrap">
                        <div class="flex flex-wrap py-5 translate-x-0 gap-[30px]">
                            @forelse ($categories as $category)
                                <a href="{{ route('front.category', $category->slug) }}" class="card flex items-center p-4 gap-3 ring-4 ring-[#DADEE4] rounded-2xl hover:ring-2 hover:ring-blue-800 transition-all duration-300">
                                    <div class="w-[70px] h-[70px] flex shrink-0">
                                        <img src="{{ Storage::url($category->icon) }}" class="object-contain" alt="{{ $category->name }}">
                                    </div>
                                    <p class="font-bold text-lg">{{ $category->name }}</p>
                                </a>
                            @empty
                                <p>No categories available.</p>
                            @endforelse            
                            @forelse ($categories as $category)
                                <a href="{{ route('front.category', $category->slug) }}" class="card flex items-center p-4 gap-3 ring-4 ring-[#DADEE4] rounded-2xl hover:ring-2 hover:ring-blue-800 transition-all duration-300">
                                    <div class=" h-[70px] flex shrink-0">
                                        <img src="{{ Storage::url($category->icon) }}" class="object-contain" alt="{{ $category->name }}">
                                    </div>
                                    <p class="font-bold text-lg">{{ $category->name }}</p>
                                </a>
                            @empty
                                <p>No categories available.</p>
                            @endforelse            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
       
    <section id="courses" class="md:w-4/5 md:p-6 p-2 mx-auto mt-20 gap-[30px] bg-[#011c40] md:rounded-[32px]">
        <h1 class="text-white text-center mx-10 font-bold text-4xl leading-relaxed">Explore Class</h1>
        <h1 class="mx-10 text-[#6D7786] text-center my-4 text-lg -tracking-[2%]">Tentukan Kelas Pilihanmu dan Mulai Belajar</h1>
        <div class="relative md:px-10 px-4 py-5">
            <button class="btn-prev bg-white rounded-full absolute rotate-180 md:-left-[52px] -left-2 z-10 top-[216px]">
                <img src="assets/icon/next.png" class='w-12 h-12' alt="icon">
            </button>
            <button class="btn-prev bg-white rounded-full absolute md:-right-[52px] -right-2 z-10 top-[216px]">
                <img src="assets/icon/next.png" class='w-12 h-12' alt="icon">
            </button>
            <div id="course-slider" class="w-full h-full">
                @forelse ($courses as $course )  
                <div class="course-card md:w-1/4 px-4 pb-8 mt-2">
                    <div class="flex flex-col bg-white rounded-[16px] overflow-hidden shadow-lg transition-all duration-300 hover:shadow-xl">
                        <a href="{{ route('front.details', $course->slug) }}" class="block relative h-[200px]">
                            <img src="{{ Storage::url($course->thumbnail) }}" class="w-full h-full object-cover" alt="thumbnail">
                        </a>
                        <div class="p-4">
                            <div class="flex items-center mb-2">
                                <span class="text-xs font-semibold text-white bg-[#1D64F2] rounded-full px-2 py-1">{{$course->category->name}}</span>
                            </div>
                            <a href="{{ route('front.details', $course->slug) }}" class="font-semibold text-lg text-gray-900 line-clamp-2 hover:line-clamp-none">
                                {{$course->name}}
                            </a>
                            <div class="mt-4">
                                <div class="h-2 bg-gray-200 rounded-full">
                                    <div class="h-2 bg-[#F24822] rounded-full" style="width: 100%;"></div>
                                </div>
                            </div>
                            <div class="flex items-center mt-4">
                                <div class="flex items-center -space-x-2">
                                    @php
                                        $students = $course->students->sortByDesc('created_at')->take(3);
                                    @endphp
                                
                                    @forelse ($students as $student)
                                        @if ($student->avatar)
                                            <img src="{{ Storage::url($student->avatar) }}" class="w-8 h-8 rounded-full border-2 border-white" alt="student">
                                        @endif
                                    @empty
                                        <span class="text-[6px] font-medium text-gray-600 pl-2">No students available</span>
                                    @endforelse
                                </div>
                                
                                
                                <div class="flex items-center gap-2 ml-auto">
                                    <div class="flex flex-col">
                                    
                                        <p class="text-xs">Teacher</p>
                                        <p class='text-sm font-semibold capitalize'>{{$course->teacher->user->name}}</p>
                                    
                                    </div>

                                        <img src="{{Storage::url($course->teacher->user->avatar)}}" alt="" class="rounded-full object-cover w-10 h-10">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty                
                <p>Belum ada data kelas terbaru</p>
                    
                @endforelse
                
            </div>
        </div>
    </section>
    <section id="Pricing" class="max-w-[1200px] mx-auto flex justify-between items-center p-[70px_100px] pl-0">
        <div class="relative">
            <div class="w-[500px] h-[700px]">
                <img src="assets/background/school.png" alt="icon">
            </div>
            <div class="absolute w-[230px] transform -translate-y-1/2 top-1/2 left-[300px] bg-white z-10 rounded-[20px] gap-4 p-4 flex flex-col shadow-[0_17px_30px_0_#0D051D0A]">
                <p class="font-semibold">Materials</p>
                <div class="flex gap-2 items-center">
                    <div>
                        <img src="assets/icon/video-play.svg" alt="icon">
                    </div>
                    <p class="font-medium">Videos</p>
                </div>
                <div class="flex gap-2 items-center">
                    <div>
                        <img src="assets/icon/note-favorite.svg" alt="icon">
                    </div>
                    <p class="font-medium">Handbook</p>
                </div>
                <div class="flex gap-2 items-center">
                    <div>
                        <img src="assets/icon/3dcube.svg" alt="icon">
                    </div>
                    <p class="font-medium">Assets</p>
                </div>
                <div class="flex gap-2 items-center">
                    <div>
                        <img src="assets/icon/award.svg" alt="icon">
                    </div>
                    <p class="font-medium">Certificates</p>
                </div>
                <div class="flex gap-2 items-center">
                    <div>
                        <img src="assets/icon/book.svg" alt="icon">
                    </div>
                    <p class="font-medium">Documentations</p>
                </div>
            </div>
        </div>
        <div class="flex flex-col text-left gap-[30px]">
            <h2 class="font-bold text-[36px] leading-[52px]">Learn From Anywhere,<br>Anytime You Want</h2>
            <p class="text-[#475466] text-lg leading-[34px]">Growing new skills would be more flexible without <br> limit we help you to access all course materials.</p>
            {{-- <a href="" class="text-white font-semibold rounded-[30px] p-[16px_32px] bg-blue-800 transition-all duration-300 hover:shadow-[0_10px_20px_0_#FF612980] w-fit">Check Pricing</a> --}}
        </div>
    </section>
    <section id="Zero-to-Success" class="max-w-[1200px] mx-auto flex flex-col py-[70px] px-[50px] gap-[30px] bg-[#011c40] rounded-[32px]">
        <div class="flex flex-col gap-[30px] items-center text-center">
            <div class="bg-blue-50 w-fit p-[8px_16px] rounded-full border border-blue-800 flex items-center gap-[6px]">
                <div>
                    <img src="assets/icon/medal-star.svg" alt="icon">
                </div>
                <p class="font-medium text-sm text-blue-800">Zero to Success People</p>
            </div>
            <div class="flex flex-col">
                <h2 class="font-bold text-[40px] leading-[60px] text-white">Happy & Success Students</h2>
                <p class="text-[#6D7786] text-lg -tracking-[2%]">Acquiring skills and new high paying career become much easier</p>
            </div>
        </div>
        <div class="testi w-full overflow-hidden flex flex-col gap-6 relative">
            <div class="fade-overlay absolute z-10 h-full w-[50px] bg-gradient-to-r from-[#] to-[#F5F8FA00]"></div>
            <div class="fade-overlay absolute right-0 z-10 h-full w-[50px] bg-gradient-to-r from-[#F5F8FA00] to-[#]"></div>

            <div class="group/slider flex flex-nowrap w-max items-center">
                <div class="logo-container animate-[slideToR_50s_linear_infinite] group-hover/slider:pause-animate flex gap-6 pl-6 items-center flex-nowrap">
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                            <img src="assets/photo/1.jpg" class="w-full h-full object-cover" alt="photo">
                        </div>
                        <p class="font-semibold">Faqih</p>
                    </div>
                    <p class="text-sm text-[#475466]">BelajarIn telah membantu saya berkembang dari nol hingga karir yang sempurna, terima kasih!</p>
                    </div>
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                <img src="assets/photo/2.jpg" class="w-full h-full object-cover" alt="photo">
                            </div>
                            <p class="font-semibold">Robi</p>
                        </div>
                        <p class="text-sm text-[#475466]">Pengalaman belajar di BelajarIn sangat memuaskan. Materinya jelas dan aplikatif!</p>
                    </div>
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                <img src="assets/photo/3.jpg" class="w-full h-full object-cover" alt="photo">
                            </div>
                            <p class="font-semibold">Ghani</p>
                        </div>
                        <p class="text-sm text-[#475466]">Saya mendapatkan keterampilan baru yang sangat berharga untuk karir saya. Terima kasih, BelajarIn!</p>
                    </div>
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                <img src="assets/photo/4.jpg" class="w-full h-full object-cover" alt="photo">
                            </div>
                            <p class="font-semibold">Shaka</p>
                        </div>
                        <p class="text-sm text-[#475466]">Metode pengajaran di BelajarIn membuat pembelajaran menjadi mudah dan menyenangkan. Sangat merekomendasikan!</p>
                    </div>
                </div>
                <div class="logo-container animate-[slideToR_50s_linear_infinite] group-hover/slider:pause-animate flex gap-6 pl-6 items-center flex-nowrap ">
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                <img src="assets/photo/5.jpg" class="w-full h-full object-cover" alt="photo">
                            </div>
                            <p class="font-semibold">Marjan</p>
                        </div>
                        <p class="text-sm text-[#475466]">BelajarIn telah membuka banyak peluang baru dalam karir saya. Pelatihan yang sangat efektif dan mendalam.</p>
                    </div>
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                <img src="assets/photo/6.jpg" class="w-full h-full object-cover" alt="photo">
                            </div>
                            <p class="font-semibold">Farid</p>
                        </div>
                        <p class="text-sm text-[#475466]">BelajarIn membantu saya meningkatkan keterampilan saya dengan cepat dan efektif. Sangat berterima kasih atas dukungan dan materi yang luar biasa!</p>
                    </div>
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                <img src="assets/photo/7.jpg" class="w-full h-full object-cover" alt="photo">
                            </div>
                            <p class="font-semibold">Satria</p>
                        </div>
                        <p class="text-sm text-[#475466]">BelajarIn memberikan pengalaman belajar yang interaktif dan menyenangkan. Saya merasa lebih percaya diri dengan keterampilan baru yang saya dapatkan dari sini.</p>
                    </div>
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 flex shrink-0 rounded-full overflow-hidden">
                                <img src="assets/photo/8.jpg" class="w-full h-full object-cover" alt="photo">
                            </div>
                            <p class="font-semibold">Mahatir</p>
                        </div>
                        <p class="text-sm text-[#475466]">BelajarIn benar-benar mengubah cara saya belajar. Kursus-kursusnya sangat bermanfaat dan mudah dipahami, membuat proses belajar jadi lebih menyenangkan!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="FAQ" class="max-w-[1200px] mx-auto flex flex-col py-[70px] px-[100px]">
        <div class="flex justify-between items-center">
            <div class="flex flex-col gap-[30px]">
                
                <div class="flex flex-col">
                    <h2 class="font-bold text-[36px] leading-[52px]">Get Your Answers</h2>
                    <p class="text-lg text-[#475466]">It’s time to upgrade skills without limits!</p>
                </div>
                <a href="" class="text-white font-semibold rounded-[30px] p-[16px_32px] bg-blue-800 transition-all duration-300 hover:shadow-[0_10px_20px_0_#FF612980] w-fit">Contact Our Sales</a>
            </div>
            <div class="flex flex-col gap-[30px] w-[552px] shrink-0">
                <div class="flex flex-col p-5 rounded-2xl bg-[#FFF8F4] has-[.hide]:bg-transparent border-t-4 border-blue-800 has-[.hide]:border-0 w-full">
                    <button class="accordion-button flex justify-between gap-1 items-center" data-accordion="accordion-faq-1">
                        <span class="font-semibold text-lg text-left">Can beginner join the course?</span>
                        <div class="arrow w-9 h-9 flex shrink-0">
                            <img src="assets/icon/add.svg" alt="icon">
                        </div>
                    </button>
                    <div id="accordion-faq-1" class="accordion-content hide">
                        <p class="leading-[30px] text-[#475466] pt-[10px]">Yes, we have provided a variety range of course from beginner to intermediate level to prepare your next big career,</p>
                    </div>
                </div>
                <div class="flex flex-col p-5 rounded-2xl bg-[#FFF8F4] has-[.hide]:bg-transparent border-t-4 border-blue-800 has-[.hide]:border-0 w-full">
                    <button class="accordion-button flex justify-between gap-1 items-center" data-accordion="accordion-faq-2">
                        <span class="font-semibold text-lg text-left">How long does the implementation take?</span>
                        <div class="arrow w-9 h-9 flex shrink-0">
                            <img src="assets/icon/add.svg" alt="icon">
                        </div>
                    </button>
                    <div id="accordion-faq-2" class="accordion-content hide">
                        <p class="leading-[30px] text-[#475466] pt-[10px]">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolore placeat ut nostrum aperiam mollitia tempora aliquam perferendis explicabo eligendi commodi.</p>
                    </div>
                </div>
                <div class="flex flex-col p-5 rounded-2xl bg-[#FFF8F4] has-[.hide]:bg-transparent border-t-4 border-blue-800 has-[.hide]:border-0 w-full">
                    <button class="accordion-button flex justify-between gap-1 items-center" data-accordion="accordion-faq-3">
                        <span class="font-semibold text-lg text-left">Do you provide the job-guarantee program?</span>
                        <div class="arrow w-9 h-9 flex shrink-0">
                            <img src="assets/icon/add.svg" alt="icon">
                        </div>
                    </button>
                    <div id="accordion-faq-3" class="accordion-content hide">
                        <p class="leading-[30px] text-[#475466] pt-[10px]">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae itaque facere ipsum animi sunt iure!</p>
                    </div>
                </div>
                <div class="flex flex-col p-5 rounded-2xl bg-[#FFF8F4] has-[.hide]:bg-transparent border-t-4 border-blue-800 has-[.hide]:border-0 w-full">
                    <button class="accordion-button flex justify-between gap-1 items-center" data-accordion="accordion-faq-4">
                        <span class="font-semibold text-lg text-left">How to issue all course certificates?</span>
                        <div class="arrow w-9 h-9 flex shrink-0">
                            <img src="assets/icon/add.svg" alt="icon">
                        </div>
                    </button>
                    <div id="accordion-faq-4" class="accordion-content hide">
                        <p class="leading-[30px] text-[#475466] pt-[10px]">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae itaque facere ipsum animi sunt iure!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="max-w-[1200px] mx-auto flex flex-col py-20 mb-10 px-[100px] gap-[50px] bg-[#011c40] text-white rounded-[32px]">
        <div class="flex justify-between">
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
            <p class="mx-auto text-sm text-center text-[#6D7786] -tracking-[2%]">All Rights Reserved BelajarIn. <br> 2024</p>
        </div>
    </footer>

    <!-- JavaScript -->
    <script
        src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous"></script>
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <script src={{asset('js/main.js')}}></script>
    
</body>
</html>