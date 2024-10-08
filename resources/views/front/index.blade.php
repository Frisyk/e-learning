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
    <style>
        @keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-text {
    opacity: 0;
    animation: fadeInUp 1s ease forwards;
    animation-delay: 0.3s;
}

.animate-button {
    opacity: 0;
    animation: fadeInUp 1s ease forwards;
    animation-delay: 0.5s;
}

    </style>
</head>
<body class="text-black bg-[#ECF7FF] font-poppins scroll-smooth">
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

<section id="hero-section" class="bg-[#011c40] flex-col md:flex-row flex w-full">
    <div class="text flex flex-col gap-10 flex-1 p-6 md:pl-20 md:py-40">
        <h1 class="animate-text md:text-7xl text-5xl font-bold leading-normal text-white">
            Temukan, Mulai, <br> dan Tekuni
        </h1>
        <p class="animate-text text-xl leading-relaxed text-slate-300">
            "Jika kamu tidak sanggup menahan lelahnya belajar maka kamu harus sanggup menahan perihnya kebodohan" - Imam Syafi'i
        </p>
        <a href="#courses">
            <button class="animate-button text-xl font-semibold w-fit text-white p-6 px-10 rounded-full bg-blue-800 hover:shadow-[0_10px_20px_0_#FF612980]">
                ➡️Mulai Belajar
            </button>
        </a>
    </div>
    <img src="assets/background/hero.png" class="md:w-1/2 bottom-0 md:mt-40" alt="hero banner">
</section>
<section id="categories" class=" mx-auto flex flex-col py-[70px] md:px-[50px] gap-[30px] ">
    <div class="flex flex-col gap-[30px] items-center text-center">
        
        <div class="flex flex-col">
            <h2 class="font-bold text-[40px] leading-[60px]">Pilih Kategori</h2>
            <p class="text-[#6D7786] text-lg -tracking-[2%]">Cari dan Pilih Kategori Yang Kamu Inginkan</p>
        </div>
    </div>
    <div class="testi w-full overflow-hidden flex flex-col gap-6 relative">
        <div class="fade-overlay absolute z-10 h-full w-[50px] bg-gradient-to-r from-[#ECF7FF] to-[#ECF7FF00]"></div>
        <div class="fade-overlay absolute right-0 z-10 h-full w-[50px] bg-gradient-to-r from-[#ECF7FF00] to-[#ECF7FF]"></div>

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
                        <p>Tidak Ada Kategori Tersedia.</p>
                    @endforelse            
                    @forelse ($categories as $category)
                        <a href="{{ route('front.category', $category->slug) }}" class="card flex items-center p-4 gap-3 ring-4 ring-[#DADEE4] rounded-2xl hover:ring-2 hover:ring-blue-800 transition-all duration-300">
                            <div class=" h-[70px] flex shrink-0">
                                <img src="{{ Storage::url($category->icon) }}" class="object-contain" alt="{{ $category->name }}">
                            </div>
                            <p class="font-bold text-lg">{{ $category->name }}</p>
                        </a>
                    @empty
                        <p>Tidak Ada Kategori Tersedia.</p>
                    @endforelse            
                </div>
            </div>
        </div>
    </div>
</section>

       
    <section id="courses" class="md:w-4/5 md:p-6 py-5 p-2 mx-auto mt-20 gap-[30px] bg-[#011c40] md:rounded-[32px]">
        <div class="flex gap-2 items-center justify-center">
            <img src="assets/icon/medal-star.svg" class="w-10 h-10" alt="icon">
            <h1 class="text-white font-bold text-4xl leading-relaxed">Kelas Terpopuler</h1>
        </div>
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
                                        <span class="text-[6px] font-medium text-gray-600 pl-2">Belum ada siswa</span>
                                    @endforelse
                                </div>
                                
                                
                                <div class="flex items-center gap-2 ml-auto">
                                    <div class="flex flex-col">
                                    
                                        <p class="text-xs">Guru</p>
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
<section id="Pricing" class="md:max-w-[1200px] mx-auto flex flex-col md:flex-row justify-between items-center p-8 mb-10 md:p-[70px_100px]">
    <div class="relative mb-8 md:mb-0">
        <div class="w-full md:w-[500px] md:h-[700px]">
            <img src="assets/background/school.png" alt="icon" class="w-full h-full object-cover">
        </div>
        <div class="absolute hidden md:flex transform -translate-y-1/2 top-1/2 left-1/2 md:left-[300px] bg-white z-10 rounded-2xl p-4 flex-col gap-4 shadow-lg w-[90%] max-w-[230px]">
            <p class="font-semibold text-lg">Materials</p>
            <div class="flex items-center gap-2">
                <img src="assets/icon/video-play.svg" alt="icon" class="w-6 h-6">
                <p class="font-medium">Videos</p>
            </div>
            <div class="flex items-center gap-2">
                <img src="assets/icon/note-favorite.svg" alt="icon" class="w-6 h-6">
                <p class="font-medium">Handbook</p>
            </div>
            <div class="flex items-center gap-2">
                <img src="assets/icon/3dcube.svg" alt="icon" class="w-6 h-6">
                <p class="font-medium">Assets</p>
            </div>
            <div class="flex items-center gap-2">
                <img src="assets/icon/award.svg" alt="icon" class="w-6 h-6">
                <p class="font-medium">Certificates</p>
            </div>
            <div class="flex items-center gap-2">
                <img src="assets/icon/book.svg" alt="icon" class="w-6 h-6">
                <p class="font-medium">Documentations</p>
            </div>
        </div>
    </div>
    <div class="flex flex-col text-left md:ml-10 gap-4 md:gap-8">
        <h2 class="font-bold text-[32px] md:text-[36px] leading-snug md:leading-[52px]">Belajar Dimana Saja,<br>Dan Kapan Saja Kamu Mau</h2>
        <p class="text-[#475466] text-base md:text-lg leading-relaxed md:leading-[34px]">Mengembangkan keterampilan baru akan lebih fleksibel tanpa kami membantu Anda untuk mengakses semua materi kursus.</p>
        {{-- <a href="" class="text-white font-semibold rounded-full py-4 px-8 bg-blue-800 transition-all duration-300 hover:shadow-lg w-fit">Check Pricing</a> --}}
    </div>
