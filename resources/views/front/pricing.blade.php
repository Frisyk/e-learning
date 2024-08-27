<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BelajarIn</title>

    <!-- Stylesheets -->
    <link href="{{ asset('css/output.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css">
    @vite('resources/css/app.css')
</head>
<body class="font-poppins text-black pt-10 pb-12">

    <!-- Navigation -->
    <nav class="bg-slate-950 border-b border-blue-900 p-6 flex justify-between items-center">
        <a href="#" class="ml-5 text-2xl font-bold text-white">BelajarIn.</a>
        <ul class="hidden md:flex items-center gap-5 text-white">
            <li><a href="{{ route('front.index') }}" class="font-semibold">Home</a></li>
            <li><a href="{{ route('front.index') }}#courses" class="font-semibold">Courses</a></li>
            <li><a href="{{ route('front.index') }}#categories" class="font-semibold">Category</a></li>
            @role('teacher|owner')
            <li><a href="{{ route('dashboard') }}" class="font-semibold">Dashboard</a></li>
            @endrole
            <li><a href="{{ route('front.pricing') }}" class="font-semibold">Donation</a></li>
        </ul>
        @auth
        <div class="flex items-center gap-2 mr-5">
            <div class="flex flex-col items-end">
                <p class="text-white font-semibold">Hi, {{ Auth::user()->name }}</p>
                @if (Auth::user()->hasActiveSubscription())
                <p class="text-xs font-semibold text-white bg-blue-800 rounded-full py-1 px-2">PRO</p>
                @endif
            </div>
            <a href="{{ route('dashboard') }}" class="w-14 h-14 rounded-full overflow-hidden flex-shrink-0">
                <img src="{{ Storage::url(Auth::user()->avatar) }}" alt="User Avatar" class="object-cover w-full h-full">
            </a>
        </div>
        @endauth
        @guest
        <div class="flex items-center gap-2">
            <a href="{{ route('register') }}" class="text-white font-semibold rounded-full py-3 px-8 ring-1 ring-white transition duration-300 hover:ring-2 hover:ring-blue-800">Sign Up</a>
            <a href="{{ route('login') }}" class="text-white font-semibold rounded-full py-3 px-8 bg-blue-800 transition duration-300 hover:shadow-[0_10px_20px_0_#FF612980]">Sign In</a>
        </div>
        @endguest
    </nav>

    <!-- Hero Section -->
    <div id="hero-section" class="mx-auto flex flex-col gap-10 pb-12 bg-cover bg-center bg-no-repeat rounded-2xl overflow-hidden relative" style="background-image: url('assets/background/Hero-Banner.png');">
        <section class="left-1/2 top-44 transform -translate-x-1/2 w-full">
            <div class="flex flex-col items-center gap-8">

                <div class="text-center text-white">
                    <h2 class="text-4xl font-bold leading-tight">Invest & Get Bigger Return</h2>
                    <p class="text-lg tracking-tighter">Catching up the on-demand skills and high-paying career this year</p>
                </div>
                <div class="max-w-2xl flex gap-8">
                    <div class="bg-white rounded-3xl p-8 flex flex-col gap-8">
                        <div class="flex flex-col gap-4">
                            <p class="text-4xl font-semibold leading-tight">Premium</p>
                            <p class="text-lg text-[#475466]">All access to more than 20,000 online courses to grow your future career easily</p>
                        </div>
                        <div class="flex flex-col gap-1">
                            <p class="text-4xl font-semibold leading-tight">Rp 429000</p>
                            <p class="text-lg text-[#475466]">Monthly</p>
                        </div>
                        <div class="flex flex-col gap-4">
                            <div class="flex items-center gap-3">
                                <img src="assets/icon/tick-circle.svg" alt="Tick Icon" class="w-6 h-6">
                                <p class="text-[#475466]">Access all course materials including videos, docs, career guidance, etc</p>
                            </div>
                            <div class="flex items-center gap-3">
                                <img src="assets/icon/tick-circle.svg" alt="Tick Icon" class="w-6 h-6">
                                <p class="text-[#475466]">Unlock all course badges to enhance career profile to apply for a job after completion</p>
                            </div>
                            <div class="flex items-center gap-3">
                                <img src="assets/icon/tick-circle.svg" alt="Tick Icon" class="w-6 h-6">
                                <p class="text-[#475466]">Receive premium rewards such as templates</p>
                            </div>
                            <div class="flex items-center gap-3">
                                <img src="assets/icon/tick-circle.svg" alt="Tick Icon" class="w-6 h-6">
                                <p class="text-[#475466]">Access job portal and exclusive interview opportunities</p>
                            </div>
                        </div>
                        <a href="{{ route('front.checkout') }}" class="text-center text-xl font-semibold text-white bg-[#FF6129] rounded-full py-4 transition duration-300 hover:shadow-[0_10px_20px_0_#FF612980]">Subscribe Now</a>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.plyr.io/3.7.8/plyr.polyfilled.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
