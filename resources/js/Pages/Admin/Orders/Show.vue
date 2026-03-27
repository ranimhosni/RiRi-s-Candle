<script setup>
import { router, Head, Link } from '@inertiajs/vue3'
import AdminLayout from '../Components/AdminLayout.vue'
import Swal from 'sweetalert2'

const props = defineProps({
    order: {
        type: Object,
        required: true
    }
})

const getStatusColor = (status) => {
    if (!status) return 'bg-gray-100 text-gray-800 dark:bg-gray-700/30 dark:text-gray-400'
    const colors = {
        pending: 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-400',
        processing: 'bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-400',
        shipped: 'bg-purple-100 text-purple-800 dark:bg-purple-900/30 dark:text-purple-400',
        delivered: 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400',
        cancelled: 'bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400'
    }
    return colors[status] || 'bg-gray-100 text-gray-800 dark:bg-gray-700/30 dark:text-gray-400'
}

const formatDate = (date) => {
    if (!date) return 'N/A'
    return new Date(date).toLocaleDateString('en-US', {
        year: 'numeric',
        month: 'short',
        day: 'numeric',
        hour: '2-digit',
        minute: '2-digit'
    })
}

const updateStatus = (newStatus) => {
    Swal.fire({
        title: 'Update Order Status?',
        text: `Change status to ${newStatus}?`,
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#D97706',
        cancelButtonColor: '#6B7280',
        confirmButtonText: 'Yes, update it!',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            router.patch(route('admin.orders.updateStatus', props.order.id), {
                status: newStatus
            }, {
                preserveScroll: true,
                onSuccess: () => {
                    Swal.fire({
                        title: 'Updated!',
                        text: 'Order status has been updated.',
                        icon: 'success',
                        confirmButtonColor: '#D97706',
                        timer: 2000
                    })
                }
            })
        }
    })
}

const handleImageError = (event) => {
    event.target.style.display = 'none'
}
</script>

