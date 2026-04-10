<script setup>
import { ref } from 'vue';
import UserLayouts from './User/Layouts/UserLayouts.vue';

// You can add more interactive elements if needed
const showFullStory = ref(false);

const toggleFullStory = () => {
    showFullStory.value = !showFullStory.value;
};
</script>

<template>
    <UserLayouts>
 
  <!-- Meet the Founder -->
        <section class="py-12 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="lg:text-center">
                    <h2 class="text-base text-black font-semibold tracking-wide uppercase">Meet the Founder</h2>
                    <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                        The Heart Behind Our Candles
                    </p>
                </div>

                <div class="mt-10">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                        <div class="order-2 md:order-1">
                            <h3 class="text-2xl font-bold text-gray-900">Ranim Hosni</h3>
                            <p class="mt-4 text-lg text-gray-600">
                                With a background in aromatherapy and a love for interior design, Sarah created her first candle during a difficult time in her life when she was searching for comfort and a creative outlet.
                            </p>
                            <p class="mt-4 text-lg text-gray-600">
                                "I believe that a beautiful candle can transform any space and moment. Each scent tells a story and can transport you to a different time and place. That's the magic I want to share with every customer."
                            </p>
                            
                            <div v-if="!showFullStory" class="mt-6">
                                <button @click="toggleFullStory" class="text-purple-600 hover:text-purple-800 underline">
                                    Read more about Ranim's journey
                                </button>
                            </div>
                            
                            <div v-if="showFullStory" class="mt-4 text-lg text-gray-600">
                                <p>
                                    After leaving her corporate job in 2017, Sarah dedicated herself fully to perfecting her craft. She trained with master chandlers in France and studied organic chemistry to understand the science behind fragrance creation.
                                </p>
                                <p class="mt-4">
                                    Today, she leads a team of passionate artisans who share her vision of bringing affordable luxury into everyday homes.
                                </p>
                                <button @click="toggleFullStory" class="mt-4 text-purple-600 hover:text-purple-800 underline">
                                    Show less
                                </button>
                            </div>
                        </div>
                        <div class="order-1 md:order-2">
                            <img class="mx-auto h-72 w-72 rounded-full object-cover" src="./founder.jpeg" alt="Founder portrait">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Our Beginning -->
        <section id="our-journey" class="py-12 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="lg:text-center">
                    <h2 class="text-base text-black font-semibold tracking-wide uppercase">Our Beginning</h2>
                    <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                        Where Passion Meets Craftsmanship
                    </p>
                </div>

                <div class="mt-10">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                        <div class="aspect-w-3 aspect-h-2">
                            <img class="w-40 h-40 object-cover shadow-lg rounded-lg" src="https://images.unsplash.com/photo-1603006905003-be475563bc59?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Candle making process">
                        </div>
                        <div>
                            <p class="text-lg text-gray-600">
                                Our journey began in a small kitchen in 2018, with nothing but a passion for creating handcrafted candles. What started as a hobby quickly blossomed into something more meaningful as friends and family fell in love with our unique scents and designs.
                            </p>
                            <p class="mt-4 text-lg text-gray-600">
                                Each candle is carefully crafted using premium soy wax, lead-free cotton wicks, and the finest fragrance oils. We believe that every candle should not only smell wonderful but also be safe for your home and family.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Our Values -->
        <section class="py-12 bg-purple-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="lg:text-center">
                    <h2 class="text-base text-black font-semibold tracking-wide uppercase">Our Values</h2>
                    <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                        What We Stand For
                    </p>
                </div>

                <div class="mt-10">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <div class="bg-white p-6 rounded-lg shadow-md">
                            <div class="w-12 h-12 inline-flex items-center justify-center rounded-full bg-purple-100 text-purple-500 mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-medium text-gray-900">Artisanal Community</h3>
                            <p class="mt-2 text-base text-gray-600">
                                We support local artisans and believe in fostering a creative community where skills and traditions are preserved.
                            </p>
                        </div>

                        <div class="bg-white p-6 rounded-lg shadow-md">
                            <div class="w-12 h-12 inline-flex items-center justify-center rounded-full bg-purple-100 text-purple-500 mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h.5A2.5 2.5 0 0020 5.5v-1.65" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-medium text-gray-900">Eco-Friendly</h3>
                            <p class="mt-2 text-base text-gray-600">
                                We're committed to sustainable practices, using biodegradable packaging and ethically sourced materials.
                            </p>
                        </div>

                        <div class="bg-white p-6 rounded-lg shadow-md">
                            <div class="w-12 h-12 inline-flex items-center justify-center rounded-full bg-purple-100 text-purple-500 mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-medium text-gray-900">Quality First</h3>
                            <p class="mt-2 text-base text-gray-600">
                                We never compromise on quality. Each candle is hand-poured and thoroughly tested to ensure the best possible experience.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

      

        <!-- Our Process -->
        <section class="py-12 bg-purple-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="lg:text-center">
                    <h2 class="text-base text-black font-semibold tracking-wide uppercase">Our Process</h2>
                    <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                        From Concept to Candle
                    </p>
                </div>

                <div class="mt-10">
                    <div class="relative">
                        <div class="absolute inset-0 flex items-center" aria-hidden="true">
                            <div class="w-full border-t border-gray-300"></div>
                        </div>
                        <div class="relative flex justify-around">
                            <div>
                                <span class="bg-purple-50 px-4 text-lg font-medium text-gray-900">1</span>
                            </div>
                            <div>
                                <span class="bg-purple-50 px-4 text-lg font-medium text-gray-900">2</span>
                            </div>
                            <div>
                                <span class="bg-purple-50 px-4 text-lg font-medium text-gray-900">3</span>
                            </div>
                            <div>
                                <span class="bg-purple-50 px-4 text-lg font-medium text-gray-900">4</span>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 grid grid-cols-1 md:grid-cols-4 gap-6 text-center">
                        <div>
                            <h3 class="text-lg font-medium text-gray-900">Design & Inspiration</h3>
                            <p class="mt-2 text-base text-gray-600">
                                Each scent starts with a concept inspired by memories, places, and emotions.
                            </p>
                        </div>
                        <div>
                            <h3 class="text-lg font-medium text-gray-900">Testing & Refinement</h3>
                            <p class="mt-2 text-base text-gray-600">
                                We test multiple variations until we find the perfect balance of fragrance notes.
                            </p>
                        </div>
                        <div>
                            <h3 class="text-lg font-medium text-gray-900">Hand-Pouring</h3>
                            <p class="mt-2 text-base text-gray-600">
                                Each candle is individually hand-poured using our proprietary soy wax blend.
                            </p>
                        </div>
                        <div>
                            <h3 class="text-lg font-medium text-gray-900">Quality Assurance</h3>
                            <p class="mt-2 text-base text-gray-600">
                                Every candle is checked for quality and cured for the perfect burn.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- From Our Customers -->
        <section class="py-12 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="lg:text-center">
                    <h2 class="text-base text-black font-semibold tracking-wide uppercase">Testimonials</h2>
                    <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                        Loved by Our Customers
                    </p>
                </div>

                <div class="mt-10">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <div class="bg-gray-50 p-6 rounded-lg">
                            <div class="flex items-center mb-4">
                                <div class="text-yellow-400">
                                    <svg class="h-5 w-5 inline" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                    <svg class="h-5 w-5 inline" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                    <svg class="h-5 w-5 inline" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                    <svg class="h-5 w-5 inline" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                    <svg class="h-5 w-5 inline" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                </div>
                            </div>
                            <p class="text-gray-600 italic">
                                "These candles have transformed my home. The scents are unique and long-lasting, and the packaging is beautiful enough to give as a gift."
                            </p>
                            <p class="mt-4 font-medium text-gray-900">- Maria L.</p>
                        </div>
                        
                        <div class="bg-gray-50 p-6 rounded-lg">
                            <div class="flex items-center mb-4">
                                <div class="text-yellow-400">
                                    <svg class="h-5 w-5 inline" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                    <svg class="h-5 w-5 inline" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                    <svg class="h-5 w-5 inline" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                    <svg class="h-5 w-5 inline" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                    <svg class="h-5 w-5 inline" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                </div>
                            </div>
                            <p class="text-gray-600 italic">
                                "I appreciate that these candles are eco-friendly and made with natural ingredients. The scents are subtle but effective, creating a calm atmosphere in my home office."
                            </p>
                            <p class="mt-4 font-medium text-gray-900">- James R.</p>
                        </div>
                        
                        <div class="bg-gray-50 p-6 rounded-lg">
                            <div class="flex items-center mb-4">
                                <div class="text-yellow-400">
                                    <svg class="h-5 w-5 inline" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                    <svg class="h-5 w-5 inline" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                    <svg class="h-5 w-5 inline" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                    <svg class="h-5 w-5 inline" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                    <svg class="h-5 w-5 inline" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                </div>
                            </div>
                            <p class="text-gray-600 italic">
                                "I've been a customer for over two years now, and the quality has never disappointed me. The subscription service is convenient, and I love discovering new scents each season."
                            </p>
                            <p class="mt-4 font-medium text-gray-900">- Emma T.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Call to Action -->
        <section class="py-12 bg-purple-600">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h2 class="text-3xl font-extrabold text-white sm:text-4xl">
                    Join Our Candle Community
                </h2>
                <p class="mt-4 text-lg leading-6 text-purple-100">
                    Subscribe to our newsletter for new scent announcements, special offers, and candle care tips.
                </p>
                <div class="mt-8 flex justify-center">
                    <div class="inline-flex rounded-md shadow">
                        <a href="#" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-purple-600 bg-white hover:bg-purple-50">
                            Shop Our Collection
                        </a>
                    </div>
                    <div class="ml-3 inline-flex">
                        <a href="#" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-purple-800 hover:bg-purple-900">
                            Subscribe
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </UserLayouts>
</template>
<style>

