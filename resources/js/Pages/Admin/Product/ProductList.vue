<script setup>
import { router, usePage } from '@inertiajs/vue3';
import { ref } from 'vue';
import Swal from 'sweetalert2';

defineProps({
    products: Array
});

const brands = usePage().props.brands;
const categories = usePage().props.categories;
const isAddProduct = ref(false);
const dialogVisible = ref(false);
const editMode = ref(false);

// Upload multiple images
const productImages = ref([]);
const dialogImageUrl = ref('');
const fileInputRef = ref(null);

const handleFileChange = (event) => {
    const files = Array.from(event.target.files);
    files.forEach(file => {
        productImages.value.push({
            raw: file,
            url: URL.createObjectURL(file),
            name: file.name
        });
    });
};

const removeImage = (index) => {
    URL.revokeObjectURL(productImages.value[index].url);
    productImages.value.splice(index, 1);
};

const id = ref('');
const title = ref('');
const price = ref('');
const quantity = ref('');
const description = ref('');
const product_images = ref([]);
const published = ref('');
const category_id = ref('');
const brand_id = ref('');
const inStock = ref('');

const openEditModal = (product) => {
    id.value = product.id;
    title.value = product.title;
    price.value = product.price;
    quantity.value = product.quantity;
    description.value = product.description;
    brand_id.value = product.brand_id;
    category_id.value = product.category_id;
    product_images.value = product.product_images || [];

    editMode.value = true;
    isAddProduct.value = false;
    dialogVisible.value = true;
};

const openAddModal = () => {
    resetFormData();
    isAddProduct.value = true;
    dialogVisible.value = true;
    editMode.value = false;
};

const AddProduct = async () => {
    const formData = new FormData();
    formData.append('title', title.value);
    formData.append('price', price.value);
    formData.append('quantity', quantity.value);
    formData.append('description', description.value);
    formData.append('brand_id', brand_id.value);
    formData.append('category_id', category_id.value);

    for (const image of productImages.value) {
        formData.append('product_images[]', image.raw);
    }

    try {
        await router.post('products/store', formData, {
            onSuccess: page => {
                Swal.fire({
                    toast: true,
                    icon: 'success',
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    title: page.props.flash.success
                });
                dialogVisible.value = false;
                resetFormData();
            },
        });
    } catch (err) {
        console.log(err);
    }
};

const deleteImage = async (pimage, index) => {
    try {
        await router.delete('/admin/products/image/' + pimage.id, {
            onSuccess: (page) => {
                product_images.value.splice(index, 1);
                Swal.fire({
                    toast: true,
                    icon: "success",
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 3000,
                    title: page.props.flash.success
                });
            }
        });
    } catch (err) {
        console.log(err);
    }
};

const updateProduct = async () => {
    const formData = new FormData();
    formData.append('title', title.value);
    formData.append('price', price.value);
    formData.append('quantity', quantity.value);
    formData.append('description', description.value);
    formData.append('category_id', category_id.value);
    formData.append('brand_id', brand_id.value);
    formData.append("_method", 'PUT');

    for (const image of productImages.value) {
        formData.append('product_images[]', image.raw);
    }

    try {
        await router.post('products/update/' + id.value, formData, {
            onSuccess: (page) => {
                dialogVisible.value = false;
                resetFormData();
                Swal.fire({
                    toast: true,
                    icon: "success",
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 3000,
                    title: page.props.flash.success
                });
            }
        });
    } catch (err) {
        console.log(err);
    }
};

const resetFormData = () => {
    id.value = '';
    title.value = '';
    price.value = '';
    quantity.value = '';
    description.value = '';
    category_id.value = '';
    brand_id.value = '';
    productImages.value.forEach(img => URL.revokeObjectURL(img.url));
    productImages.value = [];
    product_images.value = [];
    dialogImageUrl.value = '';
};

