<template>
<AdminLayout>
<ProductList :products = "products"></ProductList>
<Order></Order>
</AdminLayout>

    </template>


    <script setup>
defineProps({
    products:Array
})
    import AdminLayout from '../Components/AdminLayout.vue';
    import ProductList from './ProductList.vue';
    import Order from '../Order.vue';

</script>