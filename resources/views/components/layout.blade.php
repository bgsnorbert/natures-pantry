<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$page_title}}</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body>
    <header>
        <nav class="bg-white border-gray-200 dark:bg-gray-900">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <img src="{{ Vite::asset('resources/images/logo.png') }}" class="h-8" alt="Nature's Pantry logo" />
                    <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Nature's Pantry</span>
                </a>
                <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
                <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                    <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                        <x-nav-link href="/" :active="request()->is('/')">
                            Home
                        </x-nav-link>
                        <x-nav-link href="/about" :active="request()->is('about')">
                            About
                        </x-nav-link>
                        <x-nav-link href="/contact" :active="request()->is('contact')">
                            Contact
                        </x-nav-link>
                        <x-nav-link href="/products" :active="request()->is('products')">
                            Products
                        </x-nav-link>
                        @guest
                        <x-nav-link href="/login" :active="request()->is('login')">
                            Login
                        </x-nav-link>
                        @endguest
                        @auth
                        <form method="POST" action="/logout">
                            @csrf
                            <x-button type="submit">
                                Log out
                            </x-button>
                        </form>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main class="max-w-screen-xl mx-auto p-4">
        {{$slot}}
    </main>
    <footer></footer>
</body>

</html>