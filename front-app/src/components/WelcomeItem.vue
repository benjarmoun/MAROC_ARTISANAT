<template>
  <section class="relative w-full h-auto bg-no-repeat bg-cover" x-data="{ showMenu: false }" style="background-image: url(https://www.extreme-design.co.uk/wp-content/uploads/2020/09/Royal-Mansour-Marrakech-lobby.jpg);">

    <div class="absolute inset-0 z-0 h-full bg-blue-700 opacity-25"></div>

    <!-- FIRS ITEM OF THE HOME PAGE WITH BACKGROUND IMAGE -->
    <div class="flex items-center w-full h-20">
        <!-- <nav class="hidden w-full md:block" x-show="!showMenu" x-cloak="">
            <ul class="relative z-10 flex items-center px-6 text-sm text-white lg:text-base">
                <li class="mx-2 lg:mx-3">
                    <a href="#_" x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false" class="relative inline-block font-medium text-gray-200 hover:text-white">
                        <span class="block">First Link</span>
                        <span class="absolute bottom-0 left-0 inline-block w-full h-1 -mb-1 overflow-hidden">
                            <span x-show="hover" class="absolute inset-0 inline-block w-full h-1 h-full transform border-t-2 border-blue-700" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-out duration-300" x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"></span>
                        </span>
                    </a>
                </li>
                <li class="mx-2 lg:mx-3">
                    <a href="#_" x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false" class="relative inline-block font-medium text-gray-200 hover:text-white">
                        <span class="block">Second Link</span>
                        <span class="absolute bottom-0 left-0 inline-block w-full h-1 -mb-1 overflow-hidden">
                            <span x-show="hover" class="absolute inset-0 inline-block w-full h-1 h-full transform border-t-2 border-blue-700" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-out duration-300" x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"></span>
                        </span>
                    </a>
                </li>
                <li class="mx-2 lg:mx-3">
                    <a href="#_" x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false" class="relative inline-block font-medium text-gray-200 hover:text-white">
                        <span class="block">Third Link</span>
                        <span class="absolute bottom-0 left-0 inline-block w-full h-1 -mb-1 overflow-hidden">
                            <span x-show="hover" class="absolute inset-0 inline-block w-full h-1 h-full transform border-t-2 border-blue-700" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-out duration-300" x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"></span>
                        </span>
                    </a>
                </li>
                <li class="mx-auto">
                    <a href="#_" class="w-1/4 py-4 pl-6 pr-4 md:pl-4 md:py-0">
                        <span class="text-3xl font-black leading-none text-white select-none logo">tails<span class="text-blue-700">.</span></span>
                    </a>
                </li>
                <li class="mx-2 lg:mx-3">
                    <a href="#_" x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false" class="relative inline-block font-medium text-gray-200 hover:text-white">
                        <span class="block">Fourth Link</span>
                        <span class="absolute bottom-0 left-0 inline-block w-full h-1 -mb-1 overflow-hidden">
                            <span x-show="hover" class="absolute inset-0 inline-block w-full h-1 h-full transform border-t-2 border-blue-700" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-out duration-300" x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"></span>
                        </span>
                    </a>
                </li>
                <li class="mx-2 lg:mx-3">
                    <a href="#_" x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false" class="relative inline-block font-medium text-gray-200 hover:text-white">
                        <span class="block">Fifth Link</span>
                        <span class="absolute bottom-0 left-0 inline-block w-full h-1 -mb-1 overflow-hidden">
                            <span x-show="hover" class="absolute inset-0 inline-block w-full h-1 h-full transform border-t-2 border-blue-700" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-out duration-300" x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"></span>
                        </span>
                    </a>
                </li>
                <li class="mx-2 lg:mx-3">
                    <a href="#_" x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false" class="relative inline-block font-medium text-gray-200 hover:text-white">
                        <span class="block">Sixth Link</span>
                        <span class="absolute bottom-0 left-0 inline-block w-full h-1 -mb-1 overflow-hidden">
                            <span x-show="hover" class="absolute inset-0 inline-block w-full h-1 h-full transform border-t-2 border-blue-700" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-out duration-300" x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"></span>
                        </span>
                    </a>
                </li>
            </ul>
        </nav> -->
        <!-- End Desktop menu -->
    </div>

    <div class="container flex items-center justify-center h-auto py-32 mx-auto">

        <div class="z-10 flex flex-col items-center px-8 xl:px-0">
            <h1 class="mx-6 mt-1 text-xl text-5xl font-black text-center text-white lg:text-6xl sm:text-center sm:mx-0">Start Creating <br class="block lg:hidden">Your Next Idea!</h1>
            <p class="w-2/3 my-6 text-xl font-normal text-center text-gray-200">YOUR GUIDE TO CREATING A COSY AUTUMN HOME IN 5 EASY STEPS</p>
            <div class="flex justify-center md:mt-10">
                <router-link to="/shop" >
                    <a href="#" class="px-8 py-2 m-2 text-center text-white bg-blue-700 border-2 border-blue-700 hover:bg-transparent rounded">Get Started</a>
                </router-link>
            </div>
        </div>

    </div>
</section>
</template>

<script>
    import { RouterLink } from 'vue-router'
</script>
