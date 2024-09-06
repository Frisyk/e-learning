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
      <div class="flex justify-between items-center p-4 ml-20">
        <h2 class="text-2xl font-bold text-gray-800">Kelola Transaksi</h2>
      </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10">
            <table class="min-w-full bg-white">
              <thead>
                <tr>
                  <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Icon</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Total Amount</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Date</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Status</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider hidden md:table-cell">Student</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Actions</th>
                </tr>
              </thead>
              <tbody>
                @forelse($transactions as $transaction)
                <tr class="bg-white border-b">
                  <td class="px-6 py-4 whitespace-nowrap">
                    <svg width="46" height="46" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path opacity="0.4" d="M19 10.2798V17.4298C18.97 20.2798 18.19 20.9998 15.22 20.9998H5.78003C2.76003 20.9998 2 20.2498 2 17.2698V10.2798C2 7.5798 2.63 6.7098 5 6.5698C5.24 6.5598 5.50003 6.5498 5.78003 6.5498H15.22C18.24 6.5498 19 7.2998 19 10.2798Z" fill="#292D32"/>
                      <path d="M22 6.73V13.72C22 16.42 21.37 17.29 19 17.43V10.28C19 7.3 18.24 6.55 15.22 6.55H5.78003C5.50003 6.55 5.24 6.56 5 6.57C5.03 3.72 5.81003 3 8.78003 3H18.22C21.24 3 22 3.75 22 6.73Z" fill="#292D32"/>
                      <path d="M6.96027 18.5601H5.24023C4.83023 18.5601 4.49023 18.2201 4.49023 17.8101C4.49023 17.4001 4.83023 17.0601 5.24023 17.0601H6.96027C7.37027 17.0601 7.71027 17.4001 7.71027 17.8101C7.71027 18.2201 7.38027 18.5601 6.96027 18.5601Z" fill="#292D32"/>
                      <path d="M12.5494 18.5601H9.10938C8.69938 18.5601 8.35938 18.2201 8.35938 17.8101C8.35938 17.4001 8.69938 17.0601 9.10938 17.0601H12.5494C12.9594 17.0601 13.2994 17.4001 13.2994 17.8101C13.2994 18.2201 12.9694 18.5601 12.5494 18.5601Z" fill="#292D32"/>
                      <path d="M19 11.8599H2V13.3599H19V11.8599Z" fill="#292D32"/>
                    </svg>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-indigo-950 text-xl font-bold">Rp {{ $transaction->total_amount }}</div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-indigo-950 text-xl font-bold">{{ $transaction->created_at }}</div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    @if ($transaction->is_paid)
                    <span class="text-sm font-bold py-2 px-3 rounded-full bg-green-500 text-white">
                      Active
                    </span>
                    @else
                    <span class="text-sm font-bold py-2 px-3 rounded-full bg-orange-500 text-white">
                      Pending
                    </span>
                    @endif
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap hidden md:table-cell">
                    <div class="text-indigo-950 text-xl font-bold">{{ $transaction->user->name }}</div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <a href="{{ route('admin.transactions.show', $transaction) }}" class="font-bold py-2 px-4 bg-indigo-700 text-white rounded-full">
                      View Details
                    </a>
                  </td>
                </tr>
                @empty
                <tr>
                  <td colspan="6" class="text-center px-6 py-4">Belum ada transaksi terbaru</td>
                </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
      

  </body>
</html>
