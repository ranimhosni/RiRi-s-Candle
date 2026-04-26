<script setup>
import { Link } from '@inertiajs/vue3';
import { ref, onMounted } from 'vue';

const stats = ref([
    { number: '500+', label: 'Happy Customers' },
    { number: '50+', label: 'Unique Scents' },
    { number: '100%', label: 'Natural Ingredients' }
]);

const isVisible = ref(false);

onMounted(() => {
    setTimeout(() => {
        isVisible.value = true;
    }, 100);
});
</script>

<template>
    <section class="relative min-h-screen bg-gradient-to-br from-slate-50 via-amber-50/30 to-orange-50/50 dark:from-gray-950 dark:via-gray-900 dark:to-gray-950 overflow-hidden">
        
        <!-- Animated Background Grid -->
        <div class="absolute inset-0 bg-grid-pattern opacity-[0.02] dark:opacity-[0.05]"></div>
        
        <!-- Floating Orbs with Modern Blur -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-1/4 -left-20 w-96 h-96 bg-gradient-to-br from-amber-400/30 to-orange-500/30 rounded-full blur-3xl animate-float"></div>
            <div class="absolute bottom-1/4 -right-20 w-96 h-96 bg-gradient-to-br from-orange-400/30 to-amber-500/30 rounded-full blur-3xl animate-float animation-delay-2000"></div>
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-gradient-to-br from-yellow-400/20 to-amber-500/20 rounded-full blur-3xl animate-float animation-delay-4000"></div>
        </div>

        <!-- Hero Section with Glass Effect -->
        <div class="relative">
            <!-- Navigation Spacer -->
            

            <div class="relative z-10   px-4 sm:px-6 lg:px-8 pt-0 pb-24">
                
                <!-- Hero Content -->
                <div class="text-center space-y-8" :class="{ 'animate-fade-in-up': isVisible }">
                    <section class="relative w-full min-h-screen overflow-hidden custom-bg">
                    <!-- Badge -->
                   

                    <!-- Main Heading -->
                    <div class="space-y-10 ">
                        <div class="space-y-10"></div>
                        
                        <h1 class="text-5xl sm:text-6xl lg:text-7xl xl:text-8xl font-black tracking-tight pt-20 ">
                            
          
                            <span class="block bg-gradient-to-r from-amber-600 via-gray-500 to-amber-600 bg-clip-text text-transparent animate-gradient">
                                 Illuminate Your Space
                            </span>
                        </h1>
                        
                        <p class="max-w-3xl mx-auto text-lg sm:text-xl text-white dark:text-gray-300 leading-relaxed font-light">
                            Discover artisan candles crafted from 100% natural soy wax, infused with premium essential oils, and hand-poured in small batches.
                        </p>
                    </div>

                    <!-- CTA Buttons - Modern Style -->
                    <div class="flex flex-col sm:flex-row gap-4 justify-center items-center pt-4">
                        <a href="#index" class="group relative inline-flex items-center justify-center px-8 py-4 text-lg font-semibold text-white bg-gradient-to-r from-amber-600 to-orange-600 rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
                            <span class="relative z-10 flex items-center">
                                Shop Collection
                                <svg class="ml-2 w-5 h-5 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                </svg>
                            </span>
                            <div class="absolute inset-0 bg-gradient-to-r from-amber-700 to-orange-700 transform scale-x-0 group-hover:scale-x-100 transition-transform origin-left"></div>
                        </a>
                        
                        <a href="/about" class="group inline-flex items-center justify-center px-8 py-4 text-lg font-semibold text-gray-900 dark:text-white bg-white/80 dark:bg-gray-800/80 backdrop-blur-xl border-2 border-gray-200 dark:border-gray-700 rounded-2xl hover:border-amber-500 dark:hover:border-amber-500 transition-all duration-300 shadow-lg hover:shadow-xl">
                            <svg class="mr-2 w-5 h-5 transform group-hover:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                            Our Story
                        </a>
                    </div>
