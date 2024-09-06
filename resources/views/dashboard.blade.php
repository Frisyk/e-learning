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
      <div class="flex-1 p-8 bg-blue-50">
        <div class="flex justify-between items-center mb-8">
          <h2 class="text-2xl font-bold text-gray-800">Dashboard</h2>
        </div>

        <!-- Dashboard Cards -->
        <div class="grid grid-cols-3 gap-4 mb-8">
          @role('owner')
          <div class="bg-white p-4 rounded-lg shadow flex items-center justify-between">
            <div class="flex items-center">
              <div class="bg-blue-100 p-3 rounded-full mr-4">
                <svg
                  class="w-6 h-6 text-blue-500"
                  fill="none"
                  stroke="currentColor"
                  viewBox="0 0 24 24"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"
                  ></path>
                </svg>
              </div>
              <div>
                <p class="text-sm font-medium text-gray-500">Kelas</p>
                <p class="text-xl font-bold text-gray-800">{{ $courses }}</p>
              </div>
            </div>
          </div>
          <div class="bg-white p-4 rounded-lg shadow flex items-center justify-between">
            <div class="flex items-center">
              <div class="bg-green-100 p-3 rounded-full mr-4">
                <svg
                  class="w-6 h-6 text-green-500"
                  fill="none"
                  stroke="currentColor"
                  viewBox="0 0 24 24"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                  ></path>
                </svg>
              </div>
              <div>
                <p class="text-sm font-medium text-gray-500">Transaksi</p>
                <p class="text-xl font-bold text-gray-800">{{ $transactions }}</p>
              </div>
            </div>
          </div>
          <div class="bg-white p-4 rounded-lg shadow flex items-center justify-between">
            <div class="flex items-center">
              <div class="bg-yellow-100 p-3 rounded-full mr-4">
                <svg
                  class="w-6 h-6 text-yellow-500"
                  fill="none"
                  stroke="currentColor"
                  viewBox="0 0 24 24"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M4 6h16M4 10h16M4 14h16M4 18h16"
                  ></path>
                </svg>
              </div>
              <div>
                <p class="text-sm font-medium text-gray-500">Kategori</p>
                <p class="text-xl font-bold text-gray-800">{{ $categories }}</p>
              </div>
            </div>
          </div>
          <div class="bg-white p-4 rounded-lg shadow flex items-center justify-between">
            <div class="flex items-center">
              <div class="bg-purple-100 p-3 rounded-full mr-4">
                <svg
                  class="w-6 h-6 text-purple-500"
                  fill="none"
                  stroke="currentColor"
                  viewBox="0 0 24 24"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"
                  ></path>
                </svg>
              </div>
              <div>
                <p class="text-sm font-medium text-gray-500">Guru</p>
                <p class="text-xl font-bold text-gray-800">{{ $teachers }}</p>
              </div>
            </div>
          </div>
          <div class="bg-white p-4 rounded-lg shadow flex items-center justify-between">
            <div class="flex items-center">
              <div class="bg-red-100 p-3 rounded-full mr-4">
                <svg
                  class="w-6 h-6 text-red-500"
                  fill="none"
                  stroke="currentColor"
                  viewBox="0 0 24 24"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857M7 16V4m10 0v12M12 4v4m0 0v4"
                  ></path>
                </svg>
              </div>
              <div>
                <p class="text-sm font-medium text-gray-500">Pengguna</p>
                <p class="text-xl font-bold text-gray-800">{{ $students }}</p>
              </div>
            </div>
          </div>
          @endrole
          @role('teacher')
          <div class="bg-white p-4 rounded-lg shadow flex items-center justify-between">
            <div class="flex items-center">
              <div class="bg-blue-100 p-3 rounded-full mr-4">
                <svg
                  class="w-6 h-6 text-blue-500"
                  fill="none"
                  stroke="currentColor"
                  viewBox="0 0 24 24"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"
                  ></path>
                </svg>
              </div>
              <div>
                <p class="text-sm font-medium text-gray-500">Kelas</p>
                <p class="text-xl font-bold text-gray-800">{{ $courses }}</p>
              </div>
            </div>
          </div>
                    <div class="bg-white p-4 rounded-lg shadow flex items-center justify-between">
            <div class="flex items-center">
              <div class="bg-red-100 p-3 rounded-full mr-4">
                <svg
                  class="w-6 h-6 text-red-500"
                  fill="none"
                  stroke="currentColor"
                  viewBox="0 0 24 24"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857M7 16V4m10 0v12M12 4v4m0 0v4"
                  ></path>
                </svg>
              </div>
              <div>
                <p class="text-sm font-medium text-gray-500">Pengguna</p>
                <p class="text-xl font-bold text-gray-800">{{ $students }}</p>
              </div>
            </div>
          </div>
          @endrole
          @role('student')
          <h3 class="text-indigo-950 font-bold text-2xl">Upgrade Skills Today</h3>
          <p class="text-slate-500 text-base">
              Grow your career with experienced teachers in Alqowy Class.
          </p>
          <a href="{{route('front.index')}}" class="w-fit font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
              Explore Catalog
          </a>
          @endrole
        </div>
      </div>
    </div>
  </body>
</html>
