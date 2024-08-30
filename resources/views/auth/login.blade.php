{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-white shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="{{asset('css/output.css')}}" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body class="bg-[#ECF7FF] ">
    
  
<div class="relative bg-[#ECF7FF] py-3 sm:max-w-sm sm:mx-auto ">
    <div class="min-h-96 px-8 py-6 md:mt-38 mt-20 text-left dark:text-white bg-[#011c40] dark:bg-gray-900 rounded-xl md:shadow-lg">
      <div class="flex flex-col justify-center items-center h-full select-none">
        <div class="flex flex-col items-center justify-center gap-2 mb-8">
          <div class="w-8 h-8 bg-gray-700 rounded-full">
            <img src="" alt="">
          </div>
          <p class="m-0 text-[16px] font-semibold dark:text-white text-white">
            Login to your Account
          </p>
          <span class="m-0 text-xs max-w-[90%] text-center text-[#8B8E98]">
            Get started with our app, just start section and enjoy the experience.
          </span>
        </div>
  
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
  
        <form method="POST" action="{{ route('login') }}" class="w-full flex flex-col gap-4">
          @csrf
          
          <!-- Email Address -->
          <div class="w-full flex flex-col gap-2">
            <label for="email" class="font-semibold text-xs text-gray-400">Email</label>
            <input id="email" type="email" name="email" placeholder="Email" class="border rounded-lg px-3 py-2 text-sm w-full outline-none dark:border-gray-500 dark:bg-gray-900" :value="old('email')" required autofocus autocomplete="username">
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
          </div>
          
          <!-- Password -->
          <div class="w-full flex flex-col gap-2">
            <label for="password" class="font-semibold text-xs text-gray-400">Password</label>
            <input id="password" type="password" name="password" placeholder="••••••••" class="border rounded-lg px-3 py-2 text-sm w-full outline-none dark:border-gray-500 dark:bg-gray-900" required autocomplete="current-password">
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
          </div>
          
          <!-- Remember Me -->
          <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
              <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-white shadow-sm focus:ring-indigo-500" name="remember">
              <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
          </div>
  
          <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
              <a href="{{ route('password.request') }}" class="underline text-sm text-white hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Forgot your password?') }}
              </a>
            @endif
          </div>
  
          <div>
            <button type="submit" class="py-1 px-8 bg-blue-500 hover:bg-blue-800 focus:ring-offset-blue-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg cursor-pointer select-none">
              {{ __('Log in') }}
            </button>
          </div>
        </form>
        
        <!-- Link to Register -->
        <div class="mt-4 text-center">
          <span class="text-sm text-white dark:text-gray-400">Don't have an account?</span>
          <a href="{{ route('register') }}" class="text-sm text-blue-500 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-600 underline">
            {{ __('Sign up') }}
          </a>
        </div>
      </div>
    </div>
  </div>
</body>
</html>

  