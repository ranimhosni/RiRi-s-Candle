<template>
  <AdminLayout>
    <div class="p-6">
      <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-8">Admin Dashboard</h1>

      <!-- Stats Cards Grid -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Total Products Card -->
        <div
          class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 border-l-4 border-blue-500 hover:shadow-lg transition"
        >
          <div class="flex items-center justify-between">
            <div>
              <p class="text-gray-500 dark:text-gray-400 text-sm font-semibold mb-2">
                Total Products
              </p>
              <p class="text-3xl font-bold text-gray-900 dark:text-white">
                {{ totalProducts }}
              </p>
            </div>
            <div
              class="w-12 h-12 bg-blue-100 dark:bg-blue-900 rounded-lg flex items-center justify-center"
            >
              <svg
                class="w-6 h-6 text-blue-600 dark:text-blue-300"
                fill="currentColor"
                viewBox="0 0 20 20"
              >
                <path
                  d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 6H6.28l-.31-1.243A1 1 0 005 4H3a1 1 0 000 2h1l1 4v1a1 1 0 11-2 0V7H3a1 1 0 010-2zm9 5.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z"
                />
              </svg>
            </div>
          </div>
        </div>

        <!-- Total Orders Card -->
        <div
          class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 border-l-4 border-green-500 hover:shadow-lg transition"
        >
          <div class="flex items-center justify-between">
            <div>
              <p class="text-gray-500 dark:text-gray-400 text-sm font-semibold mb-2">
                Total Orders
              </p>
              <p class="text-3xl font-bold text-gray-900 dark:text-white">
                {{ totalOrders }}
              </p>
            </div>
            <div
              class="w-12 h-12 bg-green-100 dark:bg-green-900 rounded-lg flex items-center justify-center"
            >
              <svg
                class="w-6 h-6 text-green-600 dark:text-green-300"
                fill="currentColor"
                viewBox="0 0 20 20"
              >
                <path
                  d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 6H6.28l-.31-1.243A1 1 0 005 4H3a1 1 0 000 2h1l1 4v1a1 1 0 11-2 0V7H3a1 1 0 010-2zm9 5.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z"
                />
              </svg>
            </div>
          </div>
        </div>

        <!-- Pending Orders Card (Placeholder) -->
        <div
          class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 border-l-4 border-yellow-500 hover:shadow-lg transition"
        >
          <div class="flex items-center justify-between">
            <div>
              <p class="text-gray-500 dark:text-gray-400 text-sm font-semibold mb-2">
                Pending Orders
              </p>
              <p class="text-3xl font-bold text-gray-900 dark:text-white">0</p>
            </div>
            <div
              class="w-12 h-12 bg-yellow-100 dark:bg-yellow-900 rounded-lg flex items-center justify-center"
            >
              <svg
                class="w-6 h-6 text-yellow-600 dark:text-yellow-300"
                fill="currentColor"
                viewBox="0 0 20 20"
              >
                <path
                  fill-rule="evenodd"
                  d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v3.5H7a1 1 0 100 2h4a1 1 0 001-1V7z"
                  clip-rule="evenodd"
                />
              </svg>
            </div>
          </div>
        </div>

        <!-- Total Revenue Card (Placeholder) -->
        <div
          class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 border-l-4 border-purple-500 hover:shadow-lg transition"
        >
          <div class="flex items-center justify-between">
            <div>
              <p class="text-gray-500 dark:text-gray-400 text-sm font-semibold mb-2">
                Total Revenue
              </p>
              <p class="text-3xl font-bold text-gray-900 dark:text-white">$0</p>
            </div>
            <div
              class="w-12 h-12 bg-purple-100 dark:bg-purple-900 rounded-lg flex items-center justify-center"
            >
              <svg
                class="w-6 h-6 text-purple-600 dark:text-purple-300"
                fill="currentColor"
                viewBox="0 0 20 20"
              >
                <path
                  d="M8.16 5.314l4.897-1.596A1 1 0 0115 4.97v10.394a1 1 0 01-1.282.97l-4.897-1.596A1 1 0 0110 13.05V5.747a1 1 0 01.16-.433zM9 5v8l4 1.305V6.304L9 5z"
                />
                <path d="M5 12a2 2 0 11-4 0 2 2 0 014 0z" />
              </svg>
            </div>
          </div>
        </div>
      </div>

      <!-- Main Content Grid -->
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Products Summary -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
          <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-4">
            Products Summary
          </h2>
          <div class="space-y-4">
            <div class="flex items-center justify-between p-3 bg-gray-50 dark:bg-gray-700 rounded">
              <span class="text-gray-700 dark:text-gray-300">In Stock</span>
              <span class="font-semibold text-blue-600 dark:text-blue-400">-</span>
            </div>
            <div class="flex items-center justify-between p-3 bg-gray-50 dark:bg-gray-700 rounded">
              <span class="text-gray-700 dark:text-gray-300">Out of Stock</span>
              <span class="font-semibold text-red-600 dark:text-red-400">-</span>
            </div>
            <div class="flex items-center justify-between p-3 bg-gray-50 dark:bg-gray-700 rounded">
              <span class="text-gray-700 dark:text-gray-300">Total Products</span>
              <span class="font-semibold text-green-600 dark:text-green-400">
                {{ totalProducts }}
              </span>
            </div>
          </div>
        </div>

        <!-- Orders Summary -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
          <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-4">
            Orders Summary
          </h2>
          <div class="space-y-4">
            <div class="flex items-center justify-between p-3 bg-gray-50 dark:bg-gray-700 rounded">
              <span class="text-gray-700 dark:text-gray-300">Completed</span>
              <span class="font-semibold text-green-600 dark:text-green-400">-</span>
            </div>
            <div class="flex items-center justify-between p-3 bg-gray-50 dark:bg-gray-700 rounded">
              <span class="text-gray-700 dark:text-gray-300">Pending</span>
              <span class="font-semibold text-yellow-600 dark:text-yellow-400">-</span>
            </div>
            <div class="flex items-center justify-between p-3 bg-gray-50 dark:bg-gray-700 rounded">
              <span class="text-gray-700 dark:text-gray-300">Total Orders</span>
              <span class="font-semibold text-blue-600 dark:text-blue-400">
                {{ totalOrders }}
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </AdminLayout>
</template>

<script setup>
import { onMounted } from 'vue'
import { initFlowbite } from 'flowbite'
import AdminLayout from './Components/AdminLayout.vue'

defineProps({
  totalProducts: {
    type: Number,
    default: 0,
  },
  totalOrders: {
    type: Number,
    default: 0,
  },
})

// initialize components based on data attribute selectors
onMounted(() => {
  initFlowbite()
})
</script>