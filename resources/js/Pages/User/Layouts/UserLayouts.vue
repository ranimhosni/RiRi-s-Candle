
    <script setup>
import Header from './Header.vue';
import Footer from './Footer.vue';
import { onMounted } from 'vue'
import { initFlowbite } from 'flowbite'

// initialize components based on data attribute selectors
onMounted(() => {
    initFlowbite();
})

</script>
<template>
   

 <Header></Header>

<slot/>
<Footer></Footer>



</template>