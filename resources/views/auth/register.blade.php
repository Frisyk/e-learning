{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        
        <!-- occupation Address -->
        <div class="mt-4">
            <x-input-label for="occupation" :value="__('Occupation')" />
            <x-text-input id="occupation" class="block mt-1 w-full" type="text" name="occupation" :value="old('occupation')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('occupation')" class="mt-2" />
        </div>

        <!-- avatar Address -->
        <div class="mt-4">
            <x-input-label for="avatar" :value="__('Avatar')" />
            <x-text-input id="avatar" class="block mt-1 w-full" type="file" name="avatar" :value="old('avatar')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('avatar')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link href="{{asset('css/output.css')}}" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body>
    <div class="relative py-3 sm:max-w-xs sm:mx-auto">
        <div class="min-h-96 px-8 py-6 mt-4 text-left bg-white dark:bg-gray-900 rounded-xl shadow-lg">
          <div class="flex flex-col justify-center items-center h-full select-none">
            <div class="flex flex-col items-center justify-center gap-2 mb-8">
              <div class="w-8 h-8 bg-gray-700 rounded-full"></div>
              <p class="m-0 text-[16px] font-semibold dark:text-white">
                Register your Account
              </p>
              <span class="m-0 text-xs max-w-[90%] text-center text-[#8B8E98]">
                Join our app and start enjoying the experience.
              </span>
            </div>
      
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />
      
            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" class="w-full flex flex-col gap-4">
              @csrf
              
              <!-- Name -->
              <div class="w-full flex flex-col gap-2">
                <label for="name" class="font-semibold text-xs text-gray-400">Name</label>
                <input id="name" type="text" name="name" placeholder="Name" class="border rounded-lg px-3 py-2 text-sm w-full outline-none dark:border-gray-500 dark:bg-gray-900" :value="old('name')" required autofocus autocomplete="name">
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
              </div>
    
              <!-- Email Address -->
              <div class="w-full flex flex-col gap-2">
                <label for="email" class="font-semibold text-xs text-gray-400">Email</label>
                <input id="email" type="email" name="email" placeholder="Email" class="border rounded-lg px-3 py-2 text-sm w-full outline-none dark:border-gray-500 dark:bg-gray-900" :value="old('email')" required autocomplete="username">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
              </div>
    
              <!-- Occupation -->
              <div class="w-full flex flex-col gap-2">
                <label for="occupation" class="font-semibold text-xs text-gray-400">Occupation</label>
                <input id="occupation" type="text" name="occupation" placeholder="Occupation" class="border rounded-lg px-3 py-2 text-sm w-full outline-none dark:border-gray-500 dark:bg-gray-900" :value="old('occupation')" required autocomplete="occupation">
                <x-input-error :messages="$errors->get('occupation')" class="mt-2" />
              </div>
    
              <!-- Avatar -->
              <div class="w-full flex flex-col gap-2">
                <label for="avatar" class="font-semibold text-xs text-gray-400">Avatar</label>
                <input id="avatar" type="file" name="avatar" class="border rounded-lg px-3 py-2 text-sm w-full outline-none dark:border-gray-500 dark:bg-gray-900" :value="old('avatar')" required autocomplete="avatar">
                <x-input-error :messages="$errors->get('avatar')" class="mt-2" />
              </div>
              
              <!-- Password -->
              <div class="w-full flex flex-col gap-2">
                <label for="password" class="font-semibold text-xs text-gray-400">Password</label>
                <input id="password" type="password" name="password" placeholder="••••••••" class="border rounded-lg px-3 py-2 text-sm w-full outline-none dark:border-gray-500 dark:bg-gray-900" required autocomplete="new-password">
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
              </div>
    
              <!-- Confirm Password -->
              <div class="w-full flex flex-col gap-2">
                <label for="password_confirmation" class="font-semibold text-xs text-gray-400">Confirm Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" placeholder="••••••••" class="border rounded-lg px-3 py-2 text-sm w-full outline-none dark:border-gray-500 dark:bg-gray-900" required autocomplete="new-password">
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
              </div>
      
              <div class="flex items-center justify-end mt-4">
                <a href="{{ route('login') }}" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                  {{ __('Already registered?') }}
                </a>
              </div>
      
              <div>
                <button type="submit" class="py-1 px-8 bg-blue-500 hover:bg-blue-800 focus:ring-offset-blue-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg cursor-pointer select-none">
                  {{ __('Register') }}
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    
</body>
</html>