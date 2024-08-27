{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link href="{{ asset('css/output.css') }}" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body class="bg-slate-200">
    
<div class="relative py-3 sm:max-w-sm sm:mx-auto">
    <div class="min-h-96 px-8 py-6 mt-40 text-left bg-[#011c40] dark:bg-gray-900 rounded-xl shadow-lg">
      <div class="flex flex-col justify-center items-center h-full select-none">
        <div class="flex flex-col items-center justify-center gap-2 mb-8">
          <div class="w-8 h-8 bg-gray-700 rounded-full">
            <img src="" alt="">
          </div>
          <p class="m-0 text-[16px] font-semibold text-white dark:text-white">
            Forgot your Password?
          </p>
          <span class="m-0 text-xs max-w-[90%] text-center text-[#8B8E98]">
            No problem. Just let us know your email address and we will email you a password reset link.
          </span>
        </div>
  
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
  
        <form method="POST" action="{{ route('password.email') }}" class="w-full flex flex-col gap-4">
          @csrf
          
          <!-- Email Address -->
          <div class="w-full flex flex-col gap-2">
            <label for="email" class="font-semibold text-xs text-gray-400">Email</label>
            <input id="email" type="email" name="email" placeholder="Email" class="border rounded-lg px-3 py-2 text-sm w-full outline-none dark:border-gray-500 dark:bg-gray-900" :value="old('email')" required autofocus>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
          </div>
  
          <div>
            <button type="submit" class="py-1 px-8 bg-blue-500 hover:bg-blue-800 focus:ring-offset-blue-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg cursor-pointer select-none">
              {{ __('Email Password Reset Link') }}
            </button>
          </div>
        </form>

        <!-- Back to Login -->
        <div class="mt-4 text-center">
          <a href="{{ route('login') }}" class="text-sm text-blue-500 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-600 underline">
            {{ __('Back to Login') }}
          </a>
        </div>
      </div>
    </div>
  </div>
</body>
</html>

