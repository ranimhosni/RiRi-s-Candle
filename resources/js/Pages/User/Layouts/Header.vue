<script setup>
import { Link, usePage } from '@inertiajs/vue3';
import { computed } from 'vue'
const canLogin = usePage().props.canLogin;
const canRegister = usePage().props.canRegister;
const auth = usePage().props.auth;
const cart = computed(() => usePage().props.cart);
</script>

<template>
  <nav class="bg-gradient-to-r from-amber-50 via-white to-orange-50 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 fixed w-full z-30 top-0 start-0 border-b border-amber-200 dark:border-gray-700 backdrop-blur-sm bg-opacity-95 shadow-md">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
      
      <!-- Logo Section -->
      <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse group">
        <div class="relative">
          <img src="../Layouts/logo.png" class="h-14 md:h-16 transition-transform duration-300 group-hover:scale-105" alt="RiRi's Logo" />
          <!-- Glow effect -->
          <div class="absolute inset-0 bg-amber-400 rounded-full blur-xl opacity-0 group-hover:opacity-30 transition-opacity duration-300"></div>
        </div>
        <div class="flex flex-col">
          <span class="self-center text-xl md:text-2xl text-transparent bg-clip-text bg-gradient-to-r from-amber-700 to-orange-600 dark:from-amber-400 dark:to-orange-300 font-bold whitespace-nowrap">
            RiRi's Candles
          </span>
          <span class="text-xs text-gray-600 dark:text-gray-400 font-medium">Handcrafted with Love</span>
        </div>
      </a>

      <!-- Right Side Actions -->
      <div v-if="canLogin" class="flex items-center md:order-2 space-x-2 md:space-x-3 rtl:space-x-reverse">
        
        <!-- Shopping Cart Button -->
        <div class="relative group">
          <Link :href="route('cart.view')"
            class="relative inline-flex items-center p-2.5 text-sm font-medium text-center text-white bg-gradient-to-r from-amber-600 to-orange-600 rounded-lg hover:from-amber-700 hover:to-orange-700 focus:ring-4 focus:outline-none focus:ring-amber-300 dark:focus:ring-amber-800 transition-all duration-300 shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              stroke="currentColor" class="w-5 h-5 md:w-6 md:h-6">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
            </svg>
            <span class="sr-only">Shopping cart</span>
            <div v-if="cart.data.count > 0"
              class="absolute inline-flex items-center justify-center w-5 h-5 md:w-6 md:h-6 text-xs font-bold text-white bg-red-500 border-2 border-white rounded-full -top-2 -end-2 animate-pulse">
              {{ cart.data.count }}
            </div>
          </Link>
          <!-- Cart Tooltip -->
          <div class="absolute hidden group-hover:block right-0 mt-2 px-3 py-1 text-xs text-white bg-gray-900 rounded-lg whitespace-nowrap">
            View Cart
          </div>
        </div>

        <!-- User Menu / Auth Buttons -->
        <div v-if="auth.user" class="relative">
          <button type="button"
            class="flex items-center space-x-2 text-sm bg-gradient-to-r from-amber-100 to-orange-100 dark:from-gray-700 dark:to-gray-600 rounded-full p-1 md:p-1.5 focus:ring-4 focus:ring-amber-300 dark:focus:ring-gray-600 hover:shadow-lg transition-all duration-300 transform hover:scale-105"
            id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
            data-dropdown-placement="bottom">
            <span class="sr-only">Open user menu</span>
            <div class="w-8 h-8 md:w-9 md:h-9 rounded-full bg-gradient-to-br from-amber-400 to-orange-500 flex items-center justify-center text-white font-semibold">
              {{ auth.user.name?.charAt(0).toUpperCase() || 'U' }}
            </div>
            <span class="hidden md:block text-gray-700 dark:text-gray-200 font-medium pr-2">{{ auth.user.name }}</span>
          </button>

          <!-- Dropdown menu -->
          <div class="z-50 hidden bg-white dark:bg-gray-800 border border-amber-200 dark:border-gray-700 rounded-xl shadow-xl w-56"
            id="user-dropdown">
            <div class="px-4 py-3 text-sm border-b border-amber-200 dark:border-gray-700 bg-gradient-to-r from-amber-50 to-orange-50 dark:from-gray-700 dark:to-gray-600 rounded-t-xl">
              <div class="font-semibold text-gray-900 dark:text-white">{{ auth.user.name }}</div>
              <div class="text-gray-600 dark:text-gray-400 truncate text-xs mt-1">{{ auth.user.email }}</div>
            </div>
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="user-menu-button">
              <li>
                <a href="#"
                  class="flex items-center px-4 py-2.5 hover:bg-amber-50 dark:hover:bg-gray-700 transition-colors duration-200">
                  <svg class="w-5 h-5 mr-3 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                  </svg>
                  Dashboard
                </a>
              </li>
              <li>
                <a href="#"
                  class="flex items-center px-4 py-2.5 hover:bg-amber-50 dark:hover:bg-gray-700 transition-colors duration-200">
                  <svg class="w-5 h-5 mr-3 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                  </svg>
                  My Orders
                </a>
              </li>
              <li>
                <a href="#"
                  class="flex items-center px-4 py-2.5 hover:bg-amber-50 dark:hover:bg-gray-700 transition-colors duration-200">
                  <svg class="w-5 h-5 mr-3 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                  </svg>
                  Settings
                </a>
              </li>
              <li class="border-t border-amber-200 dark:border-gray-700 mt-2 pt-2">
                <Link :href="route('logout')" method="post" as="button"
                  class="flex items-center w-full px-4 py-2.5 text-red-600 hover:bg-red-50 dark:hover:bg-red-900/20 transition-colors duration-200">
                  <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                  </svg>
                  Sign out
                </Link>
              </li>
            </ul>
          </div>
        </div>
        
        <!-- Login/Register Buttons (when not authenticated) -->
        <div v-else class="flex items-center space-x-2">
          <Link :href="route('login')"
            class="text-amber-700 dark:text-amber-400 hover:text-amber-800 dark:hover:text-amber-300 font-semibold text-sm px-4 py-2 rounded-lg hover:bg-amber-100 dark:hover:bg-gray-700 transition-all duration-300">
            Login
          </Link>
          <Link v-if="canRegister" :href="route('register')"
            class="text-white bg-gradient-to-r from-amber-600 to-orange-600 hover:from-amber-700 hover:to-orange-700 font-semibold rounded-lg text-sm px-5 py-2.5 text-center shadow-md hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-300">
            Register
          </Link>
        </div>

        <!-- Mobile menu button -->
        <button data-collapse-toggle="navbar-user" type="button"
          class="inline-flex items-center p-2 w-10 h-10 justify-center text-gray-700 dark:text-gray-300 rounded-lg md:hidden hover:bg-amber-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-amber-300 dark:focus:ring-gray-600 transition-colors duration-300"
          aria-controls="navbar-user" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M5 7h14M5 12h14M5 17h14" />
          </svg>
        </button>
      </div>

      <!-- Navigation Links -->
      <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
        <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-amber-200 dark:border-gray-700 rounded-lg bg-white dark:bg-gray-800 md:flex-row md:space-x-2 lg:space-x-4 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-transparent">
          <li>
            <a href="/"
              class="block py-2 px-4 text-white bg-gradient-to-r from-amber-600 to-orange-600 rounded-lg md:bg-transparent md:text-amber-700 dark:md:text-amber-400 md:p-2 md:px-3 font-semibold hover:bg-amber-100 dark:hover:bg-gray-700 transition-all duration-300"
              aria-current="page">
              Home
            </a>
          </li>
          <li>
            <a href="/shop"
              class="block py-2 px-4 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-amber-100 dark:hover:bg-gray-700 md:hover:bg-amber-50 md:p-2 md:px-3 font-medium hover:text-amber-700 dark:hover:text-amber-400 transition-all duration-300">
              Shop
            </a>
          </li>
          <li>
            <a href="/collections"
              class="block py-2 px-4 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-amber-100 dark:hover:bg-gray-700 md:hover:bg-amber-50 md:p-2 md:px-3 font-medium hover:text-amber-700 dark:hover:text-amber-400 transition-all duration-300">
              Collections
            </a>
          </li>
          <li>
            <a href="/about"
              class="block py-2 px-4 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-amber-100 dark:hover:bg-gray-700 md:hover:bg-amber-50 md:p-2 md:px-3 font-medium hover:text-amber-700 dark:hover:text-amber-400 transition-all duration-300">
              About
            </a>
          </li>
          <li>
            <a href="/contact"
              class="block py-2 px-4 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-amber-100 dark:hover:bg-gray-700 md:hover:bg-amber-50 md:p-2 md:px-3 font-medium hover:text-amber-700 dark:hover:text-amber-400 transition-all duration-300">
              Contact
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>

<style scoped>
@keyframes pulse {
  0%, 100% {
    opacity: 1;
  }
  50% {
    opacity: .5;
  }
}

.animate-pulse {
  animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
}

/* Smooth backdrop blur for browsers that support it */
@supports (backdrop-filter: blur(12px)) {
  nav {
    backdrop-filter: blur(12px);
  }
}
</style>