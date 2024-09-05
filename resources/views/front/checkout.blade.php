<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{asset('css/output.css')}}" rel="stylesheet">
  @vite('resources/css/app.css')
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
  <!-- CSS -->
  <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
</head>
<body class="text-black bg-[#ECF7FF] font-poppins pb-10">
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
  <div id="checkout-section" class=" md:w-1/3 mx-auto my-6 flex flex-col items-center bg-white rounded-2xl md:shadow-lg p-6">
    <div class="flex flex-col gap-5 items-center mb-6">
      <div class="gradient-badge w-fit p-[8px_16px] rounded-full border border-[#FED6AD] flex items-center gap-[6px]">
        <div>
          <img src="assets/icon/medal-star.svg" alt="icon">
        </div>
        <p class="font-medium text-sm text-[#FF6129]">Investasi UntukMu Hari Ini</p>
      </div>
      <h2 class="font-bold text-[40px] leading-[60px] text-[#333]">Pembayaran Langganan</h2>
    </div>
    <form action="{{route('front.checkout.store')}}" method="POST" enctype="multipart/form-data" class="w-full flex flex-col gap-5">
      @csrf    
      <p class="font-bold text-lg">Kirim Transaksi</p>
      <div class="flex flex-col gap-5">
        <div class="flex items-center justify-between">
          <div class="flex gap-3">
            <div class="w-6 h-6 flex shrink-0">
              <img src="assets/icon/tick-circle.svg" class="w-full h-full object-cover" alt="icon">
            </div>
            <p class="text-[#475466]">Nama Bank</p>
          </div>
          <p class="font-semibold">Bank Rakyat Indonesia</p>
          <input type="hidden" name="bankName" value="Angga Capital">
        </div>
        <div class="flex items-center justify-between">
          <div class="flex gap-3">
            <div class="w-6 h-6 flex shrink-0">
              <img src="assets/icon/tick-circle.svg" class="w-full h-full object-cover" alt="icon">
            </div>
            <p class="text-[#475466]">Nomor Akun</p>
          </div>
          <p class="font-semibold">3290282839338</p>
          <input type="hidden" name="accountNumber" value="3290282839338">
        </div>
        <div class="flex items-center justify-between">
          <div class="flex gap-3">
            <div class="w-6 h-6 flex shrink-0">
              <img src="assets/icon/tick-circle.svg" class="w-full h-full object-cover" alt="icon">
            </div>
            <p class="text-[#475466]">Nama Akun</p>
          </div>
          <p class="font-semibold">BelajarIn Edu</p>
          <input type="hidden" name="accountName" value="Alqowy Education First">
        </div>
        <div class="flex items-center justify-between">
          <div class="flex gap-3">
            <div class="w-6 h-6 flex shrink-0">
              <img src="assets/icon/tick-circle.svg" class="w-full h-full object-cover" alt="icon">
            </div>
            <p class="text-[#475466]">Jumlah Nominal</p>
          </div>
          <p class="font-semibold">Rp 100.000</p>
          <input type="hidden" name="accountName" value="Alqowy Education First">
        </div>
        <div class="flex items-center justify-between">
          <div class="flex gap-3">
            <div class="w-6 h-6 flex shrink-0">
              <img src="assets/icon/tick-circle.svg" class="w-full h-full object-cover" alt="icon">
            </div>
            <p class="text-[#475466]">Pesan Transaksi</p>
          </div>
          <p class="font-semibold">BelajarInSubs</p>
          <input type="hidden" name="swift" value="ACEFIRSTBANK">
        </div>
      </div>
      <hr>
      <p class="font-bold text-lg">Konfirmasi Pembayaranmu</p>
      <div class="relative mb-4">
        <button type="button" class="p-4 rounded-full flex gap-3 w-full ring-1 ring-black transition-all duration-300 hover:ring-2 hover:ring-[#FF6129]" onclick="document.getElementById('file').click()">
          <div class="w-6 h-6 flex shrink-0">
            <img src="assets/icon/note-add.svg" alt="icon">
          </div>
          <p id="fileLabel">Tambahkan file bukti pembayaran</p>
        </button>
        <input id="file" type="file" name="proof" class="hidden" onchange="updateFileName(this)">
      </div>
      <button class="p-[20px_32px] bg-[#FF6129] text-white rounded-full text-center font-semibold transition-all duration-300 hover:shadow-[0_10px_20px_0_#FF612980]">Saya Sudah Melakukan Pembayaran</button>
    </form>
  </div>
  
  <!-- JavaScript -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src={{asset('js/main.js')}}></script>
</body>
</html>