</section>
                    <!-- Stats Section - Glassmorphism -->
                    
                </div>
            </div>
        </div>

        <!-- Features Section - Modern Cards -->
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-24">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8">
                
                <!-- Feature 1 -->
                <div class="group relative bg-white/70 dark:bg-gray-800/70 backdrop-blur-xl rounded-3xl p-8 border border-white/20 dark:border-gray-700/20 shadow-xl hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                    <div class="absolute inset-0 bg-gradient-to-br from-amber-500/10 to-orange-500/10 rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    <div class="relative">
                        <div class="w-16 h-16 bg-gradient-to-br from-amber-500 to-orange-500 rounded-2xl flex items-center justify-center mb-6 transform group-hover:rotate-6 transition-transform duration-500 shadow-lg">
                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17,8C8,10 5.9,16.17 3.82,21.34L5.71,22L6.66,19.7C7.14,19.87 7.64,20 8,20C19,20 22,3 22,3C21,5 14,5.25 9,6.25C4,7.25 2,11.5 2,13.5C2,15.5 3.75,17.25 3.75,17.25C7,8 17,8 17,8Z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">100% Natural</h3>
                        <p class="text-gray-600 dark:text-gray-400 leading-relaxed">Pure soy wax and premium essential oils for a clean, eco-friendly burn.</p>
                    </div>
                </div>

                <!-- Feature 2 -->
                <div class="group relative bg-white/70 dark:bg-gray-800/70 backdrop-blur-xl rounded-3xl p-8 border border-white/20 dark:border-gray-700/20 shadow-xl hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                    <div class="absolute inset-0 bg-gradient-to-br from-amber-500/10 to-orange-500/10 rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    <div class="relative">
                        <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-amber-500 rounded-2xl flex items-center justify-center mb-6 transform group-hover:rotate-6 transition-transform duration-500 shadow-lg">
                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12,2C11.5,2 11,2.19 10.59,2.59L10,3.17L9.41,2.59C8.61,1.79 7.3,1.79 6.5,2.59C5.7,3.39 5.7,4.7 6.5,5.5L10,9V22H14V9L17.5,5.5C18.3,4.7 18.3,3.39 17.5,2.59C16.7,1.79 15.39,1.79 14.59,2.59L14,3.17L13.41,2.59C13,2.19 12.5,2 12,2Z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Hand-Poured</h3>
                        <p class="text-gray-600 dark:text-gray-400 leading-relaxed">Crafted with care and attention in small artisan batches.</p>
                    </div>
                </div>

                <!-- Feature 3 -->
                <div class="group relative bg-white/70 dark:bg-gray-800/70 backdrop-blur-xl rounded-3xl p-8 border border-white/20 dark:border-gray-700/20 shadow-xl hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                    <div class="absolute inset-0 bg-gradient-to-br from-amber-500/10 to-orange-500/10 rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    <div class="relative">
                        <div class="w-16 h-16 bg-gradient-to-br from-amber-600 to-orange-400 rounded-2xl flex items-center justify-center mb-6 transform group-hover:rotate-6 transition-transform duration-500 shadow-lg">
                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.66,11.2C17.43,10.9 17.15,10.64 16.89,10.38C16.22,9.78 15.46,9.35 14.82,8.72C13.33,7.26 13,4.85 13.95,3C13,3.23 12.17,3.75 11.46,4.32C8.87,6.4 7.85,10.07 9.07,13.22C9.11,13.32 9.15,13.42 9.15,13.55C9.15,13.77 9,13.97 8.8,14.05C8.57,14.15 8.33,14.09 8.14,13.93C8.08,13.88 8.04,13.83 8,13.76C6.87,12.33 6.69,10.28 7.45,8.64C5.78,10 4.87,12.3 5,14.47C5.06,14.97 5.12,15.47 5.29,15.97C5.43,16.57 5.7,17.17 6,17.7C7.08,19.43 8.95,20.67 10.96,20.92C13.1,21.19 15.39,20.8 17.03,19.32C18.86,17.66 19.5,15 18.56,12.72L18.43,12.46C18.22,12 17.66,11.2 17.66,11.2M14.5,17.5C14.22,17.74 13.76,18 13.4,18.1C12.28,18.5 11.16,17.94 10.5,17.28C11.69,17 12.4,16.12 12.61,15.23C12.78,14.43 12.46,13.77 12.33,13C12.21,12.26 12.23,11.63 12.5,10.94C12.69,11.32 12.89,11.7 13.13,12C13.9,13 15.11,13.44 15.37,14.8C15.41,14.94 15.43,15.08 15.43,15.23C15.46,16.05 15.1,16.95 14.5,17.5H14.5Z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Eco-Friendly</h3>
                        <p class="text-gray-600 dark:text-gray-400 leading-relaxed">Sustainable materials and biodegradable packaging only.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Social Section - Ultra Modern -->
        <div id="footer"  class="relative z-10 max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 pb-24">
            <div class="bg-white/70 dark:bg-gray-800/70 backdrop-blur-2xl rounded-3xl p-8 sm:p-12 border border-white/20 dark:border-gray-700/20 shadow-2xl">
                
                <!-- Header -->
                <div class="text-center mb-12">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-amber-500 to-orange-500 rounded-2xl mb-6 shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                    </div>
                    <h3 class="text-3xl sm:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                        Create Your Signature Scent
                    </h3>
                    <p class="text-lg text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
                        Want something unique? Message us for a personalized candle crafted just for you.
                    </p>
                </div>

                <!-- Social Links - Modern Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-8">
                    
                    <!-- Instagram -->
                    <a href="https://www.instagram.com/riris_candles/" target="_blank" rel="noopener noreferrer"
                        class="group relative bg-gradient-to-br from-purple-500/10 to-pink-500/10 hover:from-purple-500/20 hover:to-pink-500/20 rounded-2xl p-6 border border-purple-200/50 dark:border-purple-800/50 transition-all duration-300 hover:scale-105 hover:shadow-xl">
                        <div class="flex items-center space-x-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-purple-500 via-pink-500 to-red-500 rounded-xl flex items-center justify-center shadow-lg transform group-hover:rotate-12 transition-transform">
                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M7.8,2H16.2C19.4,2 22,4.6 22,7.8V16.2A5.8,5.8 0 0,1 16.2,22H7.8C4.6,22 2,19.4 2,16.2V7.8A5.8,5.8 0 0,1 7.8,2M7.6,4A3.6,3.6 0 0,0 4,7.6V16.4C4,18.39 5.61,20 7.6,20H16.4A3.6,3.6 0 0,0 20,16.4V7.6C20,5.61 18.39,4 16.4,4H7.6M17.25,5.5A1.25,1.25 0 0,1 18.5,6.75A1.25,1.25 0 0,1 17.25,8A1.25,1.25 0 0,1 16,6.75A1.25,1.25 0 0,1 17.25,5.5M12,7A5,5 0 0,1 17,12A5,5 0 0,1 12,17A5,5 0 0,1 7,12A5,5 0 0,1 12,7M12,9A3,3 0 0,0 9,12A3,3 0 0,0 12,15A3,3 0 0,0 15,12A3,3 0 0,0 12,9Z"/>
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-bold text-gray-900 dark:text-white">Instagram</p>
                                <p class="text-xs text-gray-600 dark:text-gray-400">@riris_candles</p>
                            </div>
                        </div>
                    </a>

                    <!-- TikTok -->
                    <a href="https://www.tiktok.com/@riris.candles" target="_blank" rel="noopener noreferrer"
                        class="group relative bg-gradient-to-br from-cyan-500/10 to-blue-500/10 hover:from-cyan-500/20 hover:to-blue-500/20 rounded-2xl p-6 border border-cyan-200/50 dark:border-cyan-800/50 transition-all duration-300 hover:scale-105 hover:shadow-xl">
                        <div class="flex items-center space-x-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-cyan-500 to-blue-600 rounded-xl flex items-center justify-center shadow-lg transform group-hover:-rotate-12 transition-transform">
                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M16.6,5.82s.51.5,0,0A4.278,4.278,0,0,1,15.54,3h-3.09V12.4a2.592,2.592,0,0,1-2.59,2.5,2.592,2.592,0,0,1-2.59-2.5,2.592,2.592,0,0,1,2.59-2.5.681.681,0,0,1,.73.11V6.48a5.633,5.633,0,0,0-.73-.05A5.6,5.6,0,0,0,4.3,12.4a5.6,5.6,0,0,0,5.6,5.6,5.6,5.6,0,0,0,5.6-5.6V9.77a8.958,8.958,0,0,0,4.2,1.06V7.5A5.223,5.223,0,0,1,16.6,5.82Z"/>
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-bold text-gray-900 dark:text-white">TikTok</p>
                                <p class="text-xs text-gray-600 dark:text-gray-400">@riris.candles</p>
                            </div>
                        </div>
                    </a>

                    <!-- Facebook -->
                    <a href="https://www.facebook.com/profile.php?id=61583198642924" target="_blank" rel="noopener noreferrer"
                        class="group relative bg-gradient-to-br from-blue-500/10 to-indigo-500/10 hover:from-blue-500/20 hover:to-indigo-500/20 rounded-2xl p-6 border border-blue-200/50 dark:border-blue-800/50 transition-all duration-300 hover:scale-105 hover:shadow-xl">
                        <div class="flex items-center space-x-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-blue-600 rounded-xl flex items-center justify-center shadow-lg transform group-hover:rotate-12 transition-transform">
                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2.04C6.5 2.04 2 6.53 2 12.06C2 17.06 5.66 21.21 10.44 21.96V14.96H7.9V12.06H10.44V9.85C10.44 7.34 11.93 5.96 14.22 5.96C15.31 5.96 16.45 6.15 16.45 6.15V8.62H15.19C13.95 8.62 13.56 9.39 13.56 10.18V12.06H16.34L15.89 14.96H13.56V21.96A10 10 0 0 0 22 12.06C22 6.53 17.5 2.04 12 2.04Z"/>
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-bold text-gray-900 dark:text-white">Facebook</p>
                                <p class="text-xs text-gray-600 dark:text-gray-400">Riri's Candles</p>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Special Offer Banner -->
                <div  class="relative bg-gradient-to-r from-amber-500/20 via-orange-500/20 to-amber-500/20 rounded-2xl p-6 border border-amber-300/50 dark:border-amber-700/50 overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent animate-shimmer"></div>
                    <div class="relative text-center">
                        <p class="text-base sm:text-lg text-gray-800 dark:text-gray-200 mb-2">
                            <span class="font-bold text-amber-700 dark:text-amber-400">✨ Custom Orders</span>
                        </p>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-3">
                            Share your idea or special moment – we'll create a unique candle just for you
                        </p>
                        <div class="flex items-center justify-center text-xs text-gray-500 dark:text-gray-500">
                            <svg class="w-4 h-4 text-amber-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                            </svg>
                            <span>Response within 24 hours</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<style scoped>
