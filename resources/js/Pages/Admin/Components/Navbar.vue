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

                <!-- Search Bar (Desktop) -->
                <form action="#" method="GET" class="hidden lg:block">
                    <div class="relative w-64 xl:w-96">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-amber-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input type="text" placeholder="Search products, orders, users..." 
                            class="bg-white dark:bg-gray-800 border border-amber-200 dark:border-gray-700 text-gray-900 dark:text-white text-sm rounded-xl focus:ring-2 focus:ring-amber-500 focus:border-amber-500 block w-full pl-10 pr-4 py-2.5 placeholder-gray-500 dark:placeholder-gray-400 shadow-sm hover:shadow-md transition-all duration-200" />
                    </div>
                </form>
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

                <!-- Notifications -->
                <button type="button" data-dropdown-toggle="notification-dropdown"
                    class="relative p-2 text-gray-500 rounded-lg hover:text-amber-600 hover:bg-amber-50 dark:text-gray-400 dark:hover:text-amber-400 dark:hover:bg-gray-700 focus:ring-2 focus:ring-amber-300 transition-all duration-200">
                    <span class="sr-only">View notifications</span>
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"></path>
                    </svg>
                    <!-- Notification Badge -->
                    <span class="absolute top-0 right-0 inline-flex items-center justify-center w-5 h-5 text-xs font-bold text-white bg-gradient-to-r from-red-500 to-pink-500 rounded-full border-2 border-white dark:border-gray-900 transform translate-x-1 -translate-y-1">
                        3
                    </span>
                </button>

                <!-- Notifications Dropdown -->
                <div class="hidden overflow-hidden z-50 my-4 max-w-sm text-base list-none bg-white dark:bg-gray-800 rounded-xl divide-y divide-gray-100 dark:divide-gray-700 shadow-2xl border border-amber-200 dark:border-gray-700" id="notification-dropdown">
                    <div class="block py-3 px-4 text-base font-semibold text-center text-gray-900 dark:text-white bg-gradient-to-r from-amber-50 to-orange-50 dark:from-gray-700 dark:to-gray-600">
                        Notifications
                    </div>
                    <div class="max-h-96 overflow-y-auto">
                        <!-- Notification Item -->
                        <a href="#" class="flex py-3 px-4 hover:bg-amber-50 dark:hover:bg-gray-700 transition-colors duration-200">
                            <div class="flex-shrink-0">
                                <div class="relative">
                                    <img class="w-11 h-11 rounded-full" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/bonnie-green.png" alt="User" />
                                    <div class="absolute -bottom-1 -right-1 w-5 h-5 bg-green-500 rounded-full border-2 border-white dark:border-gray-800"></div>
                                </div>
                            </div>
                            <div class="pl-3 w-full">
                                <div class="text-gray-700 dark:text-gray-300 font-normal text-sm mb-1.5">
                                    New order from <span class="font-semibold text-gray-900 dark:text-white">John Doe</span>
                                </div>
                                <div class="text-xs font-medium text-amber-600 dark:text-amber-400">
                                    2 minutes ago
                                </div>
                            </div>
                        </a>

                        <a href="#" class="flex py-3 px-4 hover:bg-amber-50 dark:hover:bg-gray-700 transition-colors duration-200">
                            <div class="flex-shrink-0">
                                <div class="w-11 h-11 bg-amber-100 dark:bg-amber-900/30 rounded-full flex items-center justify-center">
                                    <svg class="w-6 h-6 text-amber-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z"></path>
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="pl-3 w-full">
                                <div class="text-gray-700 dark:text-gray-300 font-normal text-sm mb-1.5">
                                    Payment received: <span class="font-semibold text-gray-900 dark:text-white">150 DT</span>
                                </div>
                                <div class="text-xs font-medium text-amber-600 dark:text-amber-400">
                                    1 hour ago
                                </div>
                            </div>
                        </a>

                        <a href="#" class="flex py-3 px-4 hover:bg-amber-50 dark:hover:bg-gray-700 transition-colors duration-200">
                            <div class="flex-shrink-0">
                                <div class="w-11 h-11 bg-blue-100 dark:bg-blue-900/30 rounded-full flex items-center justify-center">
                                    <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="pl-3 w-full">
                                <div class="text-gray-700 dark:text-gray-300 font-normal text-sm mb-1.5">
                                    New message from customer support
                                </div>
                                <div class="text-xs font-medium text-amber-600 dark:text-amber-400">
                                    3 hours ago
                                </div>
                            </div>
                        </a>
                    </div>
                    <Link :href="route('admin.orders.index')" 
                        class="block py-2 text-sm font-medium text-center text-gray-900 dark:text-white bg-gray-50 dark:bg-gray-700 hover:bg-amber-50 dark:hover:bg-gray-600 transition-colors duration-200">
                        <div class="inline-flex items-center">
                            <svg class="mr-2 w-4 h-4 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path>
                            </svg>
                            View all
                        </div>
                    </Link>
                </div>

              

              

                <!-- User Profile Dropdown -->
                <button type="button" 
                    class="flex items-center space-x-3 text-sm bg-gradient-to-r from-amber-50 to-orange-50 dark:from-gray-700 dark:to-gray-600 rounded-xl px-3 py-2 hover:shadow-lg focus:ring-4 focus:ring-amber-300 dark:focus:ring-amber-800 transition-all duration-200 border border-amber-200 dark:border-gray-600"
                    id="user-menu-button"
                    data-dropdown-toggle="dropdown">
                    <img class="w-8 h-8 rounded-lg ring-2 ring-amber-300 dark:ring-amber-700" 
                        src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/michael-gough.png" 
                        alt="Admin photo" />
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
                    
                    <ul class="py-1" aria-labelledby="dropdown">
                        <li>
                            <Link :href="route('admin.dashboard')" 
                                class="flex items-center py-2 px-4 text-sm text-gray-700 hover:bg-amber-50 dark:text-gray-300 dark:hover:bg-gray-700 dark:hover:text-white transition-colors duration-200">
                                <svg class="mr-2 w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                                </svg>
                                Dashboard
                            </Link>
                        </li>
                       
                       
                    </ul>

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