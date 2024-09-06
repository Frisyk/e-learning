<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
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
            <span class="text-sm"
              >{{ Auth::user()->hasRole('owner') ? __('Owner Dashboard') :
              __('Dashboard') }}</span
            >
          </div>
        </div>
        <nav class="flex-grow">
          <a
            href="{{ route('dashboard') }}"
            class="block py-3 px-6 text-sm font-medium transition duration-200 hover:bg-indigo-800 {{ request()->routeIs('dashboard') ? 'bg-indigo-800' : '' }}"
          >
            Dashboard
          </a>
          <a
            href="{{ route('courses.index') }}"
            class="block py-3 px-6 text-sm font-medium transition duration-200 hover:bg-indigo-800 {{ request()->routeIs('courses.*') ? 'bg-indigo-800' : '' }}"
          >
            Kelas
          </a>
          <a
            href="{{ route('transactions.index') }}"
            class="block py-3 px-6 text-sm font-medium transition duration-200 hover:bg-indigo-800 {{ request()->routeIs('transactions.*') ? 'bg-indigo-800' : '' }}"
          >
            Transaksi
          </a>
          <a
            href="{{ route('categories.index') }}"
            class="block py-3 px-6 text-sm font-medium transition duration-200 hover:bg-indigo-800 {{ request()->routeIs('categories.*') ? 'bg-indigo-800' : '' }}"
          >
            Kategori
          </a>
          <a
            href="{{ route('teachers.index') }}"
            class="block py-3 px-6 text-sm font-medium transition duration-200 hover:bg-indigo-800 {{ request()->routeIs('teachers.*') ? 'bg-indigo-800' : '' }}"
          >
            Guru
          </a>
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
          <h2 class="text-2xl font-bold text-gray-800">
            {{ Auth::user()->hasRole('owner') ? __('Owner Dashboard') :
            __('Dashboard') }}
          </h2>
        </div>

        <!-- Dashboard Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-8">
          @role('owner')
          <x-dashboard-card
            title="KELAS"
            :value="$courses"
            icon-class="bg-blue-100 text-blue-500"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M12 6v6m0 0v6m0-6h6m-6 0H6"
            ></path>
          </x-dashboard-card>

          <x-dashboard-card
            title="TRANSAKSI"
            :value="$transactions"
            icon-class="bg-green-100 text-green-500"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
            ></path>
          </x-dashboard-card>

          <x-dashboard-card
            title="KATEGORI"
            :value="$categories"
            icon-class="bg-yellow-100 text-yellow-500"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M4 6h16M4 10h16M4 14h16M4 18h16"
            ></path>
          </x-dashboard-card>

          <x-dashboard-card
            title="GURU"
            :value="$teachers"
            icon-class="bg-purple-100 text-purple-500"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"
            ></path>
          </x-dashboard-card>

          <x-dashboard-card
            title="SISWA"
            :value="$students"
            icon-class="bg-red-100 text-red-500"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"
            ></path>
          </x-dashboard-card>
          @endrole @role('teacher')
          <x-dashboard-card
            title="KELAS"
            :value="$courses"
            icon-class="bg-blue-100 text-blue-500"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M12 6v6m0 0v6m0-6h6m-6 0H6"
            ></path>
          </x-dashboard-card>

          <x-dashboard-card
            title="SISWA"
            :value="$students"
            icon-class="bg-red-100 text-red-500"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"
            ></path>
          </x-dashboard-card>

          <div
            class="col-span-full md:col-span-1 flex items-center justify-center"
          >
            <a
              href="{{ route('admin.courses.create') }}"
              class="w-full md:w-fit font-bold py-4 px-6 bg-indigo-700 text-white rounded-full text-center"
            >
              Create New Course
            </a>
          </div>
          @endrole @role('student')
          <div class="col-span-full">
            <h3 class="text-indigo-950 font-bold text-2xl">
              Upgrade Skills Today
            </h3>
            <p class="text-slate-500 text-base mt-2">
              Grow your career with experienced teachers in Alqowy Class.
            </p>
            <a
              href="{{ route('front.index') }}"
              class="inline-block mt-4 font-bold py-4 px-6 bg-indigo-700 text-white rounded-full"
            >
              Explore Catalog
            </a>
          </div>
          @endrole
        </div>

        <!-- Chart (Owner only) -->
        @role('owner')
        <div class="bg-white p-6 rounded-lg shadow">
          <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold text-gray-800">Kelas</h3>
            <p class="text-sm text-gray-500">sekarang : {{ $courses }}</p>
          </div>
          <div class="h-64 bg-gray-100 flex items-end justify-between px-4">
            @foreach($coursesByMonth as $month => $count)
            <div
              class="w-12 bg-blue-500"
              style="height: {{ ($count / $maxCourses) * 100 }}%"
            ></div>
            @endforeach
          </div>
        </div>
        @endrole
      </div>
    </div>
  </body>
</html>
