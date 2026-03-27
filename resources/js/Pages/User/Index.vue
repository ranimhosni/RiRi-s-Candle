<script setup>
import { ref } from 'vue';
import { Link, router } from '@inertiajs/vue3';
import UserLayouts from './Layouts/UserLayouts.vue';
import Hero from './Layouts/Hero.vue';
import Swal from 'sweetalert2';

defineProps({
    products: Array
})

const addToCart = (product) => {
    console.log(product)
    router.post(route('cart.store', product), {
        onSuccess: (page) => {
            if (page.props.flash.success) {
                Swal.fire({
                    toast: true,
                    icon: "success",
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 3000,
                    title: page.props.flash.success,
                    background: '#FEF3C7',
                    color: '#92400E',
                    iconColor: '#D97706'
                });
            }
        },
    })
}

</script>

<template>
    <UserLayouts>
        <Hero></Hero>
        
        <!-- Products Section -->
        <section class="bg-gradient-to-b from-white via-amber-50/30 to-orange-50/30 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 py-12 px-4 sm:px-6 lg:px-8">
            <div class="max-w-7xl mx-auto">
                
                <!-- Section Header -->
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-amber-700 to-orange-600 dark:from-amber-400 dark:to-orange-300 mb-3">
                        Our Premium Collection
                    </h2>
                    <p class="text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
                        Discover handcrafted candles made with love, natural ingredients, and sustainable materials
                    </p>
                    
                    <!-- Decorative divider -->
                    <div class="flex items-center justify-center mt-6">
                        <div class="h-px w-16 bg-gradient-to-r from-transparent to-amber-600"></div>
                        <svg class="w-6 h-6 mx-3 text-amber-600 dark:text-amber-400" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C11.5 2 11 2.19 10.59 2.59C10.2 3 9.91 3.5 9.91 4C9.91 4.5 10.2 5 10.59 5.41C11 5.81 11.5 6 12 6C12.5 6 13 5.81 13.41 5.41C13.8 5 14.09 4.5 14.09 4C14.09 3.5 13.8 3 13.41 2.59C13 2.19 12.5 2 12 2M12 7C10.9 7 10 7.9 10 9V15C10 16.1 10.9 17 12 17C13.1 17 14 16.1 14 15V9C14 7.9 13.1 7 12 7Z"/>
                        </svg>
                        <div class="h-px w-16 bg-gradient-to-l from-transparent to-amber-600"></div>
                    </div>
                </div>

                <!-- Products Grid -->
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                    <div v-for="product in products" :key="product.id" 
                        class="group relative bg-white dark:bg-gray-800 rounded-2xl shadow-md hover:shadow-2xl transition-all duration-300 overflow-hidden border border-amber-100 dark:border-gray-700 transform hover:-translate-y-2">
                        
                        <!-- Product Image Container -->
                        <div class="relative aspect-square overflow-hidden bg-gradient-to-br from-amber-50 to-orange-50 dark:from-gray-700 dark:to-gray-600">
                            <img 
                                v-if="product.product_images.length > 0" 
                                :src="`/${product.product_images[0].image}`"
                                :alt="product.title"
                                class="h-full w-full object-cover object-center transition-transform duration-500 group-hover:scale-110" 
                            />
                            <img 
                                v-else
                                src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/65/No-Image-Placeholder.svg/330px-No-Image-Placeholder.svg.png"
                                :alt="product.title"
                                class="h-full w-full object-cover object-center opacity-50" 
                            />

                            <!-- Overlay gradient on hover -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                            <!-- Quick Action Buttons -->
                            <div class="absolute inset-0 flex items-center justify-center gap-3 opacity-0 group-hover:opacity-100 transition-all duration-300 transform translate-y-4 group-hover:translate-y-0">
                                
                                <!-- Add to Cart Button -->
                                <button 
                                    @click="addToCart(product)"
                                    class="bg-gradient-to-r from-amber-600 to-orange-600 hover:from-amber-700 hover:to-orange-700 text-white p-3 rounded-full shadow-lg transform hover:scale-110 transition-all duration-300 hover:rotate-12"
                                    title="Add to Cart">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                    </svg>
                                </button>

                                <!-- Quick View Button -->
                                  <a
                                    class="bg-white dark:bg-gray-800 text-amber-600 dark:text-amber-400 p-3 rounded-full shadow-lg transform hover:scale-110 transition-all duration-300 hover:-rotate-12"
                                    title="Quick View">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </a>

                                
                            </div>

                            <!-- Sale Badge (if applicable) -->
                            <div v-if="product.sale" class="absolute top-3 right-3">
                                <span class="bg-red-500 text-white text-xs font-bold px-3 py-1.5 rounded-full shadow-lg">
                                    SALE
                                </span>
                            </div>

                            <!-- New Badge (if applicable) -->
                            <div v-if="product.is_new" class="absolute top-3 left-3">
                                <span class="bg-gradient-to-r from-amber-600 to-orange-600 text-white text-xs font-bold px-3 py-1.5 rounded-full shadow-lg">
                                    NEW
                                </span>
                            </div>
                        </div>

                        <!-- Product Info -->
                        <div class="p-5">
                            <!-- Brand -->
                            <p class="text-xs font-semibold text-amber-600 dark:text-amber-400 uppercase tracking-wider mb-2">
                                {{ product.brand?.name || 'RiRi\'s Candles' }}
                            </p>

                            <!-- Title -->
                            <h3 class="text-base font-bold text-gray-900 dark:text-white mb-2 line-clamp-2 group-hover:text-amber-600 dark:group-hover:text-amber-400 transition-colors duration-300">
                                {{ product.title }}
                            </h3>

                            <!-- Description (optional) -->
                            <p v-if="product.description" class="text-sm text-gray-600 dark:text-gray-400 mb-3 line-clamp-2">
                                {{ product.description }}
                            </p>

                            <!-- Rating (if available) -->
                            <div class="flex items-center mb-3">
                                <div class="flex text-amber-500">
                                    <svg v-for="i in 5" :key="i" class="w-4 h-4" :class="i <= (product.rating || 5) ? 'fill-current' : 'fill-gray-300'" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                </div>
                                <span class="text-xs text-gray-600 dark:text-gray-400 ml-2">
                                    ({{ product.reviews_count || 0 }} reviews)
                                </span>
                            </div>

                            <!-- Price and Stock -->
                            <div class="flex items-center justify-between">
                                <div>
                                    <span class="text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-amber-700 to-orange-600 dark:from-amber-400 dark:to-orange-300">
                                        {{ product.price }}DT
                                    </span>
                                    <span v-if="product.old_price" class="text-sm text-gray-500 line-through ml-2">
                                        {{ product.old_price }}DT
                                    </span>
                                </div>
                                
                                <!-- Stock Indicator -->
                                <div class="flex items-center">
                                    <div class="w-2 h-2 rounded-full mr-1.5" 
                                        :class="product.in_stock ? 'bg-green-500' : 'bg-red-500'">
                                    </div>
                                    <span class="text-xs font-medium" 
                                        :class="product.in_stock ? 'text-green-600 dark:text-green-400' : 'text-red-600 dark:text-red-400'">
                                        {{ product.in_stock ? 'In Stock' : 'Out of Stock' }}
                                    </span>
                                </div>
                            </div>

                            <!-- Quick Add to Cart (Mobile) -->
                            <button 
                                @click="addToCart(product)"
                                class="w-full mt-4 md:hidden bg-gradient-to-r from-amber-600 to-orange-600 hover:from-amber-700 hover:to-orange-700 text-white font-semibold py-2.5 px-4 rounded-lg transition-all duration-300 shadow-md hover:shadow-lg flex items-center justify-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                </svg>
                                <span>Add to Cart</span>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Empty State -->
                <div v-if="!products || products.length === 0" class="text-center py-16">
                    <svg class="w-24 h-24 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                    </svg>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">No products found</h3>
                    <p class="text-gray-600 dark:text-gray-400">Check back soon for new arrivals!</p>
                </div>
            </div>
        </section>
    </UserLayouts>
</template>

<style scoped>
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>