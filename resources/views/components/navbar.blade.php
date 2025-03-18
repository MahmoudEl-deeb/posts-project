<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css' ,'resources/js/app'])
    <head>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    </head>
    
</head>
<body>

<div class="container mx-auto p-4">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 shadow-md rounded-b-lg p-6">
        <div class="flex h-16 justify-between">
            <div class="flex">
                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-blue-500">Dashboard</a>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <a href="{{ route('posts.index') }}" class="text-gray-700 hover:text-blue-500">Posts</a>
                </div>
            </div>

            
            @php
    use Illuminate\Support\Facades\Auth;
@endphp

@auth
    <div class="hidden sm:ms-6 sm:flex sm:items-center">
        <div class="relative ms-3" x-data="{ open: false }">
            <button 
                @click="open = !open"
                @click.away="open = false"
                type="button" 
                class="inline-flex items-center rounded-md border border-transparent bg-white px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out hover:text-gray-700 focus:outline-none"
            >
                {{ Auth::user()->name }}
                <svg class="-me-0.5 ms-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                </svg>
            </button>

            <!-- Dropdown Menu -->
            <div 
                x-show="open"
                x-transition
                class="absolute right-0 mt-2 w-48 bg-white shadow-md rounded-md z-50"
            >
                <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Profile</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="block w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-200">Log Out</button>
                </form>
            </div>
        </div>
    </div>
@endauth
        </div>
    </div>

    <div class="bg-white shadow-md rounded-b-lg p-6">
        {{ $slot }}
    </div>
</div>
</body>