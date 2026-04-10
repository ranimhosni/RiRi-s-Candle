<template>
    <nav class="bg-gradient-to-r from-white via-amber-50/30 to-orange-50/30 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 border-b-2 border-amber-200 dark:border-amber-800 px-4 py-3 fixed left-0 right-0 top-0 z-50 shadow-lg backdrop-blur-sm">
        <div class="flex flex-wrap justify-between items-center">
            
            <!-- Left Section: Logo & Search -->
            <div class="flex justify-start items-center space-x-4">
                <!-- Mobile Menu Toggle -->
                <button
                    data-drawer-target="drawer-navigation"
                    data-drawer-toggle="drawer-navigation"
                    aria-controls="drawer-navigation"
                    class="p-2 text-gray-600 rounded-lg cursor-pointer md:hidden hover:text-amber-600 hover:bg-amber-50 dark:hover:bg-gray-700 focus:bg-amber-50 dark:focus:bg-gray-700 focus:ring-2 focus:ring-amber-500 dark:text-gray-400 dark:hover:text-amber-400 transition-all duration-200"
                >
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Toggle sidebar</span>
                </button>

                <!-- Logo -->
                <Link :href="route('admin.dashboard')" class="flex items-center space-x-3 group">
                    <div class="relative">
                        <!-- Glow effect -->
                        <div class="absolute inset-0 bg-amber-400 blur-xl opacity-20 group-hover:opacity-30 transition-opacity duration-300"></div>
                        <img src="../Images/logo.png" class="h-12 w-auto relative z-10 group-hover:scale-110 transition-transform duration-300" alt="Riri's Logo" />
                    </div>
                    <span class="self-center text-xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-amber-700 to-orange-600 dark:from-amber-400 dark:to-orange-300 hidden sm:block">
                        Riri's Candles Admin
                    </span>
                </Link>

               
            </div>

            <!-- Right Section: Actions & Profile -->
            <div class="flex items-center space-x-2">
                
                <!-- Mobile Search Toggle -->
                <button type="button" data-drawer-toggle="drawer-navigation"
                    class="p-2 text-gray-500 rounded-lg lg:hidden hover:text-amber-600 hover:bg-amber-50 dark:text-gray-400 dark:hover:text-amber-400 dark:hover:bg-gray-700 focus:ring-2 focus:ring-amber-300 transition-all duration-200">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                    </svg>
                </button>
                   <!-- User Profile Dropdown -->
                <button type="button" 
                    class="flex items-center space-x-3 text-sm bg-gradient-to-r from-amber-50 to-orange-50 dark:from-gray-700 dark:to-gray-600 rounded-xl px-3 py-2 hover:shadow-lg focus:ring-4 focus:ring-amber-300 dark:focus:ring-amber-800 transition-all duration-200 border border-amber-200 dark:border-gray-600"
                    id="user-menu-button"
                    data-dropdown-toggle="dropdown">
                    <img class="w-8 h-8 rounded-lg ring-2 ring-amber-300 dark:ring-amber-700" 
                        src="../Images/admin.png"></img>
                    <span class="hidden md:block">
                        <span class="block text-sm font-semibold text-gray-900 dark:text-white">Admin</span>
                        <span class="block text-xs text-gray-500 dark:text-gray-400">Administrator</span>
                    </span>
                    <svg class="w-4 h-4 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>

                <!-- User Dropdown Menu -->
                <div class="hidden z-50 my-4 w-56 text-base list-none bg-white dark:bg-gray-800 rounded-xl divide-y divide-gray-100 dark:divide-gray-700 shadow-2xl border border-amber-200 dark:border-gray-700" id="dropdown">
                    <div class="py-3 px-4 bg-gradient-to-r from-amber-50 to-orange-50 dark:from-gray-700 dark:to-gray-600 rounded-t-xl">
                        <span class="block text-sm font-semibold text-gray-900 dark:text-white">Admin User</span>
                        <span class="block text-sm text-gray-600 dark:text-gray-400 truncate">admin@ririscandles.com</span>
                    </div>
                    
                   

                    <ul class="py-1">
                        <li>
                            <Link :href="route('home')" 
                                class="flex items-center py-2 px-4 text-sm text-gray-700 hover:bg-amber-50 dark:text-gray-300 dark:hover:bg-gray-700 dark:hover:text-white transition-colors duration-200">
                                <svg class="mr-2 w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                                </svg>
                                Visit Store
                            </Link>
                        </li>
                    </ul>

                    <ul class="py-1">
                        <li>
                            <Link :href="route('logout')" method="post" as="button"
                                class="flex items-center w-full py-2 px-4 text-sm text-red-600 hover:bg-red-50 dark:text-red-400 dark:hover:bg-red-900/20 transition-colors duration-200">
                                <svg class="mr-2 w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd"></path>
                                </svg>
                                Sign Out
                            </Link>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
</script>