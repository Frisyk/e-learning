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

    <!-- Main Content -->
    <main class="flex-grow py-12 bg-[#ECF7FF] h-screen w-full overflow-scroll">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="flex justify-between items-center p-4">
          <h2 class="text-2xl font-bold text-gray-800">Kelola Kelas</h2>
          <a href="{{ route('admin.courses.create') }}" 
             class="font-bold py-3 px-6 bg-indigo-600 hover:bg-indigo-500 text-white rounded-full shadow-md transition">
            + Tambah Kelas
          </a>
        </div>

        <!-- Category List -->
        <div class="bg-white shadow-lg rounded-lg p-8">
          <table class="min-w-full border border-slate-300">
            <thead class="bg-gray-100">
              <tr>
                <th class="border px-4 py-2 text-left">No</th>
                <th class="border px-4 py-2 text-left">Course</th>
                <th class="border px-4 py-2 text-left">Category</th>
                <th class="border px-4 py-2 text-center">Students</th>
                <th class="border px-4 py-2 text-center">Videos</th>
                <th class="border px-4 py-2 text-left">Teacher</th>
                <th class="border px-4 py-2 text-center">Actions</th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              @forelse($courses as $index => $course)
              <tr>
                <td class="border px-4 py-2">{{ $index + 1 }}</td>
                <td class="border px-4 py-2 text-indigo-900 font-semibold">{{ $course->name }}</td>
                <td class="border px-4 py-2">{{ $course->category->name }}</td>
                <td class="border px-4 py-2 text-center">{{ $course->students->count() }}</td>
                <td class="border px-4 py-2 text-center">{{ $course->course_videos->count() }}</td>
                <td class="border px-4 py-2">{{ $course->teacher->user->name }}</td>
                <td class="border px-4 py-2 flex gap-2 justify-center">
                  <a href="{{ route('admin.courses.show', $course) }}" 
                     class="py-2 px-4 bg-indigo-600 hover:bg-indigo-500 text-white rounded-full transition">
                    Manage
                  </a>
                  <form action="{{ route('admin.courses.destroy', $course) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="py-2 px-4 bg-red-600 hover:bg-red-500 text-white rounded-full transition">
                      Hapus
                    </button>
                  </form>
                </td>
              </tr>
              @empty
              <tr>
                <td colspan="7" class="text-center text-gray-500 py-4">
                  Belum ada kelas yang ditambahkan
                </td>
              </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </main>
  </body>
</html>
