<script setup>
import UserLayouts from './Layouts/UserLayouts.vue';
import { Link } from '@inertiajs/vue3';

defineProps({
    order: Object
});

const getStatusColor = (status) => {
    const colors = {
        'pending': 'bg-yellow-100 text-yellow-800',
        'processing': 'bg-blue-100 text-blue-800',
        'shipped': 'bg-indigo-100 text-indigo-800',
        'delivered': 'bg-green-100 text-green-800',
        'cancelled': 'bg-red-100 text-red-800',
    };
    return colors[status] || 'bg-gray-100 text-gray-800';
};

const getStatusLabel = (status) => {
    const labels = {
        'pending': 'Pending',
        'processing': 'Processing',
        'shipped': 'Shipped',
        'delivered': 'Delivered',
        'cancelled': 'Cancelled',
    };
    return labels[status] || status;
};

const formatDate = (date) => {
    return new Date(date).toLocaleDateString('en-US', {
        year: 'numeric',
        month: 'short',
        day: 'numeric',
        hour: '2-digit',
        minute: '2-digit'
    });
};
</script>

<template>
    <UserLayouts>
        <div class="pt-24 pb-12">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                
                <!-- Back Button -->
                <Link :href="route('orders.index')"
                    class="inline-flex items-center text-amber-600 dark:text-amber-400 hover:text-amber-700 dark:hover:text-amber-300 font-medium mb-6 transition-colors duration-200">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    Back to Orders
                </Link>

                <!-- Order Header Card -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md mb-6 overflow-hidden">
                    <div class="bg-gradient-to-r from-amber-50 to-orange-50 dark:from-gray-700 dark:to-gray-600 p-6 border-b border-amber-200 dark:border-gray-600">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <p class="text-sm text-gray-600 dark:text-gray-400 font-medium mb-2">Order Number</p>
                                <p class="text-3xl font-bold text-gray-900 dark:text-white">{{ '#' + String(order.id).padStart(6, '0') }}</p>
                            </div>
                            <div class="text-right">
                                <p class="text-sm text-gray-600 dark:text-gray-400 font-medium mb-2">Order Status</p>
                                <span :class="['px-4 py-2 inline-flex items-center text-sm font-semibold rounded-full', getStatusColor(order.status)]">
                                    {{ getStatusLabel(order.status) }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="p-6 grid grid-cols-2 md:grid-cols-4 gap-6 border-b border-gray-200 dark:border-gray-700">
                        <div>
                            <p class="text-sm text-gray-600 dark:text-gray-400 font-medium">Order Date</p>
                            <p class="text-lg font-semibold text-gray-900 dark:text-white mt-1">{{ formatDate(order.created_at) }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600 dark:text-gray-400 font-medium">Total Amount</p>
                            <p class="text-lg font-bold text-amber-700 dark:text-amber-400 mt-1">{{ parseFloat(order.total_price).toFixed(2) }} DT</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600 dark:text-gray-400 font-medium">Number of Items</p>
                            <p class="text-lg font-semibold text-gray-900 dark:text-white mt-1">{{ order.items.length }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600 dark:text-gray-400 font-medium">Last Updated</p>
                            <p class="text-lg font-semibold text-gray-900 dark:text-white mt-1">{{ formatDate(order.updated_at) }}</p>
                        </div>
                    </div>
                </div>

                <!-- Order Items Section -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md mb-6 overflow-hidden">
                    <div class="bg-gradient-to-r from-amber-50 to-orange-50 dark:from-gray-700 dark:to-gray-600 p-6 border-b border-amber-200 dark:border-gray-600">
                        <h2 class="text-xl font-bold text-gray-900 dark:text-white">Order Items</h2>
                    </div>
                    
                    <div class="p-6">
                        <div class="space-y-4">
                            <div v-for="item in order.items" :key="item.id" 
                                class="flex items-center gap-6 p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                
                                <!-- Product Image -->
                                <div class="flex-shrink-0 w-24 h-24">
                                    <img v-if="item.product && item.product.product_images && item.product.product_images.length > 0"
                                        :src="`/${item.product.product_images[0].image}`"
                                        :alt="item.product.name"
                                        class="w-full h-full object-cover rounded-lg">
                                    <img v-else
                                        src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/65/No-Image-Placeholder.svg/330px-No-Image-Placeholder.svg.png"
                                        alt="No image"
                                        class="w-full h-full object-cover rounded-lg">
                                </div>

                                <!-- Product Details -->
                                <div class="flex-grow">
                                    <p v-if="item.product" class="text-lg font-semibold text-gray-900 dark:text-white">
                                        {{ item.product.name }}
                                    </p>
                                    <p v-if="item.product && item.product.brand" class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                                        Brand: <span class="font-medium">{{ item.product.brand.name }}</span>
                                    </p>
                                    <p v-if="item.product && item.product.category" class="text-sm text-gray-600 dark:text-gray-400">
                                        Category: <span class="font-medium">{{ item.product.category.name }}</span>
                                    </p>
                                </div>

                                <!-- Pricing -->
                                <div class="text-right">
                                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">Quantity</p>
                                    <p class="text-2xl font-bold text-gray-900 dark:text-white mb-3">{{ item.quantity }}</p>
                                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">Unit Price</p>
                                    <p class="text-lg font-semibold text-gray-900 dark:text-white mb-3">{{ parseFloat(item.unit_price) }} DT</p>
                                    <div class="pt-3 border-t border-gray-300 dark:border-gray-600">
                                        <p class="text-sm text-gray-600 dark:text-gray-400">Subtotal</p>
                                        <p class="text-xl font-bold text-amber-700 dark:text-amber-400">{{ (item.quantity * item.unit_price) }} DT</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Totals -->
                        <div class="mt-6 pt-6 border-t border-gray-200 dark:border-gray-700">
                            <div class="flex justify-end mb-2">
                                <div class="w-64">
                                    <div class="flex justify-between items-center mb-3">
                                        <span class="text-gray-600 dark:text-gray-400">Subtotal:</span>
                                        <span class="text-gray-900 dark:text-white">{{ parseFloat(order.total_price) }} DT</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Shipping Address Section -->
                <div v-if="order.user_address" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden">
                        <div class="bg-gradient-to-r from-amber-50 to-orange-50 dark:from-gray-700 dark:to-gray-600 p-6 border-b border-amber-200 dark:border-gray-600">
                            <h2 class="text-lg font-bold text-gray-900 dark:text-white flex items-center">
                                <svg class="w-5 h-5 mr-2 text-amber-600 dark:text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                Shipping Address
                            </h2>
                        </div>
                        <div class="p-6">
                            <div class="text-gray-700 dark:text-gray-300 space-y-2">
                                <p class="font-semibold">{{ order.user_address.adresse1 }}</p>
                                <p v-if="order.user_address.adresse2">{{ order.user_address.adresse2 }}</p>
                                <p>{{ order.user_address.city }}, {{ order.user_address.state }}</p>
                                <p class="font-medium">{{ order.user_address.country_code }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden">
                        <div class="bg-gradient-to-r from-amber-50 to-orange-50 dark:from-gray-700 dark:to-gray-600 p-6 border-b border-amber-200 dark:border-gray-600">
                            <h2 class="text-lg font-bold text-gray-900 dark:text-white flex items-center">
                                <svg class="w-5 h-5 mr-2 text-amber-600 dark:text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                Order Summary
                            </h2>
                        </div>
                        <div class="p-6 space-y-4">
                            <div class="flex justify-between items-center py-2 border-b border-gray-200 dark:border-gray-700">
                                <span class="text-gray-600 dark:text-gray-400">Subtotal</span>
                                <span class="text-gray-900 dark:text-white">{{ parseFloat(order.total_price) }}DT</span>
                            </div>
                            <div class="flex justify-between items-center py-2 border-b border-gray-200 dark:border-gray-700">
                                <span class="text-gray-600 dark:text-gray-400">Shipping</span>
                                <span class="text-gray-900 dark:text-white">8 DT</span>
                            </div>
                            <div class="flex justify-between items-center py-3 pt-4">
                                <span class="font-semibold text-gray-900 dark:text-white">Total</span>
                                <span class="text-2xl font-bold text-amber-700 dark:text-amber-400">{{ parseFloat(order.total_price) + 8 }}DT</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="mt-8 flex gap-4 justify-center">
                    <Link :href="route('orders.index')"
                        class="inline-flex items-center px-6 py-3 bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-white font-semibold rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors duration-200">
                        Back to Orders
                    </Link>
                    <Link :href="route('home')"
                        class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-amber-600 to-orange-600 text-white font-semibold rounded-lg hover:from-amber-700 hover:to-orange-700 transition-all duration-300 shadow-md hover:shadow-lg">
                        Continue Shopping
                    </Link>
                </div>
            </div>
        </div>
    </UserLayouts>
</template>

<style scoped>
</style>