<template>
    <AdminLayout>
        <Head :title="`Order ${order?.order_number || '#' + String(order?.id).padStart(6, '0')}`" />

        <div class="py-12">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

                <!-- Header -->
                <div class="mb-8 flex items-center justify-between">
                    <div>
                        <h1 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-amber-700 to-orange-600 dark:from-amber-400 dark:to-orange-300">
                            {{ order?.order_number || '#' + String(order?.id).padStart(6, '0') }}
                        </h1>
                        <p class="mt-2 text-gray-600 dark:text-gray-400">
                            Order Details &amp; Management
                        </p>
                    </div>
                    <Link :href="route('admin.orders.index')"
                        class="px-6 py-2 bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors">
                        ← Back to Orders
                    </Link>
                </div>

                <!-- Order Status Card -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-amber-200 dark:border-gray-700 p-6 mb-8">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- Status -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Order Status
                            </label>
                            <select :value="order?.status || ''" 
                                @change="updateStatus($event.target.value)"
                                :class="[getStatusColor(order?.status), 'w-full text-sm font-medium px-4 py-2 rounded-lg border-0 cursor-pointer focus:ring-2 focus:ring-amber-500 transition-all']">
                                <option value="">Select Status</option>
                                <option value="pending">Pending</option>
                                <option value="processing">Processing</option>
                                <option value="shipped">Shipped</option>
                                <option value="delivered">Delivered</option>
                                <option value="cancelled">Cancelled</option>
                            </select>
                        </div>

                        <!-- Order Date -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Order Date
                            </label>
                            <p class="text-lg font-semibold text-gray-900 dark:text-white">
                                {{ formatDate(order?.created_at) }}
                            </p>
                        </div>

                        <!-- Total Amount -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Total Amount
                            </label>
                            <p class="text-lg font-bold text-transparent bg-clip-text bg-gradient-to-r from-amber-700 to-orange-600 dark:from-amber-400 dark:to-orange-300">
                                {{ (Number(order?.total_price) || 0).toFixed(2) }} DT
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Customer Information -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-amber-200 dark:border-gray-700 p-6 mb-8">
                    <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Customer Information</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Name -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                Full Name
                            </label>
                            <p class="text-lg text-gray-900 dark:text-white">{{ order?.creator?.name || 'N/A' }}</p>
                        </div>

                        <!-- Email -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                Email Address
                            </label>
                            <p class="text-lg text-gray-900 dark:text-white break-words">{{ order?.creator?.email || 'N/A' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Shipping Address -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-amber-200 dark:border-gray-700 p-6 mb-8">
                    <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Shipping Address</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Address 1 -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                Address
                            </label>
                            <p class="text-gray-900 dark:text-white">{{ order?.userAddress?.adresse1 || 'N/A' }}</p>
                        </div>

                        <!-- City -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                City
                            </label>
                            <p class="text-gray-900 dark:text-white">{{ order?.userAddress?.city || 'N/A' }}</p>
                        </div>

                        <!-- State -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                State
                            </label>
                            <p class="text-gray-900 dark:text-white">{{ order?.userAddress?.state || 'N/A' }}</p>
                        </div>

                        <!-- Country Code -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                Country
                            </label>
                            <p class="text-gray-900 dark:text-white">{{ order?.userAddress?.country_code || 'N/A' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Order Items -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-amber-200 dark:border-gray-700 overflow-hidden">
                    <div class="bg-gradient-to-r from-amber-50 to-orange-50 dark:from-gray-700 dark:to-gray-600 px-6 py-4 border-b border-amber-200 dark:border-gray-600">
                        <h2 class="text-xl font-bold text-gray-900 dark:text-white">Order Items ({{ order?.items?.length || 0 }})</h2>
                    </div>

                    <div v-if="(order?.items?.length || 0) === 0" class="p-12 text-center">
                        <p class="text-gray-600 dark:text-gray-400">No items in this order</p>
                    </div>

                    <div v-else class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-50 dark:bg-gray-700/50 border-b border-gray-200 dark:border-gray-700">
                                <tr>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                        Image
                                    </th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                        Product
                                    </th>
                                    <th class="px-6 py-4 text-center text-xs font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                        Quantity
                                    </th>
                                    <th class="px-6 py-4 text-right text-xs font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                        Unit Price
                                    </th>
                                    <th class="px-6 py-4 text-right text-xs font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                        Subtotal
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                <tr v-for="item in (order?.items || [])" :key="item.id"
                                    class="hover:bg-amber-50/50 dark:hover:bg-gray-700/50 transition-colors">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div v-if="item?.product?.product_images?.[0]?.image" class="w-16 h-16 rounded-lg overflow-hidden border border-gray-300 dark:border-gray-600">
                                            <img :src="`/${item.product.product_images[0].image}`" 
                                                :alt="item?.product?.title || 'Product'" 
                                                class="w-full h-full object-cover"
                                                @error="handleImageError">
                                        </div>
                                        <div v-else class="w-16 h-16 rounded-lg bg-gray-200 dark:bg-gray-700 flex items-center justify-center border border-gray-300 dark:border-gray-600">
                                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm font-medium text-gray-900 dark:text-white">
                                            {{ item?.product?.title || 'Unknown Product' }}
                                        </div>
                                        <div class="text-xs text-gray-500 dark:text-gray-400">
                                            ID: #{{ item?.product_id }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300">
                                            {{ item?.quantity || 0 }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <div class="text-sm font-semibold text-gray-900 dark:text-white">
                                            {{ (Number(item?.unit_price) || 0).toFixed(2) }} DT
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <div class="text-sm font-bold text-transparent bg-clip-text bg-gradient-to-r from-amber-700 to-orange-600 dark:from-amber-400 dark:to-orange-300">
                                            {{ ((Number(item?.unit_price) || 0) * (Number(item?.quantity) || 1)).toFixed(2) }} DT
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Order Summary -->
                    <div class="bg-gray-50 dark:bg-gray-700/50 px-6 py-6 border-t border-gray-200 dark:border-gray-700">
                        <div class="flex justify-end">
                            <div class="w-full md:w-96">
                                <div class="flex justify-between mb-3">
                                    <span class="text-gray-700 dark:text-gray-300">Subtotal:</span>
                                    <span class="text-gray-900 dark:text-white font-semibold">
                                        {{ (Number(order?.total_price) * 0.95 || 0).toFixed(2) }} DT
                                    </span>
                                </div>
                                <div class="flex justify-between mb-3 pb-3 border-b border-gray-200 dark:border-gray-600">
                                    <span class="text-gray-700 dark:text-gray-300">Shipping:</span>
                                    <span class="text-gray-900 dark:text-white font-semibold">Free</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-lg font-bold text-gray-900 dark:text-white">Total:</span>
                                    <span class="text-lg font-bold text-transparent bg-clip-text bg-gradient-to-r from-amber-700 to-orange-600 dark:from-amber-400 dark:to-orange-300">
                                        {{ (Number(order?.total_price) || 0).toFixed(2) }} DT
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>
