<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BelajarIn Dashboard</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <body class="bg-gray-100 h-screen flex">
    <!-- Sidebar -->
    <aside class="w-64 bg-indigo-900 text-white flex flex-col">
      <div class="p-6">
        <h1 class="text-2xl font-bold mb-8">BelajarIn.</h1>
        <div class="flex items-center space-x-3 mb-8">
          <div class="w-10 h-10 bg-white rounded-full"></div>
          <span class="text-sm capitalize">Hi, {{ Auth::user()->name }}</span>
        </div>
      </div>
      <nav class="flex-grow">
        <a href="{{ route('dashboard') }}" 
           class="block py-3 px-6 text-sm font-medium transition hover:bg-indigo-800 {{ request()->routeIs('dashboard') ? 'bg-indigo-800' : '' }}">
          Dashboard
        </a>
        @role('owner|teacher')
        <a href="{{ route('admin.courses.index') }}" 
           class="block py-3 px-6 text-sm font-medium transition hover:bg-indigo-800 {{ request()->routeIs('admin.courses.index') ? 'bg-indigo-800' : '' }}">
          Kelola Kelas
        </a>
        @endrole
        @role('owner')
        <a href="{{ route('admin.transactions.index') }}" 
           class="block py-3 px-6 text-sm font-medium transition hover:bg-indigo-800 {{ request()->routeIs('admin.transactions.index') ? 'bg-indigo-800' : '' }}">
          Kelola Transaksi
        </a>
        <a href="{{ route('admin.categories.index') }}" 
           class="block py-3 px-6 text-sm font-medium transition hover:bg-indigo-800 {{ request()->routeIs('admin.categories.index') ? 'bg-indigo-800' : '' }}">
          Kelola Kategori
        </a>
        <a href="{{ route('admin.teachers.index') }}" 
           class="block py-3 px-6 text-sm font-medium transition hover:bg-indigo-800 {{ request()->routeIs('admin.teachers.index') ? 'bg-indigo-800' : '' }}">
          Kelola Guru
        </a>
        @endrole
      </nav>
      <div class="p-6">
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" 
                  class="w-full bg-red-500 py-2 px-4 rounded text-sm font-medium transition hover:bg-red-600">
            Keluar
          </button>
        </form>
      </div>
    </aside>

    <div class="py-12 bg-[#ECF7FF] w-full">
      <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden p-10 shadow-sm sm:rounded-lg">

              @if($errors->any())
                  @foreach($errors->all() as $error)
                      <div class="py-3 w-full rounded-3xl bg-red-500 text-white">
                          {{$error}}
                      </div>
                  @endforeach
              @endif
              
              <form method="POST" action="{{ route('admin.teachers.store') }}" enctype="multipart/form-data">
                  @csrf

                  <div>
                      <x-input-label for="email" :value="__('email')" />
                      <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="email" />
                      <x-input-error :messages="$errors->get('email')" class="mt-2" />
                  </div>

                  <div class="flex items-center justify-end mt-4">
          
                      <button type="submit" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                          Tambahkan Guru Baru
                      </button>
                  </div>
              </form>

          </div>
      </div>
  </div>
  </body>
</html>
