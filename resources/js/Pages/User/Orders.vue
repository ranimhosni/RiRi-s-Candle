<script setup>
import { computed } from 'vue';
import UserLayouts from './Layouts/UserLayouts.vue';
import { Link } from '@inertiajs/vue3';

defineProps({
    orders: Array
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
        day: 'numeric'
    });
};
</script>

<template>
    <UserLayouts>
        <div class="pt-24 pb-12">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Header -->
                <div class="mb-8">
                    <h1 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-2">
                        My Orders
                    </h1>
                    <p class="text-gray-600 dark:text-gray-400">
                        View and track your order history
                    </p>
                </div>

                <!-- Empty State -->
                <div v-if="!orders || orders.length === 0" class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-12 text-center">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                    <h3 class="mt-4 text-lg font-medium text-gray-900 dark:text-white">No orders yet</h3>
                    <p class="mt-2 text-gray-600 dark:text-gray-400 mb-6">
                        You haven't placed any orders yet. Start shopping to see your orders here.
                    </p>
                    <Link :href="route('home')"
                        class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-amber-600 to-orange-600 text-white font-semibold rounded-lg hover:from-amber-700 hover:to-orange-700 transition-all duration-300 shadow-md hover:shadow-lg">
                        Continue Shopping
                    </Link>
                </div>

                <!-- Orders List -->
                <div v-else class="space-y-4">
                    <div v-for="order in orders" :key="order.id" 
                        class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                        
                        <!-- Order Header -->
                        <div class="bg-gradient-to-r from-amber-50 to-orange-50 dark:from-gray-700 dark:to-gray-600 p-6 border-b border-amber-200 dark:border-gray-600">
                            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                                <!-- Order Number -->
                                <div>
                                    <p class="text-sm text-gray-600 dark:text-gray-400 font-medium">Order Number</p>
                                    <p class="text-lg font-bold text-gray-900 dark:text-white">{{ '#' + String(order.id).padStart(6, '0') }}</p>
                                </div>

                                <!-- Order Date -->
                                <div>
                                    <p class="text-sm text-gray-600 dark:text-gray-400 font-medium">Date</p>
                                    <p class="text-lg font-semibold text-gray-900 dark:text-white">{{ formatDate(order.created_at) }}</p>
                                </div>

                                <!-- Total Amount -->
                                <div>
                                    <p class="text-sm text-gray-600 dark:text-gray-400 font-medium">Total</p>
                                    <p class="text-lg font-bold text-amber-700 dark:text-amber-400">{{ parseFloat(order.total_price) + 8}} DT</p>
                                </div>

                                <!-- Status -->
                                <div>
                                    <p class="text-sm text-gray-600 dark:text-gray-400 font-medium">Status</p>
                                    <span :class="['px-3 py-1 inline-flex items-center text-xs font-semibold rounded-full', getStatusColor(order.status)]">
                                        {{ getStatusLabel(order.status) }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Order Items -->
                        <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                            <h3 class="text-sm font-semibold text-gray-900 dark:text-white mb-4">Items</h3>
                            <div class="space-y-3">
                                <div v-for="item in order.items" :key="item.id" 
                                    class="flex items-center gap-4 p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                    
                                    <!-- Product Image -->
                                    <div class="flex-shrink-0 w-16 h-16">
                                        <img v-if="item.product && item.product.product_images && item.product.product_images.length > 0"
                                            :src="`/${item.product.product_images[0].image}`"
                                            :alt="item.product.name"
                                            class="w-full h-full object-cover rounded-md">
                                        <img v-else
                                            src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/65/No-Image-Placeholder.svg/330px-No-Image-Placeholder.svg.png"
                                            alt="No image"
                                            class="w-full h-full object-cover rounded-md">
                                    </div>

                                    <!-- Product Info -->
                                    <div class="flex-grow">
                                        <p v-if="item.product" class="font-semibold text-gray-900 dark:text-white">
                                            {{ item.product.name }}
                                        </p>
                                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                                            Quantity: <span class="font-medium">{{ item.quantity }}</span>
                                        </p>
                                    </div>

                                    <!-- Price -->
                                    <div class="text-right">
                                        <p class="text-sm text-gray-600 dark:text-gray-400">Unit Price</p>
                                        <p class="font-semibold text-gray-900 dark:text-white">{{ parseFloat(item.unit_price) }} DT</p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                            Subtotal: {{ (item.quantity * item.unit_price) }}DT
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Shipping Address -->
                        <div v-if="order.user_address" class="p-6 border-b border-gray-200 dark:border-gray-700">
                            <h3 class="text-sm font-semibold text-gray-900 dark:text-white mb-3">Shipping Address</h3>
                            <div class="text-sm text-gray-600 dark:text-gray-400">
                                <p>{{ order.user_address.adresse1 }}</p>
                                <p v-if="order.user_address.adresse2">{{ order.user_address.adresse2 }}</p>
                                <p>{{ order.user_address.city }}, {{ order.user_address.state }} {{ order.user_address.country_code }}</p>
                            </div>
                        </div>

                        <!-- Footer with Action -->
                        <div class="p-6 bg-gray-50 dark:bg-gray-700 flex justify-between items-center">
                            <div class="text-sm text-gray-600 dark:text-gray-400">
                                Order placed on <span class="font-semibold">{{ formatDate(order.created_at) }}</span>
                            </div>
                            <Link :href="route('orders.detail', order.id)"
                                class="inline-flex items-center px-4 py-2 bg-amber-600 text-white font-medium rounded-lg hover:bg-amber-700 transition-colors duration-200">
                                View Details
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </UserLayouts>
</template>

<style scoped>
</style>