const deleteProduct = (product, index) => {
    Swal.fire({
        title: 'Delete Product?',
        text: "This action cannot be undone!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#D97706',
        cancelButtonColor: '#6B7280',
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            try {
                router.delete('products/destory/' + product.id, {
                    onSuccess: (page) => {
                        Swal.fire({
                            toast: true,
                            icon: "success",
                            position: "top-end",
                            showConfirmButton: false,
                            timer: 3000,
                            title: page.props.flash.success
                        });
                    }
                });
            } catch (err) {
                console.log(err);
            }
        }
    });
};

const togglePublished = async (product) => {
    try {
        await router.put(route('admin.products.toggle-published', product.id), {}, {
            onSuccess: () => {
                product.published = !product.published;
                Swal.fire({
                    toast: true,
                    icon: 'success',
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    title: 'Product published status updated successfully!'
                });
            }
        });
    } catch (err) {
        console.log(err);
    }
};

const toggleStock = async (product) => {
    try {
        await router.put(route('admin.products.toggle-stock', product.id), {}, {
            onSuccess: () => {
                product.inStock = !product.inStock;
                Swal.fire({
                    toast: true,
                    icon: 'success',
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    title: 'Product stock status updated successfully!'
                });
            }
        });
    } catch (err) {
        console.log(err);
    }
};
</script>