.custom-bg {
    background-image: url('./riris.png');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    width: 100vw;
    left: 50%;
    right: 50%;
    margin-left: -50vw;
    margin-right: -50vw;
}
/* Modern Animations */
@keyframes float {
    0%, 100% {
        transform: translate(0, 0) scale(1);
    }
    33% {
        transform: translate(30px, -30px) scale(1.05);
    }
    66% {
        transform: translate(-20px, 20px) scale(0.95);
    }
}

@keyframes gradient {
    0%, 100% {
        background-size: 200% 200%;
        background-position: left center;
    }
    50% {
        background-size: 200% 200%;
        background-position: right center;
    }
}

@keyframes shimmer {
    0% {
        transform: translateX(-100%);
    }
    100% {
        transform: translateX(100%);
    }
}

@keyframes fade-in-up {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-float {
    animation: float 8s ease-in-out infinite;
}

.animation-delay-2000 {
    animation-delay: 2s;
}

.animation-delay-4000 {
    animation-delay: 4s;
}

.animate-gradient {
    background-size: 200% auto;
    animation: gradient 4s linear infinite;
}

.animate-shimmer {
    animation: shimmer 3s infinite;
}

.animate-fade-in-up {
    animation: fade-in-up 0.8s ease-out;
}

/* Grid Pattern Background */
.bg-grid-pattern {
    background-image: 
        linear-gradient(to right, currentColor 1px, transparent 1px),
        linear-gradient(to bottom, currentColor 1px, transparent 1px);
    background-size: 40px 40px;
}

/* Glass Effect Enhancement */
@supports (backdrop-filter: blur(20px)) {
    .backdrop-blur-xl {
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
    }
    
    .backdrop-blur-2xl {
        backdrop-filter: blur(40px);
        -webkit-backdrop-filter: blur(40px);
    }
}

/* Smooth Scrolling */
html {
    scroll-behavior: smooth;
}

/* Responsive Typography */
@media (max-width: 640px) {
    h1 {
        font-size: 2.5rem;
    }
}
</style>