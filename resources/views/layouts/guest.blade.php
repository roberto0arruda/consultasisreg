<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <style>
        .gradient {
            background: linear-gradient(90deg, #42E695 0%, #3BB2B8 100%);
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="leading-normal tracking-normal text-white gradient">
<!-- Nav -->
<nav id="header" class="fixed w-full z-30 top-0 text-white">
    <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 py-2">
        <div class="pl-4 flex items-center">
            <a class="toggleColour flex items-center text-indigo-400 no-underline hover:no-underline font-bold text-2xl lg:text-4xl"
               href="{{ route('home') }}">
                Consulta<span
                    class="bg-clip-text text-transparent bg-gradient-to-r from-green-400 via-pink-500 to-purple-500">SisReg</span>
            </a>
        </div>

        <!-- Hamburger -->
        <div class="block lg:hidden pr-4">
            <button id="nav-toggle"
                    class="flex items-center p-1 text-pink-800 hover:text-green-900 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                <svg class="fill-current h-6 w-6" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <title>Menu</title>
                    <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/>
                </svg>
            </button>
        </div>

        <div id="nav-content"
             class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden mt-2 lg:mt-0 bg-white lg:bg-transparent text-black p-4 lg:p-0 z-20">
            <ul class="list-reset lg:flex justify-end flex-1 items-center">

            </ul>

            @if (Route::has('login'))
                @auth
                    <a href="{{ route('dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">
                        <button id="navAction"
                                class="mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full mt-4 lg:mt-0 py-4 px-8 shadow opacity-75 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                            {{ __('Dashboard') }}
                        </button>
                    </a>
                @else
                    <a href="{{ route('login') }}">
                        <button
                            class="mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full mt-4 lg:mt-0 py-4 px-8 shadow opacity-75 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                            {{ __('Log in') }}
                        </button>
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                           class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">
                            <button id="navAction"
                                    class="mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full mt-4 lg:mt-0 py-4 px-8 shadow opacity-75 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                                {{ __('Register') }}
                            </button>
                        </a>
                    @endif
                @endauth
            @endif
        </div>
    </div>

    <hr class="border-b border-gray-100 opacity-25 my-0 py-0"/>
</nav>

<!-- Page Content -->
<main class="font-sans text-gray-900 antialiased">
    {{ $slot }}
</main>

<!--Footer-->
<footer class="bg-white">
    <div class="container mx-auto px-8">
        <div class="w-full flex flex-col md:flex-row py-6">
            <div class="flex-1 mb-6 text-black">
                <a href="{{ route('home') }}">
                    {{--                            <x-web-logo class="text-green-600 no-underline hover:no-underline font-bold text-2xl lg:text-4xl"/>--}}
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500"/>
                </a>
            </div>

            <div class="flex-1">
                <p class="uppercase text-gray-500 md:mb-6">Links</p>
                <ul class="list-reset mb-6">
                    <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                        <a href="#" class="no-underline hover:underline text-gray-800 hover:text-green-500">FAQ</a>
                    </li>
                    <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                        <a href="#" class="no-underline hover:underline text-gray-800 hover:text-green-500">Help</a>
                    </li>
                    <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                        <a href="#" class="no-underline hover:underline text-gray-800 hover:text-green-500">Support</a>
                    </li>
                </ul>
            </div>

            <div class="flex-1">
                <p class="uppercase text-gray-500 md:mb-6">Legal</p>
                <ul class="list-reset mb-6">
                    <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                        <a href="#" class="no-underline hover:underline text-gray-800 hover:text-green-500">Terms</a>
                    </li>
                    <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                        <a href="#" class="no-underline hover:underline text-gray-800 hover:text-green-500">Privacy</a>
                    </li>
                </ul>
            </div>

            <div class="flex-1">
                <p class="uppercase text-gray-500 md:mb-6">Social</p>
                <ul class="list-reset mb-6">
                    <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                        <a href="https://www.facebook.com/ardigital.online"
                           class="no-underline hover:underline text-gray-800 hover:text-green-500">Facebook</a>
                    </li>
                    <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                        <a href="#" class="no-underline hover:underline text-gray-800 hover:text-green-500">Linkedin</a>
                    </li>
                    <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                        <a href="#" class="no-underline hover:underline text-gray-800 hover:text-green-500">Twitter</a>
                    </li>
                </ul>
            </div>

            <div class="flex-1">
                <p class="uppercase text-gray-500 md:mb-6">Company</p>
                <ul class="list-reset mb-6">
                    <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                        <a href="#" class="no-underline hover:underline text-gray-800 hover:text-green-500">Official
                            Blog</a>
                    </li>
                    <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                        <a href="#" class="no-underline hover:underline text-gray-800 hover:text-green-500">About Us</a>
                    </li>
                    <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                        <a href="#" class="no-underline hover:underline text-gray-800 hover:text-green-500">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <a href="https://www.freepik.com/free-photos-vectors/background" class="text-gray-500">Background vector created by
        freepik - www.freepik.com</a>
</footer>


<script>
    let scrollPos = window.scrollY;
    const header = document.getElementById("header");
    const navContent = document.getElementById("nav-content");
    const navAction = document.getElementById("navAction");
    const brandName = document.getElementById("brandname");
    const toToggle = document.querySelectorAll(".toggleColour");

    document.addEventListener("scroll", function () {
        let i;
        /*Apply classes for slide in bar*/
        scrollPos = window.scrollY;

        if (scrollPos > 10) {
            header.classList.add("bg-white");
            navAction.classList.remove("bg-white");
            navAction.classList.add("gradient");
            navAction.classList.remove("text-gray-800");
            navAction.classList.add("text-white");
            //Use to switch toggleColour colours
            for (i = 0; i < toToggle.length; i++) {
                toToggle[i].classList.add("text-gray-800");
                toToggle[i].classList.remove("text-white");
            }
            header.classList.add("shadow");
            navContent.classList.remove("bg-gray-100");
            navContent.classList.add("bg-white");
        } else {
            header.classList.remove("bg-white");
            navAction.classList.remove("gradient");
            navAction.classList.add("bg-white");
            navAction.classList.remove("text-white");
            navAction.classList.add("text-gray-800");
            //Use to switch toggleColour colours
            for (i = 0; i < toToggle.length; i++) {
                toToggle[i].classList.add("text-white");
                toToggle[i].classList.remove("text-gray-800");
            }

            header.classList.remove("shadow");
            navContent.classList.remove("bg-white");
            navContent.classList.add("bg-gray-100");
        }
    });
</script>

<script>
    const navMenuDiv = document.getElementById("nav-content");
    const navMenu = document.getElementById("nav-toggle");

    document.onclick = check;

    function check(e) {
        const target = (e && e.target) || (event && event.srcElement);

        //Nav Menu
        if (!checkParent(target, navMenuDiv)) {
            // click NOT on the menu
            if (checkParent(target, navMenu)) {
                // click on the link
                if (navMenuDiv.classList.contains("hidden")) {
                    navMenuDiv.classList.remove("hidden");
                } else {
                    navMenuDiv.classList.add("hidden");
                }
            } else {
                // click both outside link and outside menu, hide menu
                navMenuDiv.classList.add("hidden");
            }
        }
    }

    function checkParent(t, elm) {
        while (t.parentNode) {
            if (t === elm) {
                return true;
            }
            t = t.parentNode;
        }
        return false;
    }
</script>
</body>
</html>
