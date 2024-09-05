<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{asset('css/output.css')}}" rel="stylesheet">
  <title>Kategori | BelajarIn.</title>
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
            <a href="{{route('register')}}" class="text-white font-semibold rounded-[30px] md:p-[16px_32px] p-2 text-xs  p-[16px_32px] ring-1 ring-white transition-all duration-300 hover:ring-2 hover:ring-blue-800">
                Sign Up
            </a>
            <a href="{{route('login')}}" class="text-white font-semibold rounded-[30px] md:p-[16px_32px] p-2 text-xs  p-[16px_32px] bg-blue-800 transition-all duration-300 hover:shadow-[0_10px_20px_0_#FF612980]">
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


    <section id="categories" class="p-2 md:p-6 min-h-screen md:mx-12 mx-auto mb-20 mt-10 md:mt-0 gap-[30px]">
        <h1 class="text-[#011C40] text-center mx-10 font-bold text-4xl leading-relaxed">Pilih Kategori</h1>
        <h2 class="text-[#6D7786] text-lg tracking-tight text-center mb-8">Cari dan Pilih Kategori Yang Kamu Inginkan</h2>
        <div class="w-full h-full grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5">
            @forelse ($categories as $category)
                <a href="{{ route('front.category', $category->slug) }}" class="card flex flex-col items-center p-4 gap-3 bg-white rounded-[16px] shadow-lg transition-all duration-300 hover:shadow-xl ring-4 ring-[#DADEE4] hover:ring-2 hover:ring-blue-800">
                    <div class="w-[70px] h-[70px] flex shrink-0">
                        <img src="{{ Storage::url($category->icon) }}" class="object-contain" alt="{{ $category->name }}">
                    </div>
                    <p class="font-bold text-lg text-gray-900">{{ $category->name }}</p>
                </a>
            @empty
                <p class="col-span-full text-center text-gray-500 font-medium">Tidak Ada Kategori Tersedia.</p>
            @endforelse
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