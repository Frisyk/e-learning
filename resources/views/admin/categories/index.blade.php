   
    <!DOCTYPE html>
    <html lang="en">
      <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>BelajarIn Dashboard</title>
        @vite('resources/css/app.css')
    
        <script src="https://cdn.tailwindcss.com"></script>
      </head>
      <body>
        <div class="flex h-screen bg-gray-100">
          <!-- Sidebar -->
          <div class="w-64 bg-indigo-900 text-white flex flex-col">
            <div class="p-6">
              <h1 class="text-2xl font-bold mb-8">BelajarIn.</h1>
              <div class="flex items-center space-x-3 mb-8">
                <div class="w-10 h-10 bg-white rounded-full"></div>
                <span class="text-sm capitalize">Hi, {{ Auth::user()->name }}</span>
              </div>
            </div>
            <nav class="flex-grow">
              <a
                href="{{ route('dashboard') }}"
                class="block py-3 px-6 text-sm font-medium transition duration-200 hover:bg-indigo-800 {{ request()->routeIs('dashboard') ? 'bg-indigo-800' : '' }}"
              >
                Dashboard
              </a>
    
              @role('owner|teacher')
              <a
                href="{{ route('admin.courses.index') }}"
                class="block py-3 px-6 text-sm font-medium transition duration-200 hover:bg-indigo-800 {{ request()->routeIs('admin.courses.index') ? 'bg-indigo-800' : '' }}"
              >
                Kelola Kelas
              </a>
              @endrole
    
              @role('owner')
              <a
                href="{{ route('admin.transactions.index') }}"
                class="block py-3 px-6 text-sm font-medium transition duration-200 hover:bg-indigo-800 {{ request()->routeIs('admin.transactions.index') ? 'bg-indigo-800' : '' }}"
              >
                Kelola Transaksi
              </a>
              <a
                href="{{ route('admin.categories.index') }}"
                class="block py-3 px-6 text-sm font-medium transition duration-200 hover:bg-indigo-800 {{ request()->routeIs('admin.categories.index') ? 'bg-indigo-800' : '' }}"
              >
                Kelola Kategori
              </a>
              <a
                href="{{ route('admin.teachers.index') }}"
                class="block py-3 px-6 text-sm font-medium transition duration-200 hover:bg-indigo-800 {{ request()->routeIs('admin.teachers.index') ? 'bg-indigo-800' : '' }}"
              >
                Kelola Guru
              </a>
              @endrole
            </nav>
            <div class="p-6">
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button
                  type="submit"
                  class="w-full bg-red-500 text-white py-2 px-4 rounded text-sm font-medium hover:bg-red-600 transition duration-200"
                >
                  Keluar
                </button>
              </form>
            </div>
          </div>
    
<!-- Main Content -->
<div class="py-12 bg-[#ECF7FF] h-screen w-full overflow-scroll">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- Add New Button -->
        <div class="flex justify-between p-4">
          <div class="flex justify-between items-center mb-8">
            <h2 class="text-2xl font-bold text-gray-800">Kelola Kategori</h2>
          </div>
          <a href="{{ route('admin.categories.create') }}" 
             class="inline-block font-bold py-3 px-6 bg-indigo-600 hover:bg-indigo-500 text-white transition-colors duration-300 rounded-full shadow-md mb-8">
              + Tambah Kategori
          </a>
        </div>
        
        <!-- Category List -->
<!-- Category Table -->
<div class="bg-white shadow-lg rounded-lg p-8 space-y-6">
  <table class="min-w-full table-auto border-collapse border border-slate-300">
      <thead>
          <tr class="bg-gray-100">
              <th class="border px-4 py-2 text-left">No</th>
              <th class="border px-4 py-2 text-left">Icon</th>
              <th class="border px-4 py-2 text-left">Name</th>
              <th class="border px-4 py-2 text-left">Date</th>
              <th class="border px-4 py-2 text-left">Actions</th>
          </tr>
      </thead>
      <tbody class="bg-white divide-y divide-gray-200">
          @forelse($categories as $index => $category)
          <tr>
              <td class="border px-4 py-2">{{ $index + 1 }}</td>
              <td class="border px-4 py-2">
                  <img src="{{ Storage::url($category->icon) }}" alt="" 
                       class="rounded-2xl object-cover w-[50px] h-[50px]">
              </td>
              <td class="border px-4 py-2 text-indigo-900 font-semibold">{{ $category->name }}</td>
              <td class="border px-4 py-2 text-center">{{ $category->created_at->format('d M Y') }}</td>
              <td class="border px-4 py-2 flex gap-2 justify-center">
                  <a href="{{ route('admin.categories.edit', $category) }}" 
                     class="py-2 px-4 bg-green-600 hover:bg-green-500 text-white rounded-full transition-colors duration-300 shadow-md font-medium">
                      Edit
                  </a>
                  <form action="{{ route('admin.categories.destroy', $category) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" 
                              class="py-2 px-4 bg-red-600 hover:bg-red-500 text-white rounded-full transition-colors duration-300 shadow-md font-medium">
                          Hapus
                      </button>
                  </form>
              </td>
          </tr>
          @empty
          <tr>
              <td colspan="5" class="text-center text-gray-500 py-4">
                  Tidak ada data Kategori terbaru.
              </td>
          </tr>
          @endforelse
      </tbody>
  </table>
</div>
    </div>
</div>

        </div>
      </body>
    </html>
    

