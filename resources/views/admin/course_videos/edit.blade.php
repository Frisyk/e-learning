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

              <div class="item-card flex flex-row gap-y-10 justify-between items-center">
                  <div class="flex flex-row items-center gap-x-3">
                      <img src="{{ Storage::url($courseVideo->course->thumbnail) }}" alt="" class="rounded-2xl object-cover w-[120px] h-[90px]">
                      <div class="flex flex-col">
                          <h3 class="text-indigo-950 text-xl font-bold">{{ $courseVideo->course->name }}</h3>
                          <p class="text-slate-500 text-sm">{{ $courseVideo->course->category->name }}</p>
                      </div>
                  </div>
                  <div>
                      <p class="text-slate-500 text-sm">Teacher</p>
                      <h3 class="text-indigo-950 text-xl font-bold">{{ $courseVideo->course->teacher->user->name }}</h3>
                  </div>
              </div>

              <hr class="my-5">
              
              <form method="POST" action="{{ route('admin.course_videos.update', $courseVideo) }}" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <div>
                      <x-input-label for="name" :value="__('Name')" />
                      <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $courseVideo->name }}" required autofocus autocomplete="name" />
                      <x-input-error :messages="$errors->get('name')" class="mt-2" />
                  </div>

                  <div class="mt-4">
                      <x-input-label for="path_video" :value="__('path_video')" />
                      <x-text-input id="path_video" class="block mt-1 w-full" type="text" name="path_video" value="{{ $courseVideo->path_video }}" required autofocus autocomplete="path_video" />
                      <x-input-error :messages="$errors->get('path_video')" class="mt-2" />
                  </div>

                  <div class="flex items-center justify-end mt-4">
          
                      <button type="submit" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                          Update Video
                      </button>
                  </div>
              </form>

          </div>
      </div>
  </div>
  </body>
</html>
