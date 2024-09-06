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
            <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10 space-y-5">
                    <div class="item-card flex flex-col lg:flex-row justify-between items-center space-y-5 lg:space-y-0 lg:space-x-10">
                        <div class="flex items-center space-x-3">
                            <img src="{{ Storage::url($course->thumbnail) }}" alt="Course Thumbnail" class="rounded-2xl object-cover w-[200px] h-[150px]">
                            <div>
                                <h3 class="text-indigo-950 text-xl font-bold">{{ $course->name }}</h3>
                                <p class="text-slate-500 text-sm">{{ $course->category->name }}</p>
                            </div>
                        </div>
                        <div class="text-center">
                            <p class="text-slate-500 text-sm">Students</p>
                            <h3 class="text-indigo-950 text-xl font-bold">{{ $course->students->count() }}</h3>
                        </div>
                        <div class="flex items-center space-x-3">
                            <a href="{{ route('admin.courses.edit', $course) }}" class="font-bold py-3 px-5 bg-indigo-700 text-white rounded-full">
                                Edit Course
                            </a>
                            <form action="#" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="font-bold py-3 px-5 bg-red-700 text-white rounded-full">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
        
                    <hr class="my-5">
        
                    <div class="flex flex-col lg:flex-row justify-between items-center">
                        <div>
                            <h3 class="text-indigo-950 text-xl font-bold">Course Videos</h3>
                            <p class="text-slate-500 text-sm">{{ $course->course_videos->count() }} Total Videos</p>
                        </div>
                        <a href="{{ route('admin.course.add_video', $course->id) }}" class="font-bold py-3 px-5 bg-indigo-700 text-white rounded-full">
                            Add New Video
                        </a>
                    </div>
        
                    @forelse($course->course_videos as $video)
                        <div class="item-card flex flex-col lg:flex-row justify-between items-center space-y-5 lg:space-y-0 lg:space-x-10">
                            <div class="flex items-center space-x-3">
                                <iframe class="rounded-2xl object-cover w-[120px] h-[90px]" src="https://www.youtube.com/embed/{{ $video->path_video }}" title="YouTube video player" frameborder="0" allowfullscreen></iframe>
                                <div>
                                    <h3 class="text-indigo-950 text-xl font-bold">{{ $video->name }}</h3>
                                    <p class="text-slate-500 text-sm">{{ $video->course->name }}</p>
                                </div>
                            </div>
                            <div class="flex items-center space-x-3">
                                <a href="{{ route('admin.course_videos.edit', $video) }}" class="font-bold py-3 px-5 bg-indigo-700 text-white rounded-full">
                                    Edit Video
                                </a>
                                <form action="{{ route('admin.course_videos.destroy', $video) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="font-bold py-3 px-5 bg-red-700 text-white rounded-full" aria-label="Delete Video">
                                        <svg width="24" height="24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M21.07 5.23C19.46 5.07 17.85 4.95 16.23 4.86V4.85L16.01 3.55C15.86 2.63 15.64 1.25 13.3 1.25H10.68C8.35 1.25 8.13 2.57 7.97 3.54L7.76 4.82C6.83 4.88 5.9 4.94 4.97 5.03L2.93 5.23C2.51 5.27 2.21 5.64 2.25 6.05C2.29 6.46 2.65 6.76 3.07 6.72L5.11 6.52C10.35 6 15.63 6.2 20.93 6.73C20.96 6.73 20.98 6.73 21.01 6.73C21.39 6.73 21.72 6.44 21.76 6.05C21.79 5.64 21.49 5.27 21.07 5.23Z" fill="white"/>
                                            <path d="M19.23 8.14C18.99 7.89 18.66 7.75 18.32 7.75H5.68C5.34 7.75 5 7.89 4.77 8.14C4.54 8.39 4.41 8.73 4.43 9.08L5.05 19.34C5.16 20.86 5.3 22.76 8.79 22.76H15.21C18.7 22.76 18.84 20.87 18.95 19.34L19.57 9.09C19.59 8.73 19.46 8.39 19.23 8.14ZM13.66 17.75H10.33C9.92 17.75 9.58 17.41 9.58 17C9.58 16.59 9.92 16.25 10.33 16.25H13.66C14.07 16.25 14.41 16.59 14.41 17C14.41 17.41 14.07 17.75 13.66 17.75ZM14.5 13.75H9.5C9.09 13.75 8.75 13.41 8.75 13C8.75 12.59 9.09 12.25 9.5 12.25H14.5C14.91 12.25 15.25 12.59 15.25 13C15.25 13.41 14.91 13.75 14.5 13.75Z" fill="white"/>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <p class="text-slate-500">No videos available.</p>
                    @endforelse
                </div>
            </div>
        </div>
        
      </body>
    </html>
