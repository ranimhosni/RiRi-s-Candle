<template>
  <AdminLayout>
    <div class="p-6">
      <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-8">Admin Dashboard</h1>

      <!-- Pie Chart Container -->
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Pie Chart -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
          <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-6">Dashboard Statistics</h2>
          <div style="position: relative; height: 300px;">
            <Pie
              :data="chartData"
              :options="chartOptions"
            />
          </div>
        </div>

        <!-- Stats Summary -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
          <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-6">Summary</h2>
          <div class="space-y-4">
            <div class="flex items-center justify-between p-4 bg-blue-50 dark:bg-blue-900/20 rounded-lg">
              <span class="text-gray-700 dark:text-gray-300 font-semibold">Total Products</span>
              <span class="text-2xl font-bold text-blue-600 dark:text-blue-400">{{ totalProducts }}</span>
            </div>
            <div class="flex items-center justify-between p-4 bg-green-50 dark:bg-green-900/20 rounded-lg">
              <span class="text-gray-700 dark:text-gray-300 font-semibold">Total Orders</span>
              <span class="text-2xl font-bold text-green-600 dark:text-green-400">{{ totalOrders }}</span>
            </div>
            <div class="flex items-center justify-between p-4 bg-yellow-50 dark:bg-yellow-900/20 rounded-lg">
              <span class="text-gray-700 dark:text-gray-300 font-semibold">Pending Orders</span>
              <span class="text-2xl font-bold text-yellow-600 dark:text-yellow-400">0</span>
            </div>
            <div class="flex items-center justify-between p-4 bg-purple-50 dark:bg-purple-900/20 rounded-lg">
              <span class="text-gray-700 dark:text-gray-300 font-semibold">Total Revenue</span>
              <span class="text-2xl font-bold text-purple-600 dark:text-purple-400">0DT</span>
            </div>
          </div>
        </div>
      </div>

     </div>
  </AdminLayout>
</template>

<script setup>
import { onMounted, computed } from 'vue'
import { initFlowbite } from 'flowbite'
import { Pie } from 'vue-chartjs'
import { Chart as ChartJS, ArcElement, Tooltip, Legend, Title } from 'chart.js'
import AdminLayout from './Components/AdminLayout.vue'

ChartJS.register(ArcElement, Tooltip, Legend, Title)

const props = defineProps({
  totalProducts: {
    type: Number,
    default: 0,
  },
  totalOrders: {
    type: Number,
    default: 0,
  },
})

const chartData = computed(() => ({
  labels: ['Total Products', 'Total Orders', 'Pending Orders', 'Total Revenue'],
  datasets: [
    {
      label: 'Dashboard Overview',
      data: [props.totalProducts, props.totalOrders, 0, 0],
      backgroundColor: [
        '#3B82F6',
        '#10B981',
        '#FBBF24',
        '#A855F7',
      ],
      borderColor: [
        '#1E40AF',
        '#047857',
        '#D97706',
        '#7E22CE',
      ],
      borderWidth: 2,
    },
  ],
}))

const chartOptions = {
  responsive: true,
  maintainAspectRatio: false,
  plugins: {
    legend: {
      position: 'bottom',
      labels: {
        padding: 20,
        font: {
          size: 14,
          weight: 'bold',
        },
      },
    },
    title: {
      display: false,
    },
    tooltip: {
      callbacks: {
        label: function(context) {
          return context.label + ': ' + context.parsed
        }
      }
    }
  },
}

// initialize components based on data attribute selectors
onMounted(() => {
  initFlowbite()
})
</script>