<template>
    <section class="bg-gradient-to-b from-white via-amber-50/30 to-orange-50/30 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 p-3 sm:p-5 min-h-screen">
        
        <!-- Custom Modal -->
        <Transition name="modal">
            <div v-if="dialogVisible" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                    <!-- Background overlay -->
                    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" @click="dialogVisible = false"></div>

                    <!-- Modal panel -->
                    <div class="inline-block align-bottom bg-white dark:bg-gray-800 rounded-2xl text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full border-2 border-amber-200 dark:border-gray-700">
                        <!-- Header -->
                        <div class="bg-gradient-to-r from-amber-50 to-orange-50 dark:from-gray-700 dark:to-gray-600 px-6 py-4 border-b-2 border-amber-200 dark:border-gray-700">
                            <div class="flex items-center justify-between">
                                <h3 class="text-xl font-bold text-gray-900 dark:text-white flex items-center">
                                    <svg class="w-6 h-6 mr-2 text-amber-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M4 3a2 2 0 100 4h12a2 2 0 100-4H4z"></path>
                                        <path fill-rule="evenodd" d="M3 8h14v7a2 2 0 01-2 2H5a2 2 0 01-2-2V8zm5 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                    {{ editMode ? 'Edit Product' : 'Add New Product' }}
                                </h3>
                                <button @click="dialogVisible = false" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <!-- Form Content -->
                        <form @submit.prevent="editMode ? updateProduct() : AddProduct()" class="p-6 space-y-6 max-h-[70vh] overflow-y-auto">
                            
                            <!-- Title Input -->
                            <div class="relative">
                                <input v-model="title" type="text" id="floating_title" required
                                    class="block px-4 py-3 w-full text-sm text-gray-900 dark:text-white bg-white dark:bg-gray-700 border-2 border-amber-200 dark:border-gray-600 rounded-xl appearance-none focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500 peer"
                                    placeholder=" " />
                                <label for="floating_title"
                                    class="absolute text-sm text-gray-600 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-700 px-2 peer-focus:px-2 peer-focus:text-amber-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-3">
                                    Product Title
                                </label>
                            </div>

                            <!-- Price & Quantity -->
                            <div class="grid grid-cols-2 gap-4">
                                <div class="relative">
                                    <input v-model="price" type="number" step="0.01" id="floating_price" required
                                        class="block px-4 py-3 w-full text-sm text-gray-900 dark:text-white bg-white dark:bg-gray-700 border-2 border-amber-200 dark:border-gray-600 rounded-xl appearance-none focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500 peer"
                                        placeholder=" " />
                                    <label for="floating_price"
                                        class="absolute text-sm text-gray-600 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-700 px-2 peer-focus:px-2 peer-focus:text-amber-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-3">
                                        Price (DT)
                                    </label>
                                </div>

                                <div class="relative">
                                    <input v-model="quantity" type="number" id="floating_qty" required
                                        class="block px-4 py-3 w-full text-sm text-gray-900 dark:text-white bg-white dark:bg-gray-700 border-2 border-amber-200 dark:border-gray-600 rounded-xl appearance-none focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500 peer"
                                        placeholder=" " />
                                    <label for="floating_qty"
                                        class="absolute text-sm text-gray-600 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-700 px-2 peer-focus:px-2 peer-focus:text-amber-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-3">
                                        Quantity
                                    </label>
                                </div>
                            </div>

                            <!-- Category & Brand -->
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block mb-2 text-sm font-semibold text-gray-700 dark:text-gray-300">
                                        Category
                                    </label>
                                    <select v-model="category_id" required
                                        class="bg-white dark:bg-gray-700 border-2 border-amber-200 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-xl focus:ring-2 focus:ring-amber-500 focus:border-amber-500 block w-full p-3">
                                        <option value="">Select Category</option>
                                        <option v-for="category in categories" :key="category.id" :value="category.id">
                                            {{ category.name }}
                                        </option>
                                    </select>
                                </div>

                                <div>
                                    <label class="block mb-2 text-sm font-semibold text-gray-700 dark:text-gray-300">
                                        Brand
                                    </label>
                                    <select v-model="brand_id" required
                                        class="bg-white dark:bg-gray-700 border-2 border-amber-200 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-xl focus:ring-2 focus:ring-amber-500 focus:border-amber-500 block w-full p-3">
                                        <option value="">Select Brand</option>
                                        <option v-for="brand in brands" :key="brand.id" :value="brand.id">
                                            {{ brand.name }}
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <!-- Description -->
                            <div>
                                <label class="block mb-2 text-sm font-semibold text-gray-700 dark:text-gray-300">
                                    Description
                                </label>
                                <textarea v-model="description" rows="4" required
                                    class="block p-3 w-full text-sm text-gray-900 dark:text-white bg-white dark:bg-gray-700 rounded-xl border-2 border-amber-200 dark:border-gray-600 focus:ring-2 focus:ring-amber-500 focus:border-amber-500"
                                    placeholder="Enter product description..."></textarea>
                            </div>

                            <!-- Upload Images -->
                            <div>
                                <label class="block mb-2 text-sm font-semibold text-gray-700 dark:text-gray-300">
                                    Product Images
                                </label>
                                <div class="flex items-center justify-center w-full">
                                    <label class="flex flex-col items-center justify-center w-full h-32 border-2 border-amber-300 dark:border-amber-700 border-dashed rounded-xl cursor-pointer bg-amber-50 dark:bg-gray-700 hover:bg-amber-100 dark:hover:bg-gray-600 transition-all duration-200">
                                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <svg class="w-8 h-8 mb-2 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                                            </svg>
                                            <p class="mb-2 text-sm text-gray-600 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                            <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG or WEBP (MAX. 800x400px)</p>
                                        </div>
                                        <input ref="fileInputRef" type="file" multiple accept="image/*" @change="handleFileChange" class="hidden" />
                                    </label>
                                </div>
                                
                                <!-- Preview New Images -->
                                <div v-if="productImages.length > 0" class="mt-4 grid grid-cols-4 gap-4">
                                    <div v-for="(image, index) in productImages" :key="index" class="relative group">
                                        <img :src="image.url" :alt="image.name"
                                            class="w-full h-24 rounded-lg object-cover border-2 border-amber-200 dark:border-gray-600">
                                        <button @click="removeImage(index)" type="button"
                                            class="absolute -top-2 -right-2 w-6 h-6 bg-red-500 hover:bg-red-600 text-white rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Existing Images (Edit Mode) -->
                            <div v-if="editMode && product_images.length > 0">
                                <label class="block mb-2 text-sm font-semibold text-gray-700 dark:text-gray-300">
                                    Current Images
                                </label>
                                <div class="grid grid-cols-4 gap-4">
                                    <div v-for="(pimage, index) in product_images" :key="pimage.id" class="relative group">
                                        <img class="w-full h-24 rounded-lg object-cover border-2 border-amber-200 dark:border-gray-600"
                                            :src="`/${pimage.image}`" alt="Product image">
                                        <button @click="deleteImage(pimage, index)" type="button"
                                            class="absolute -top-2 -right-2 w-6 h-6 bg-red-500 hover:bg-red-600 text-white rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Submit Buttons -->
                            <div class="flex justify-end space-x-3 pt-4 border-t-2 border-amber-200 dark:border-gray-700">
                                <button type="button" @click="dialogVisible = false"
                                    class="px-6 py-3 text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 border-2 border-gray-300 dark:border-gray-600 rounded-xl hover:bg-gray-50 dark:hover:bg-gray-600 transition-all duration-200">
                                    Cancel
                                </button>
                                <button type="submit"
                                    class="px-6 py-3 text-sm font-medium text-white bg-gradient-to-r from-amber-600 to-orange-600 hover:from-amber-700 hover:to-orange-700 rounded-xl shadow-lg hover:shadow-xl transition-all duration-200">
                                    <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    {{ editMode ? 'Update Product' : 'Add Product' }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </Transition>

        <div class="mx-auto max-w-screen-2xl px-4 lg:px-12">
            <!-- Products Table Container -->
            <div class="bg-white dark:bg-gray-800 relative shadow-2xl rounded-2xl overflow-hidden border-2 border-amber-200 dark:border-gray-700">
                
                <!-- Header Section -->
                <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-6 bg-gradient-to-r from-amber-50 to-orange-50 dark:from-gray-700 dark:to-gray-600 border-b-2 border-amber-200 dark:border-gray-700">
                    <div class="w-full md:w-1/2">
                        <form class="flex items-center">
                            <label for="simple-search" class="sr-only">Search</label>
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg class="w-5 h-5 text-amber-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input type="text" id="simple-search" placeholder="Search products..."
                                    class="bg-white dark:bg-gray-700 border-2 border-amber-200 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-xl focus:ring-2 focus:ring-amber-500 focus:border-amber-500 block w-full pl-10 p-3">
                            </div>
                        </form>
                    </div>
                    
                    <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                        <button type="button" @click="openAddModal"
                            class="flex items-center justify-center text-white bg-gradient-to-r from-amber-600 to-orange-600 hover:from-amber-700 hover:to-orange-700 focus:ring-4 focus:ring-amber-300 font-semibold rounded-xl text-sm px-5 py-3 shadow-lg hover:shadow-xl transition-all duration-200">
                            <svg class="h-5 w-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                                    clip-rule="evenodd" />
                            </svg>
                            Add Product
                        </button>
                    </div>
                </div>

                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left">
                        <thead class="text-xs text-gray-700 dark:text-gray-300 uppercase bg-amber-50 dark:bg-gray-700 border-b-2 border-amber-200 dark:border-gray-600">
                            <tr>
                                <th scope="col" class="px-6 py-4 font-bold">Product</th>
                                <th scope="col" class="px-6 py-4 font-bold">Category</th>
                                <th scope="col" class="px-6 py-4 font-bold">Brand</th>
                                <th scope="col" class="px-6 py-4 font-bold text-center">Quantity</th>
                                <th scope="col" class="px-6 py-4 font-bold text-right">Price</th>
                                
                                <th scope="col" class="px-6 py-4 font-bold text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(product, index) in products" :key="product.id"
                                class="border-b border-amber-100 dark:border-gray-700 hover:bg-amber-50/50 dark:hover:bg-gray-700/50 transition-colors duration-200">
                                
                                <!-- Product Name with Image -->
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                    <div class="flex items-center space-x-3">
                                        <img v-if="product.product_images && product.product_images.length > 0"
                                            :src="`/${product.product_images[0].image}`" :alt="product.title"
                                            class="w-12 h-12 rounded-lg object-cover border-2 border-amber-200 dark:border-gray-600">
                                        <div v-else
                                            class="w-12 h-12 rounded-lg bg-gradient-to-br from-amber-100 to-orange-100 dark:from-amber-900/30 dark:to-orange-900/30 flex items-center justify-center border-2 border-amber-200 dark:border-gray-600">
                                            <svg class="w-6 h-6 text-amber-600" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <span class="font-semibold">{{ product.title }}</span>
                                    </div>
                                </th>

                                <td class="px-6 py-4 text-gray-700 dark:text-gray-300">
                                    {{ product.category?.name || 'N/A' }}
                                </td>

                                <td class="px-6 py-4 text-gray-700 dark:text-gray-300">
                                    {{ product.brand?.name || 'N/A' }}
                                </td>

                                <td class="px-6 py-4 text-center">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold"
                                        :class="product.quantity > 10 
                                            ? 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400' 
                                            : product.quantity > 0 
                                            ? 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-400'
                                            : 'bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400'">
                                        {{ product.quantity }}
                                    </span>
                                </td>

                                <td class="px-6 py-4 text-right">
                                    <span class="text-lg font-bold text-transparent bg-clip-text bg-gradient-to-r from-amber-700 to-orange-600 dark:from-amber-400 dark:to-orange-300">
                                        {{ product.price }} DT
                                    </span>
                                </td>

                               

                               
                                <td class="px-6 py-4 text-center">
                                    <div class="flex items-center justify-center space-x-2">
                                        <button @click="openEditModal(product)"
                                            class="inline-flex items-center p-2 text-amber-600 hover:text-amber-700 bg-amber-50 hover:bg-amber-100 dark:bg-amber-900/30 dark:hover:bg-amber-900/50 rounded-lg transition-all duration-200">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </button>
                                        <button @click="deleteProduct(product, index)"
                                            class="inline-flex items-center p-2 text-red-600 hover:text-red-700 bg-red-50 hover:bg-red-100 dark:bg-red-900/30 dark:hover:bg-red-900/50 rounded-lg transition-all duration-200">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Empty State -->
                <div v-if="!products || products.length === 0" class="text-center py-16">
                    <svg class="w-24 h-24 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                    </svg>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">No products yet</h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-6">Get started by adding your first product</p>
                    <button @click="openAddModal"
                        class="inline-flex items-center px-6 py-3 text-white bg-gradient-to-r from-amber-600 to-orange-600 hover:from-amber-700 hover:to-orange-700 rounded-xl font-semibold shadow-lg hover:shadow-xl transition-all duration-200">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                                clip-rule="evenodd" />
                        </svg>
                        Add Your First Product
                    </button>
                </div>

                <!-- Pagination -->
                <nav v-if="products && products.length > 0"
                    class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-6 bg-gradient-to-r from-amber-50 to-orange-50 dark:from-gray-700 dark:to-gray-600 border-t-2 border-amber-200 dark:border-gray-700">
                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">
                        Showing <span class="font-bold text-gray-900 dark:text-white">{{ products.length }}</span> products
                    </span>
                </nav>
            </div>
        </div>
    </section>
</template>

<style scoped>
/* Modal transitions */
.modal-enter-active,
.modal-leave-active {
    transition: opacity 0.3s ease;
}

.modal-enter-from,
.modal-leave-to {
    opacity: 0;
}

.modal-enter-active .inline-block,
.modal-leave-active .inline-block {
    transition: all 0.3s ease;
}

.modal-enter-from .inline-block,
.modal-leave-to .inline-block {
    transform: scale(0.95);
    opacity: 0;
}
</style>