<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100 font-gtwalsheim-regular">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>The Gut Guardian</title>
    @vite(['resources/js/app.js'])
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
</head>
<body class="h-full">

<div class="min-h-screen flex">
    <!-- Sidebar -->
    <div class="fixed flex flex-col top-0 left-0 w-64 bg-white h-full border-r">
        <div class="flex items-center justify-center h-14 border-b">
            <div class="text-lg font-bold">The Gut Guardian</div>
        </div>
        <div class="overflow-y-auto overflow-x-hidden flex-grow">
            <ul class="flex flex-col py-4 space-y-1">
                <li class="px-5">
                    <div class="flex flex-row items-center h-8">
                        <div class="text-sm font-light tracking-wide text-gray-500">Menu</div>
                    </div>
                </li>
                
                <!-- Home Link -->
                <li>
                    <x-nav-link href="/" :active="request()->is('/')">
                        <x-slot:icon>
                          <img src="{{ asset('img/dashboard-icon.png') }}" alt="icon of a hand holding a gear" class="w-7 h-7">
                        </x-slot:icon>
                        Dashboard
                    </x-nav-link>
                </li>

                <!-- Meals Link -->
                 @auth
                <li>
                    <x-nav-link href="/meals" :active="request()->is('meals')">
                    <x-slot:icon>
                          <img src="{{ asset('img/meal-icon.png') }}" alt="icon of a hand holding a gear" class="w-7 h-7">
                        </x-slot:icon>
                        Meals
                    </x-nav-link>
                </li>

                <!-- Add Meal Link -->
                <li>
                    <x-nav-link href="/meals/create" :active="request()->is('meals/create')">
                        <x-slot:icon>
                          <img src="{{ asset('img/plus-icon.png') }}" alt="icon of a fork, plate and spoon" class="w-7 h-7">
                        </x-slot:icon>
                        Add a meal
                    </x-nav-link>
                </li>
                @endauth
                     <!-- Resources Link -->
                <li>
                    <x-nav-link href="/resources" :active="request()->is('resources')">
                        <x-slot:icon>
                          <img src="{{ asset('img/resources-icon.png') }}" alt="icon of a hand holding a gear" class="w-7 h-7">
                        </x-slot:icon>
                        Resources
                    </x-nav-link>
                </li>

                <!-- Login/Register Links -->
                @guest
                <li>
                    <x-nav-link href="/login" :active="request()->is('login')">
                    <x-slot:icon>
                          <img src="{{ asset('img/login-icon.png') }}" alt="icon of a hand holding a gear" class="w-7 h-7">
                    </x-slot:icon>
                        Log in
                    </x-nav-link>
                </li>
                <li>
                    <x-nav-link href="/register" :active="request()->is('register')">
                    <x-slot:icon>
                          <img src="{{ asset('img/register-icon.png') }}" alt="icon of a hand holding a gear" class="w-7 h-7">
                        </x-slot:icon>
                        Register
                    </x-nav-link>
                </li>
                @endguest
                
              
                <!-- Logout Link -->
                @auth
                <li class="px-5">
          <div class="flex flex-row items-center h-8">
            <div class="text-sm font-light tracking-wide text-gray-500">Settings</div>
          </div>
        </li>
        <li>
          <x-nav-link href="#">
                  <x-slot:icon>
                     <img src="{{ asset('img/profile-icon.png') }}" alt="icon of a man depicting the profile section of the website" class="w-7 h-7">
                  </x-slot:icon>
                        Profile
          </x-nav-link>
        </li>
        <li>
        <x-nav-link href="#">
                  <x-slot:icon>
                     <img src="{{ asset('img/settings-icon.png') }}" alt="a gear icon depicting the settings on the website" class="w-7 h-7">
                  </x-slot:icon>
                        Settings
          </x-nav-link>
        </li>
                <li>
                    <form method="POST" action="/logout" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-indigo-500 pr-6">
                        @csrf
                        <x-form-button class="ml-2 text-sm tracking-wide truncate">Logout</x-form-button>
                    </form>
                </li>
                @endauth
            </ul>
        </div>
    </div>

    
    <div class="ml-64 flex-grow">
        <header class="bg-white shadow">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 sm:flex sm:justify-between">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{ $heading }}</h1>
                @auth
                <x-button href="/meals/create">+ Add meal</x-button>
                @endauth
            </div>
        </header>
        
        <main>
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                {{ $slot }}
            </div>
        </main>
    </div>
</div>

</body>
</html>