</section>

    <section id="Zero-to-Success" class="max-w-[1200px] mx-auto flex flex-col py-[70px] px-5 md:px-[50px] gap-[30px] bg-[#011c40] md:rounded-[32px]">
        <div class="flex flex-col gap-[30px] items-center text-center">
            <div class="bg-blue-50 w-fit p-[8px_16px] rounded-full border border-blue-800 flex items-center gap-[6px]">
                <div>
                    <img src="assets/icon/medal-star.svg" alt="icon">
                </div>
                <p class="font-medium text-sm text-blue-800">Cerita Sukses</p>
            </div>
            <div class="flex flex-col">
                <h2 class="font-bold text-[40px] leading-[60px] text-white">Siswa yang Bahagia & Sukses</h2>
                <p class="text-[#6D7786] text-lg -tracking-[2%]">Memperoleh keterampilan dan karier baru dengan bayaran tinggi menjadi lebih mudah</p>
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
    <section id="FAQ" class="md:max-w-[1200px] px-5 mx-auto flex flex-col py-[70px] md:px-[100px]">
        <div class="flex flex-col md:flex-row justify-between items-center">
            <div class="flex flex-col gap-[30px]">
                
                <div class="flex flex-col">
                    <h2 class="font-bold text-[36px] leading-[52px]">Dapatkan Jawaban Anda</h2>
                    <p class="text-lg text-[#475466]">Saatnya meningkatkan keterampilan tanpa batas!</p>
                </div>
                <a href="" class="text-white font-semibold rounded-[30px] md:p-[16px_32px] p-2 text-xs  bg-blue-800 transition-all duration-300 hover:shadow-[0_10px_20px_0_#FF612980] w-fit">Hubungi Kami</a>
            </div>
            <div class="flex flex-col gap-[30px] md:w-[552px] shrink-0">
                <div class="flex flex-col p-5 rounded-2xl bg-[#FFF8F4] has-[.hide]:bg-transparent border-t-4 border-blue-800 has-[.hide]:border-0 w-full">
                    <button class="accordion-button flex justify-between gap-1 items-center" data-accordion="accordion-faq-1">
                        <span class="font-semibold text-lg text-left">Apakah pemula bisa mengikuti kursus ini?</span>
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
                        <span class="font-semibold text-lg text-left">Berapa lama waktu yang dibutuhkan untuk implementasi?</span>
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
                        <span class="font-semibold text-lg text-left">Apakah Anda menyediakan program jaminan pekerjaan?</span>
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
                        <span class="font-semibold text-lg text-left">Bagaimana cara menerbitkan semua sertifikat kursus?</span>
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
        crossorigin="anonymous"></script>
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <script src={{asset('js/main.js')}}></script>
    <script>
        window.addEventListener('scroll', function() {
    const section = document.getElementById('hero-section');
    const sectionPosition = section.getBoundingClientRect().top;
    const screenPosition = window.innerHeight / 1.2;

    if (sectionPosition < screenPosition) {
        const texts = section.querySelectorAll('.animate-text');
        texts.forEach((text, index) => {
            text.style.animationDelay = `${index * 0.2}s`;
            text.classList.add('visible');
        });
        const button = section.querySelector('.animate-button');
        button.classList.add('visible');
    }
});

    </script>
</body>
</html>