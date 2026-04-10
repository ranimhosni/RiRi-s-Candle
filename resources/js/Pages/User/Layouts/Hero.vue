<script>
import { Link} from '@inertiajs/vue3';

</script>
<template>
    <section class="relative bg-gradient-to-b from-amber-50 via-white to-orange-50 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 overflow-hidden">
        <!-- Decorative background elements -->
        <div class="absolute inset-0 opacity-30">
            <div class="absolute top-20 left-10 w-72 h-72 bg-amber-200 rounded-full mix-blend-multiply filter blur-xl animate-blob"></div>
            <div class="absolute top-40 right-10 w-72 h-72 bg-orange-200 rounded-full mix-blend-multiply filter blur-xl animate-blob animation-delay-2000"></div>
            <div class="absolute bottom-20 left-1/2 w-72 h-72 bg-yellow-200 rounded-full mix-blend-multiply filter blur-xl animate-blob animation-delay-4000"></div>
        </div>

        <div class="relative py-12 px-4 mx-auto max-w-screen-xl text-center lg:py-20 lg:px-12">
         

            <!-- Main Heading with Candle Icon -->
          

            <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-tight text-transparent bg-clip-text bg-gradient-to-r from-amber-700 via-orange-600 to-amber-700 md:text-5xl lg:text-7xl dark:from-amber-400 dark:via-orange-300 dark:to-amber-400">
                Illuminate Your Space<br/>
                <span class="text-gray-800 dark:text-white">With Handmade Candles</span>
            </h1>

            <p class="mb-8 text-lg font-normal text-gray-600 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-300 leading-relaxed">
                Discover our collection of unique, eco-friendly soy candles. Hand-poured with love, infused with natural essential oils, and designed to Bring your space to life.
            </p>

            <!-- CTA Buttons -->
            <div class="flex flex-col mb-12 lg:mb-16 space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4">
                <a href="#index" class="inline-flex justify-center items-center py-4 px-8 text-base font-semibold text-center text-white rounded-lg bg-gradient-to-r from-amber-600 to-orange-600 hover:from-amber-700 hover:to-orange-700 focus:ring-4 focus:ring-amber-300 dark:focus:ring-amber-800 shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
                    Shop Collection
                    <svg class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </a>
                <a href="/about" class="inline-flex justify-center items-center py-4 px-8 text-base font-semibold text-center text-amber-900 rounded-lg border-2 border-amber-600 hover:bg-amber-50 focus:ring-4 focus:ring-amber-200 dark:text-amber-300 dark:border-amber-500 dark:hover:bg-gray-800 dark:focus:ring-amber-700 transition-all duration-300">
                    <svg class="mr-2 -ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                        <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path>
                    </svg>
                    Our Story
                </a>  
            </div>

            <!-- Features Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12 max-w-4xl mx-auto">
                <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="text-amber-600 dark:text-amber-400 mb-3">
                        <svg class="w-10 h-10 mx-auto" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17,8C8,10 5.9,16.17 3.82,21.34L5.71,22L6.66,19.7C7.14,19.87 7.64,20 8,20C19,20 22,3 22,3C21,5 14,5.25 9,6.25C4,7.25 2,11.5 2,13.5C2,15.5 3.75,17.25 3.75,17.25C7,8 17,8 17,8Z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">100% Natural</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Made with pure soy wax and essential oils</p>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="text-amber-600 dark:text-amber-400 mb-3">
                        <svg class="w-10 h-10 mx-auto" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2M12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20A8,8 0 0,0 20,12A8,8 0 0,0 12,4M12,6A6,6 0 0,1 18,12A6,6 0 0,1 12,18A6,6 0 0,1 6,12A6,6 0 0,1 12,6M12,8A4,4 0 0,0 8,12A4,4 0 0,0 12,16A4,4 0 0,0 16,12A4,4 0 0,0 12,8Z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Hand-Poured</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Crafted with care in small batches</p>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="text-amber-600 dark:text-amber-400 mb-3">
                        <svg class="w-10 h-10 mx-auto" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4A8,8 0 0,1 20,12A8,8 0 0,1 12,20M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M12,12.5A1.5,1.5 0 0,1 10.5,11A1.5,1.5 0 0,1 12,9.5A1.5,1.5 0 0,1 13.5,11A1.5,1.5 0 0,1 12,12.5M12,7.2C9.9,7.2 8.2,8.9 8.2,11C8.2,14 12,17.5 12,17.5C12,17.5 15.8,14 15.8,11C15.8,8.9 14.1,7.2 12,7.2Z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Eco-Friendly</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Sustainable and biodegradable materials</p>
                </div>
            </div>

            <!-- Social Proof -->
            <div id="footer" class="px-4 mx-auto text-center md:max-w-screen-md lg:max-w-screen-lg py-12">
    <!-- Header with decorative elements -->
    <div class="relative mb-8">
        <div class="flex items-center justify-center mb-4">
            <div class="h-px w-16 bg-gradient-to-r from-transparent to-amber-400"></div>
            <svg class="w-6 h-6 mx-3 text-amber-500" fill="currentColor" viewBox="0 0 20 20">
                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
            </svg>
            <div class="h-px w-16 bg-gradient-to-l from-transparent to-amber-400"></div>
        </div>
        
        <h3  class="font-bold text-2xl md:text-3xl text-gray-900 dark:text-white mb-3">
            Create Your Signature Scent
        </h3>
        <p class="font-medium text-gray-600 dark:text-gray-300 uppercase tracking-wider text-sm">
            Want something unique? Message me for your own personalized candle
        </p>
        
        <!-- Decorative candle icon -->
        <div class="absolute -top-4 left-1/2 transform -translate-x-1/2 opacity-10">
            <svg class="w-32 h-32 text-amber-400" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12,2C11.5,2 11,2.19 10.59,2.59L10,3.17L9.41,2.59C8.61,1.79 7.3,1.79 6.5,2.59C5.7,3.39 5.7,4.7 6.5,5.5L10,9L10,22L14,22L14,9L17.5,5.5C18.3,4.7 18.3,3.39 17.5,2.59C16.7,1.79 15.39,1.79 14.59,2.59L14,3.17L13.41,2.59C13,2.19 12.5,2 12,2Z"/>
            </svg>
        </div>
    </div>

    <!-- Social Media Section -->
    <div  class="relative">
        <div class="inline-flex items-center justify-center w-full mb-6">
            <span class="px-3 text-sm font-medium text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-900">
                Connect With Us
            </span>
        </div>

        <div class="flex flex-wrap justify-center items-center gap-6">
            <!-- Instagram -->
            <a href="https://www.instagram.com/riris_candles/" 
               target="_blank"
               rel="noopener noreferrer"
               class="group relative flex flex-col items-center p-6 bg-gradient-to-br from-purple-50 to-pink-50 dark:from-purple-900/20 dark:to-pink-900/20 rounded-2xl border-2 border-purple-200 dark:border-purple-800 hover:border-purple-400 dark:hover:border-purple-600 transition-all duration-300 hover:shadow-xl hover:scale-105 min-w-[160px]">
                <!-- Icon Container -->
                <div class="relative mb-3">
                    <!-- Glow effect -->
                    <div class="absolute inset-0 bg-gradient-to-r from-purple-400 via-pink-500 to-red-500 rounded-full blur-lg opacity-0 group-hover:opacity-50 transition-opacity duration-300"></div>
                    <div class="relative w-14 h-14 bg-gradient-to-br from-purple-500 via-pink-500 to-red-500 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-all duration-300 shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M7.8,2H16.2C19.4,2 22,4.6 22,7.8V16.2A5.8,5.8 0 0,1 16.2,22H7.8C4.6,22 2,19.4 2,16.2V7.8A5.8,5.8 0 0,1 7.8,2M7.6,4A3.6,3.6 0 0,0 4,7.6V16.4C4,18.39 5.61,20 7.6,20H16.4A3.6,3.6 0 0,0 20,16.4V7.6C20,5.61 18.39,4 16.4,4H7.6M17.25,5.5A1.25,1.25 0 0,1 18.5,6.75A1.25,1.25 0 0,1 17.25,8A1.25,1.25 0 0,1 16,6.75A1.25,1.25 0 0,1 17.25,5.5M12,7A5,5 0 0,1 17,12A5,5 0 0,1 12,17A5,5 0 0,1 7,12A5,5 0 0,1 12,7M12,9A3,3 0 0,0 9,12A3,3 0 0,0 12,15A3,3 0 0,0 15,12A3,3 0 0,0 12,9Z"/>
                        </svg>
                    </div>
                </div>
                
                <!-- Text -->
                <span class="text-sm font-bold text-gray-900 dark:text-white mb-1">Instagram</span>
                <span class="text-xs text-gray-600 dark:text-gray-400">@riris_candles</span>
                
                <!-- Hover indicator -->
                <div class="absolute inset-x-0 bottom-0 h-1 bg-gradient-to-r from-purple-500 via-pink-500 to-red-500 rounded-b-2xl transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300"></div>
            </a>

            <!-- TikTok -->
            <a href="https://www.tiktok.com/@riris.candles?_r=1&_t=ZM-92TMllcWmfT&fbclid=PAZXh0bgNhZW0CMTEAc3J0YwZhcHBfaWQMMjU2MjgxMDQwNTU4AAGneDkrLImrYonsF7xU6j9RS3EXs19Dg7eFgISOCh35pivqXeT2EW6K20jHnCQ_aem_Ywt8fnEnL1a8tdBgelj0Bw" 
               target="_blank"
               rel="noopener noreferrer"
               class="group relative flex flex-col items-center p-6 bg-gradient-to-br from-cyan-50 to-blue-50 dark:from-cyan-900/20 dark:to-blue-900/20 rounded-2xl border-2 border-cyan-200 dark:border-cyan-800 hover:border-cyan-400 dark:hover:border-cyan-600 transition-all duration-300 hover:shadow-xl hover:scale-105 min-w-[160px]">
                <!-- Icon Container -->
                <div class="relative mb-3">
                    <!-- Glow effect -->
                    <div class="absolute inset-0 bg-gradient-to-r from-cyan-400 to-blue-500 rounded-full blur-lg opacity-0 group-hover:opacity-50 transition-opacity duration-300"></div>
                    <div class="relative w-14 h-14 bg-gradient-to-br from-cyan-500 to-blue-600 rounded-xl flex items-center justify-center transform group-hover:-rotate-12 transition-all duration-300 shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M16.6,5.82s.51.5,0,0A4.278,4.278,0,0,1,15.54,3h-3.09V12.4a2.592,2.592,0,0,1-2.59,2.5,2.592,2.592,0,0,1-2.59-2.5,2.592,2.592,0,0,1,2.59-2.5.681.681,0,0,1,.73.11V6.48a5.633,5.633,0,0,0-.73-.05A5.6,5.6,0,0,0,4.3,12.4a5.6,5.6,0,0,0,5.6,5.6,5.6,5.6,0,0,0,5.6-5.6V9.77a8.958,8.958,0,0,0,4.2,1.06V7.5A5.223,5.223,0,0,1,16.6,5.82Z"/>
                        </svg>
                    </div>
                </div>
                
                <!-- Text -->
                <span class="text-sm font-bold text-gray-900 dark:text-white mb-1">TikTok</span>
                <span class="text-xs text-gray-600 dark:text-gray-400">@riris.candles</span>
                
                <!-- Hover indicator -->
                <div class="absolute inset-x-0 bottom-0 h-1 bg-gradient-to-r from-cyan-500 to-blue-600 rounded-b-2xl transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300"></div>
            </a>

            <!-- Facebook (Optional - you can add it) -->
            <a href="https://www.facebook.com/profile.php?id=61583198642924" 
               target="_blank"
               rel="noopener noreferrer"
               class="group relative flex flex-col items-center p-6 bg-gradient-to-br from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 rounded-2xl border-2 border-blue-200 dark:border-blue-800 hover:border-blue-400 dark:hover:border-blue-600 transition-all duration-300 hover:shadow-xl hover:scale-105 min-w-[160px]">
                <!-- Icon Container -->
                <div class="relative mb-3">
                    <!-- Glow effect -->
                    <div class="absolute inset-0 bg-blue-500 rounded-full blur-lg opacity-0 group-hover:opacity-50 transition-opacity duration-300"></div>
                    <div class="relative w-14 h-14 bg-blue-600 rounded-xl flex items-center justify-center transform group-hover:rotate-12 transition-all duration-300 shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2.04C6.5 2.04 2 6.53 2 12.06C2 17.06 5.66 21.21 10.44 21.96V14.96H7.9V12.06H10.44V9.85C10.44 7.34 11.93 5.96 14.22 5.96C15.31 5.96 16.45 6.15 16.45 6.15V8.62H15.19C13.95 8.62 13.56 9.39 13.56 10.18V12.06H16.34L15.89 14.96H13.56V21.96A10 10 0 0 0 22 12.06C22 6.53 17.5 2.04 12 2.04Z"/>
                        </svg>
                    </div>
                </div>
                
                <!-- Text -->
                <span class="text-sm font-bold text-gray-900 dark:text-white mb-1">Facebook</span>
                <span class="text-xs text-gray-600 dark:text-gray-400">Riri's Candles</span>
                
                <!-- Hover indicator -->
                <div class="absolute inset-x-0 bottom-0 h-1 bg-blue-600 rounded-b-2xl transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300"></div>
            </a>

          
        </div>

        <!-- Call to Action -->
        <div class="mt-8 p-6 bg-gradient-to-r from-amber-50 via-orange-50 to-amber-50 dark:from-amber-900/20 dark:via-orange-900/20 dark:to-amber-900/20 rounded-2xl border-2 border-amber-200 dark:border-amber-800">
            <p class="text-sm text-gray-700 dark:text-gray-300 mb-3">
                <span class="font-semibold text-amber-700 dark:text-amber-400">✨ Special Order:</span> 
                Tell me your idea or special moment, and I’ll turn it into a beautiful candle made just for you
            </p>
            <div class="flex justify-center items-center space-x-2 text-xs text-gray-600 dark:text-gray-400">
                <svg class="w-4 h-4 text-amber-500" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                </svg>
                <span>Response time: Usually within 24 hours</span>
            </div>
        </div>
    </div>
</div>
            
        </div>
    </section>
</template>

<style scoped>
h1{
margin-top: 100px;
}
@keyframes blob {
    0%, 100% {
        transform: translate(0, 0) scale(1);
    }
    33% {
        transform: translate(30px, -50px) scale(1.1);
    }
    66% {
        transform: translate(-20px, 20px) scale(0.9);
    }
}

.animate-blob {
    animation: blob 7s infinite;
}

.animation-delay-2000 {
    animation-delay: 2s;
}

.animation-delay-4000 {
    animation-delay: 4s;
}
</style>