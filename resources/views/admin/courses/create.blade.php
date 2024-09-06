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

    <div class="py-12 bg-[#ECF7FF] w-full h-screen overflow-scroll">
      <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden p-10 shadow-sm sm:rounded-lg">

              @if($errors->any())
                  @foreach($errors->all() as $error)
                      <div class="py-3 w-full rounded-3xl bg-red-500 text-white">
                          {{$error}}
                      </div>
                  @endforeach
              @endif
              
              <form method="POST" action="{{ route('admin.courses.store') }}" enctype="multipart/form-data">
                  @csrf

                  <div>
                      <x-input-label for="name" :value="__('Name')" />
                      <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                      <x-input-error :messages="$errors->get('name')" class="mt-2" />
                  </div>

                  <div class="mt-4">
                      <x-input-label for="thumbnail" :value="__('thumbnail')" />
                      <x-text-input id="thumbnail" class="block mt-1 w-full" type="file" name="thumbnail" required autofocus autocomplete="thumbnail" />
                      <x-input-error :messages="$errors->get('thumbnail')" class="mt-2" />
                  </div>

                  <div class="mt-4">
                      <x-input-label for="path_trailer" :value="__('path_trailer')" />
                      <x-text-input id="path_trailer" class="block mt-1 w-full" type="text" name="path_trailer" required autofocus autocomplete="path_trailer" />
                      <x-input-error :messages="$errors->get('path_trailer')" class="mt-2" />
                  </div>

                  <div class="mt-4">
                      <x-input-label for="category" :value="__('category')" />
                      
                      <select name="category_id" id="category_id" class="py-3 rounded-lg pl-3 w-full border border-slate-300">
                          <option value="">Choose category</option>
                          @forelse($categories as $category)
                              <option value="{{$category->id}}">{{$category->name}}</option>
                          @empty
                          @endforelse
                      </select>

                      <x-input-error :messages="$errors->get('category')" class="mt-2" />
                  </div>

                  <div class="mt-4">
                      <x-input-label for="about" :value="__('about')" />
                      <textarea name="about" id="about" cols="30" rows="5" class="border border-slate-300 rounded-xl w-full"></textarea>
                      <x-input-error :messages="$errors->get('about')" class="mt-2" />
                  </div>

                  <hr class="my-5">

                  <div class="mt-4">
                      
                      <div class="flex flex-col gap-y-5">
                          <x-input-label for="keypoints" :value="__('keypoints')" />
                          @for ($i = 0; $i < 4; $i++)
                              <input type="text" class="py-3 rounded-lg border-slate-300 border" placeholder="Write your copywriting" name="course_keypoints[]">
                          @endfor
                      </div>
                      <x-input-error :messages="$errors->get('keypoints')" class="mt-2" />
                  </div>

                  <div class="flex items-center justify-end mt-4">
          
                      <button type="submit" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                          Add New Course
                      </button>
                  </div>
              </form>

          </div>
      </div>
  </div>
  </body>
</html>
