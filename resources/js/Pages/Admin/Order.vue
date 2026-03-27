<script setup>
import { ref, computed } from 'vue'
import { router, Head, Link } from '@inertiajs/vue3'
import AdminLayout from './Components/AdminLayout.vue'
import Swal from 'sweetalert2'

const props = defineProps({
    orders: {
        type: Object,
        default: () => ({
            data: [],
            from: 0,
            to: 0,
            total: 0,
            links: []
        })
    },
    filters: {
        type: Object,
        default: () => ({
            search: '',
            status: ''
        })
    },
    statistics: {
        type: Object,
        default: () => ({
            total: 0,
            pending: 0,
            processing: 0,
            shipped: 0,
            delivered: 0,
            cancelled: 0,
            total_revenue: 0
        })
    }
})

const search = ref(props.filters?.search || '')
const statusFilter = ref(props.filters?.status || '')

const searchOrders = () => {
    router.get(route('admin.orders.index'), {
        search: search.value,
        status: statusFilter.value
    }, {
        preserveState: true,
        preserveScroll: true
    })
}

const clearFilters = () => {
    search.value = ''
    statusFilter.value = ''
    router.get(route('admin.orders.index'))
}

const updateStatus = (orderId, newStatus) => {
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
            router.patch(route('admin.orders.updateStatus', orderId), {
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

const deleteOrder = (orderId) => {
    Swal.fire({
        title: 'Delete Order?',
        text: "This action cannot be undone!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#DC2626',
        cancelButtonColor: '#6B7280',
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            router.delete(route('admin.orders.destroy', orderId), {
                preserveScroll: true,
                onSuccess: () => {
                    Swal.fire({
                        title: 'Deleted!',
                        text: 'Order has been deleted.',
                        icon: 'success',
                        confirmButtonColor: '#D97706',
                        timer: 2000
                    })
                }
            })
        }
    })
}

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

const getShippingCost = () => 8; // Fixed shipping cost
</script>

<template>
    <AdminLayout>
        <Head title="Orders Management" />

        <div class="py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                <!-- Page Header -->
                <div class="mb-8">
                    <h1 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-amber-700 to-orange-600 dark:from-amber-400 dark:to-orange-300">
                        Orders Management
                    </h1>
                    <p class="mt-2 text-gray-600 dark:text-gray-400">
                        Manage and track customer orders
                    </p>
                </div>

                <!-- Statistics Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <!-- Total Orders -->
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-amber-200 dark:border-gray-700 p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Orders</p>
                                <p class="text-3xl font-bold text-gray-900 dark:text-white mt-2">
                                    {{ statistics.total }}
                                </p>
                            </div>
                            <div class="p-3 bg-amber-100 dark:bg-amber-900/30 rounded-lg">
                                <svg class="w-8 h-8 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Pending Orders -->
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-yellow-200 dark:border-gray-700 p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Pending</p>
                                <p class="text-3xl font-bold text-yellow-600 dark:text-yellow-400 mt-2">
                                    {{ statistics.pending }}
                                </p>
                            </div>
                            <div class="p-3 bg-yellow-100 dark:bg-yellow-900/30 rounded-lg">
                                <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Delivered Orders -->
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-green-200 dark:border-gray-700 p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Delivered</p>
                                <p class="text-3xl font-bold text-green-600 dark:text-green-400 mt-2">
                                    {{ statistics.delivered }}
                                </p>
                            </div>
                            <div class="p-3 bg-green-100 dark:bg-green-900/30 rounded-lg">
                                <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Total Revenue -->
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-amber-200 dark:border-gray-700 p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Revenue</p>
                                <p class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-amber-700 to-orange-600 mt-2">
                                    {{ (Number(statistics.total_revenue) || 0).toFixed(2) }} DT
                                </p>
                            </div>
                            <div class="p-3 bg-amber-100 dark:bg-amber-900/30 rounded-lg">
                                <svg class="w-8 h-8 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Filters & Search -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-amber-200 dark:border-gray-700 p-6 mb-8">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <!-- Search -->
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Search Orders
                            </label>
                            <input type="text" v-model="search" @keyup.enter="searchOrders"
                                placeholder="Order ID, customer name or email..."
                                class="w-full bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg px-4 py-2 text-gray-900 dark:text-white focus:ring-2 focus:ring-amber-500 focus:border-amber-500">
                        </div>

                        <!-- Status Filter -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Order Status
                            </label>
                            <select v-model="statusFilter" @change="searchOrders"
                                class="w-full bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg px-4 py-2 text-gray-900 dark:text-white focus:ring-2 focus:ring-amber-500 focus:border-amber-500">
                                <option value="">All Statuses</option>
                                <option value="pending">Pending</option>
                                <option value="processing">Processing</option>
                                <option value="shipped">Shipped</option>
                                <option value="delivered">Delivered</option>
                                <option value="cancelled">Cancelled</option>
                            </select>
                        </div>
                    </div>

                    <div class="flex justify-end mt-4 space-x-3">
                        <button @click="clearFilters"
                            class="px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors">
                            Clear Filters
                        </button>
                        <button @click="searchOrders"
                            class="px-4 py-2 bg-gradient-to-r from-amber-600 to-orange-600 text-white rounded-lg hover:from-amber-700 hover:to-orange-700 transition-all">
                            Apply Filters
                        </button>
                    </div>
                </div>

                <!-- Orders Table -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-amber-200 dark:border-gray-700 overflow-hidden">
                    
                    <!-- Table Header -->
                    <div class="bg-gradient-to-r from-amber-50 to-orange-50 dark:from-gray-700 dark:to-gray-600 px-6 py-4 border-b border-amber-200 dark:border-gray-600">
                        <h2 class="text-xl font-bold text-gray-900 dark:text-white flex items-center">
                            <svg class="w-6 h-6 mr-2 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
                            </svg>
                            All Orders ({{ orders?.total || 0 }})
                        </h2>
                    </div>

                    <!-- Empty State -->
                    <div v-if="(orders?.data?.length || 0) === 0" class="p-12 text-center">
                        <svg class="w-24 h-24 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                        </svg>
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">No orders found</h3>
                        <p class="text-gray-600 dark:text-gray-400">Try adjusting your filters or search criteria</p>
                    </div>

                    <!-- Table -->
                    <div v-else class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-50 dark:bg-gray-700/50">
                                <tr>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                        Order
                                    </th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                        Customer
                                    </th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                        Date
                                    </th>
                                    <th class="px-6 py-4 text-center text-xs font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                        Items
                                    </th>
                                    <th class="px-6 py-4 text-right text-xs font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                        Total
                                    </th>
                                    <th class="px-6 py-4 text-center text-xs font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                        Status
                                    </th>
                                    <th class="px-6 py-4 text-center text-xs font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                <tr v-for="order in (orders?.data || [])" :key="order.id" 
                                    class="hover:bg-amber-50/50 dark:hover:bg-gray-700/50 transition-colors">
                                    
                                    <!-- Order Number -->
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div>
                                                <div class="text-sm font-bold text-gray-900 dark:text-white">
                                                    {{ order.order_number || '#' + String(order.id).padStart(6, '0') }}
                                                </div>
                                                <div class="text-xs text-gray-500 dark:text-gray-400">
                                                    ID: #{{ order.id }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    <!-- Customer -->
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900 dark:text-white">
                                            {{ order.creator?.name || 'N/A' }}
                                        </div>
                                        <div class="text-xs text-gray-500 dark:text-gray-400">
                                            {{ order.creator?.email || 'N/A' }}
                                        </div>
                                    </td>

                                    <!-- Date -->
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900 dark:text-white">
                                            {{ formatDate(order.created_at) }}
                                        </div>
                                    </td>

                                    <!-- Items Count -->
                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300">
                                            {{ order.items?.length || 0 }} items
                                        </span>
                                    </td>

                                    <!-- Total -->
                                    <td class="px-6 py-4 whitespace-nowrap text-right">
                                        <div class="text-lg font-bold text-transparent bg-clip-text bg-gradient-to-r from-amber-700 to-orange-600 dark:from-amber-400 dark:to-orange-300">
                                            {{ order.total_price || '0.00' }} DT
                                        </div>
                                    </td>

                                    <!-- Order Status -->
                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        <select :value="order.status" 
                                            @change="updateStatus(order.id, $event.target.value)"
                                            :class="[getStatusColor(order.status), 'text-xs font-medium px-3 py-1.5 rounded-full border-0 cursor-pointer focus:ring-2 focus:ring-amber-500 transition-all']">
                                            <option value="pending">Pending</option>
                                            <option value="processing">Processing</option>
                                            <option value="shipped">Shipped</option>
                                            <option value="delivered">Delivered</option>
                                            <option value="cancelled">Cancelled</option>
                                        </select>
                                    </td>

                                    <!-- Actions -->
                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        <div class="flex items-center justify-center space-x-2">
                                            <Link :href="route('admin.orders.show', order.id)"
                                                class="inline-flex items-center px-3 py-2 bg-amber-100 hover:bg-amber-200 dark:bg-amber-900/30 dark:hover:bg-amber-900/50 text-amber-700 dark:text-amber-400 rounded-lg transition-all">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                                </svg>
                                            </Link>
                                            <button @click="deleteOrder(order.id)"
                                                class="inline-flex items-center px-3 py-2 bg-red-100 hover:bg-red-200 dark:bg-red-900/30 dark:hover:bg-red-900/50 text-red-700 dark:text-red-400 rounded-lg transition-all">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div v-if="orders?.data?.length > 0" class="bg-gray-50 dark:bg-gray-700/50 px-6 py-4 border-t border-gray-200 dark:border-gray-700">
                        <div class="flex items-center justify-between">
                            <div class="text-sm text-gray-700 dark:text-gray-300">
                                Showing <span class="font-medium">{{ orders?.from || 0 }}</span> to <span class="font-medium">{{ orders?.to || 0 }}</span> of <span class="font-medium">{{ orders?.total || 0 }}</span> orders
                            </div>
                            <div class="flex space-x-2">
                                <Link v-for="(link, index) in (orders?.links || [])" :key="link.label || index" 
    :href="link.url || '#'" 
    v-html="link.label || ''"
    :class="[
        link.active 
            ? 'bg-amber-600 text-white' 
            : 'bg-white dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-600',
        'px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 text-sm font-medium transition-all',
        !link.url && 'opacity-50 cursor-not-allowed'
    ]"
    :disabled="!link.url"
/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>