/* Heading Styles - Candle Theme */

/* Main Heading (h1) */
h1 {
    margin-top: 100px;
    font-size: 3rem;
    font-weight: 800;
    background: linear-gradient(135deg, #f59e0b 0%, #ea580c 50%, #f59e0b 100%);
    background-clip: text;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-size: 200% auto;
    animation: shimmer 3s linear infinite;
    text-align: center;
    line-height: 1.2;
    letter-spacing: -0.02em;
    position: relative;
    padding-bottom: 1rem;
}

h1::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 80px;
    height: 4px;
    background: linear-gradient(90deg, transparent, #f59e0b, transparent);
    border-radius: 2px;
}

/* Secondary Heading (h2) */
h2 {
    margin-top: 4rem;
    font-size: 2.25rem;
    font-weight: 700;
    color: #1f2937;
    position: relative;
    padding-bottom: 0.75rem;
    margin-bottom: 1.5rem;
}

.dark h2 {
    color: #f9fafb;
}

h2::before {
    content: '🕯️';
    position: absolute;
    left: -2.5rem;
    opacity: 0.3;
    font-size: 1.5rem;
}

h2::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 60px;
    height: 3px;
    background: linear-gradient(90deg, #f59e0b, #ea580c);
    border-radius: 2px;
}

/* Tertiary Heading (h3) */
h3 {
    margin-top: 3rem;
    font-size: 1.875rem;
    font-weight: 600;
    color: #374151;
    margin-bottom: 1rem;
}

.dark h3 {
    color: #e5e7eb;
}

/* Quaternary Heading (h4) */
h4 {
    margin-top: 2rem;
    font-size: 1.5rem;
    font-weight: 600;
    color: #4b5563;
    margin-bottom: 0.75rem;
}

.dark h4 {
    color: #d1d5db;
}

/* Small Headings (h5, h6) */
h5 {
    margin-top: 1.5rem;
    font-size: 1.25rem;
    font-weight: 600;
    color: #6b7280;
    margin-bottom: 0.5rem;
}

.dark h5 {
    color: #9ca3af;
}

h6 {
    margin-top: 1rem;
    font-size: 1.125rem;
    font-weight: 600;
    color: #6b7280;
    margin-bottom: 0.5rem;
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

.dark h6 {
    color: #9ca3af;
}

/* Shimmer Animation */
@keyframes shimmer {
    0% {
        background-position: 0% center;
    }
    100% {
        background-position: 200% center;
    }
}

/* Responsive Heading Sizes */
@media (max-width: 768px) {
    h1 {
        font-size: 2.25rem;
        margin-top: 60px;
    }
    
    h2 {
        font-size: 1.875rem;
        margin-top: 3rem;
    }
    
    h3 {
        font-size: 1.5rem;
        margin-top: 2.5rem;
    }
    
    h4 {
        font-size: 1.25rem;
        margin-top: 1.5rem;
    }
    
    h2::before {
        left: 0;
        top: -1.5rem;
    }
}

@media (max-width: 640px) {
    h1 {
        font-size: 1.875rem;
        margin-top: 40px;
    }
    
    h2 {
        font-size: 1.5rem;
        margin-top: 2rem;
    }
    
    h3 {
        font-size: 1.25rem;
        margin-top: 2rem;
    }
}

/* Special Heading Variants */

/* Centered Heading */
.heading-center {
    text-align: center;
}

.heading-center::before {
    left: 50%;
    transform: translateX(-50%);
    top: -2rem;
}

.heading-center::after {
    left: 50%;
    transform: translateX(-50%);
}

/* Featured Heading with Glow */
.heading-glow {
    text-shadow: 0 0 20px rgba(245, 158, 11, 0.3),
                 0 0 40px rgba(245, 158, 11, 0.2),
                 0 0 60px rgba(245, 158, 11, 0.1);
}

/* Heading with Subtitle */
.heading-with-subtitle {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 0.5rem;
}

.heading-subtitle {
    font-size: 1.125rem;
    font-weight: 400;
    color: #6b7280;
    font-style: italic;
}

.dark .heading-subtitle {
    color: #9ca3af;
}

/* Decorative Heading */
.heading-decorative {
    position: relative;
    display: inline-block;
    padding: 0 2rem;
}

.heading-decorative::before,
.heading-decorative::after {
    content: '✦';
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    color: #f59e0b;
    font-size: 1.5rem;
    opacity: 0.5;
}

.heading-decorative::before {
    left: 0;
}

.heading-decorative::after {
    right: 0;
}

/* Candle Flame Effect Heading */
.heading-flame {
    position: relative;
    color: #f59e0b;
    animation: flicker 3s ease-in-out infinite;
}

@keyframes flicker {
    0%, 100% {
        text-shadow: 0 0 10px rgba(245, 158, 11, 0.8),
                     0 0 20px rgba(245, 158, 11, 0.6),
                     0 0 30px rgba(245, 158, 11, 0.4);
    }
    50% {
        text-shadow: 0 0 5px rgba(245, 158, 11, 0.6),
                     0 0 10px rgba(245, 158, 11, 0.4),
                     0 0 15px rgba(245, 158, 11, 0.2);
    }
}

/* Section Heading with Icon */
.section-heading {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-top: 4rem;
    margin-bottom: 2rem;
}

.section-heading::before {
    content: '';
    width: 4px;
    height: 2.5rem;
    background: linear-gradient(180deg, #f59e0b, #ea580c);
    border-radius: 2px;
}

/* Hero Heading (Extra Large) */
.hero-heading {
    font-size: 4rem;
    font-weight: 900;
    line-height: 1.1;
    background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 25%, #ea580c 50%, #f59e0b 75%, #fbbf24 100%);
    background-clip: text;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-size: 200% auto;
    animation: shimmer 4s linear infinite;
    text-align: center;
    margin-top: 2rem;
    margin-bottom: 1.5rem;
}

@media (max-width: 768px) {
    .hero-heading {
        font-size: 2.5rem;
    }
}

/* Handwritten Style Heading */
.heading-handwritten {
    font-family: 'Brush Script MT', cursive;
    font-weight: 400;
    font-size: 3.5rem;
    color: #ea580c;
    text-align: center;
    margin: 2rem 0;
}

.dark .heading-handwritten {
    color: #fb923c;
}

/* Elegant Heading with Lines */
.heading-elegant {
    display: flex;
    align-items: center;
    text-align: center;
    margin: 3rem 0;
}

.heading-elegant::before,
.heading-elegant::after {
    content: '';
    flex: 1;
    height: 2px;
    background: linear-gradient(90deg, transparent, #f59e0b, transparent);
}

.heading-elegant::before {
    margin-right: 1.5rem;
}

.heading-elegant::after {
    margin-left: 1.5rem;
}

/* Bordered Heading */
.heading-bordered {
    display: inline-block;
    padding: 1rem 2rem;
    border: 3px solid;
    border-image: linear-gradient(135deg, #f59e0b, #ea580c) 1;
    position: relative;
    margin: 2rem auto;
}

.heading-bordered::before {
    content: '';
    position: absolute;
    top: -10px;
    left: -10px;
    right: -10px;
    bottom: -10px;
    border: 1px solid rgba(245, 158, 11, 0.3);
    pointer-events: none;
}

/* Underline Effect on Hover */
.heading-hover {
    position: relative;
    display: inline-block;
    cursor: pointer;
    transition: color 0.3s ease;
}

.heading-hover::after {
    content: '';
    position: absolute;
    bottom: -5px;
    left: 0;
    width: 0;
    height: 3px;
    background: linear-gradient(90deg, #f59e0b, #ea580c);
    transition: width 0.3s ease;
}

.heading-hover:hover::after {
    width: 100%;
}

.heading-hover:hover {
    color: #f59e0b;
}
</style>