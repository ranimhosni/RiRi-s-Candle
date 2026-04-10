<script setup>
import { Link, usePage } from '@inertiajs/vue3';
import { ref, computed } from 'vue';

const page = usePage();
const isPagesOpen = ref(false);
const isProductsOpen = ref(false);

const ordersCount = computed(() => {
    return page.props.ordersCount || 0;
});

const togglePages = () => {
    isPagesOpen.value = !isPagesOpen.value;
};

const toggleProducts = () => {
    isProductsOpen.value = !isProductsOpen.value;
};
</script>

<template>
    <aside
        class="fixed top-0 left-0 z-40 w-64 h-screen pt-16 transition-transform -translate-x-full bg-gradient-to-b from-white via-amber-50/30 to-orange-50/30 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 border-r-2 border-amber-200 dark:border-amber-800 md:translate-x-0 shadow-2xl"
        aria-label="Sidebar"
        id="drawer-navigation">
        
        <div class="overflow-y-auto py-5 px-3 h-full">
            
            <!-- Mobile Search -->
            <form action="#" method="GET" class="md:hidden mb-6">
                <label for="sidebar-search" class="sr-only">Search</label>
                <div class="relative">
                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                        <svg class="w-5 h-5 text-amber-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <input type="text" id="sidebar-search" placeholder="Search..."
                        class="bg-white dark:bg-gray-800 border border-amber-200 dark:border-gray-700 text-gray-900 dark:text-white text-sm rounded-xl focus:ring-2 focus:ring-amber-500 focus:border-amber-500 block w-full pl-10 pr-4 py-2.5 placeholder-gray-500 shadow-sm" />
                </div>
            </form>

            <!-- Navigation Menu -->
            <ul class="space-y-2">
                
                <!-- Dashboard -->
                <li>
                    <Link :href="route('admin.dashboard')"
                        class="flex items-center p-3 text-base font-medium text-gray-900 dark:text-white rounded-xl hover:bg-gradient-to-r hover:from-amber-100 hover:to-orange-100 dark:hover:from-amber-900/30 dark:hover:to-orange-900/30 group transition-all duration-200 shadow-sm hover:shadow-md">
                        <div class="flex items-center justify-center w-10 h-10 bg-gradient-to-br from-amber-100 to-orange-100 dark:from-amber-900/30 dark:to-orange-900/30 rounded-lg group-hover:scale-110 transition-transform duration-200">
                            <svg class="w-5 h-5 text-amber-600 dark:text-amber-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                                <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                            </svg>
                        </div>
                        <span class="ml-3 font-semibold">Dashboard</span>
                    </Link>
                </li>
</ul>
                <!-- Orders -->
                <li>
                    <Link :href="route('admin.orders.index')"
                        class="flex items-center p-3 text-base font-medium text-gray-900 dark:text-white rounded-xl hover:bg-gradient-to-r hover:from-amber-100 hover:to-orange-100 dark:hover:from-amber-900/30 dark:hover:to-orange-900/30 group transition-all duration-200 shadow-sm hover:shadow-md">
                        <div class="flex items-center justify-center w-10 h-10 bg-gradient-to-br from-amber-100 to-orange-100 dark:from-amber-900/30 dark:to-orange-900/30 rounded-lg group-hover:scale-110 transition-transform duration-200">
                            <svg class="w-5 h-5 text-amber-600 dark:text-amber-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <span class="ml-3 font-semibold">Orders</span>
                        <span class="inline-flex items-center justify-center ml-auto px-2 py-1 text-xs font-bold text-white bg-gradient-to-r from-red-500 to-pink-500 rounded-full">
                            {{ ordersCount }}
                        </span>
                    </Link>
                </li>

                <!-- Products Dropdown -->
                <li>
                    <button @click="toggleProducts" type="button"
                        class="flex items-center p-3 w-full text-base font-medium text-gray-900 dark:text-white rounded-xl hover:bg-gradient-to-r hover:from-amber-100 hover:to-orange-100 dark:hover:from-amber-900/30 dark:hover:to-orange-900/30 group transition-all duration-200 shadow-sm hover:shadow-md">
                        <div class="flex items-center justify-center w-10 h-10 bg-gradient-to-br from-amber-100 to-orange-100 dark:from-amber-900/30 dark:to-orange-900/30 rounded-lg group-hover:scale-110 transition-transform duration-200">
                            <svg class="w-5 h-5 text-amber-600 dark:text-amber-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M4 3a2 2 0 100 4h12a2 2 0 100-4H4z"></path>
                                <path fill-rule="evenodd" d="M3 8h14v7a2 2 0 01-2 2H5a2 2 0 01-2-2V8zm5 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <span class="flex-1 ml-3 text-left font-semibold">Products</span>
                        <svg :class="['w-5 h-5 transition-transform duration-200', isProductsOpen ? 'rotate-180' : '']" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    
                    <!-- Products Submenu -->
                    <ul v-show="isProductsOpen" class="mt-2 space-y-2 pl-4 border-l-2 border-amber-200 dark:border-amber-800 ml-5">
                        <li>
                            <Link :href="route('admin.products.index')"
                                class="flex items-center p-2 pl-4 text-sm font-medium text-gray-700 dark:text-gray-300 rounded-lg hover:bg-amber-50 dark:hover:bg-gray-700 hover:text-amber-700 dark:hover:text-amber-400 transition-all duration-200">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd"></path>
                                </svg>
                                All Products
                            </Link>
                        </li>
                        
                  
                    </ul>
                </li>

              

               


              

            <!-- Divider -->
            <div class="my-6 border-t-2 border-amber-200 dark:border-amber-800"></div>

            <!-- Quick Links -->
            <div class="px-3 mb-4">
                <h3 class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-3">
                    Quick Links
                </h3>
                <ul class="space-y-2">
                    <li>
                        <Link :href="route('home')"
                            class="flex items-center p-2 text-sm font-medium text-gray-700 dark:text-gray-300 rounded-lg hover:bg-amber-50 dark:hover:bg-gray-700 hover:text-amber-700 dark:hover:text-amber-400 transition-all duration-200">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                            </svg>
                            Visit Store
                        </Link>
                    </li>
                   
                    
                </ul>
            </div>
        </div>

        <!-- Bottom Actions -->
      
    </aside>
</template>