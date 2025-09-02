<footer class="bg-gray-900 relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0">
        <div class="absolute top-0 left-0 w-64 h-64 bg-indigo-600/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-64 h-64 bg-purple-600/10 rounded-full blur-3xl"></div>
    </div>
    
    <!-- Main Footer Content -->
    <div class="relative max-w-6xl mx-auto px-4 sm:px-6 py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-12">
            
            <!-- Company Info -->
            <div class="lg:col-span-2 space-y-6">
                <div class="flex items-center space-x-3">
                    <!-- <img src="{{ asset('/penyewatemplate') }}/assets/img/baru2/logo-xyz.svg" 
                         alt="PO XYZ" class="h-10"> -->
                    <div>
                        <h3 class="text-xl font-bold text-white">PO XYZ</h3>
                        <p class="text-sm text-gray-400">Pariwisata Terpercaya</p>
                    </div>
                </div>
                
                <p class="text-gray-300 leading-relaxed max-w-md">
                    Perusahaan penyewaan bus pariwisata terkemuka di Indonesia yang mengutamakan 
                    kenyamanan, keselamatan, dan pelayanan terbaik untuk setiap perjalanan Anda.
                </p>
                
                <!-- Social Media -->
                <div class="flex space-x-4">
                    <a href="#" 
                       class="group w-10 h-10 bg-gray-800 hover:bg-gradient-to-br hover:from-pink-500 hover:to-orange-400 rounded-lg flex items-center justify-center transition-all duration-300">
                        <i class="fab fa-instagram text-gray-400 group-hover:text-white transition-colors duration-300"></i>
                    </a>
                    <a href="#" 
                       class="group w-10 h-10 bg-gray-800 hover:bg-green-500 rounded-lg flex items-center justify-center transition-all duration-300">
                        <i class="fab fa-whatsapp text-gray-400 group-hover:text-white transition-colors duration-300"></i>
                    </a>
                    <a href="#" 
                       class="group w-10 h-10 bg-gray-800 hover:bg-blue-500 rounded-lg flex items-center justify-center transition-all duration-300">
                        <i class="fab fa-facebook text-gray-400 group-hover:text-white transition-colors duration-300"></i>
                    </a>
                </div>
            </div>
            
            <!-- Quick Links -->
            <div class="space-y-6">
                <h4 class="text-lg font-semibold text-white">Menu</h4>
                <nav class="space-y-3">
                    <a href="/" 
                       class="block text-gray-300 hover:text-indigo-400 transition-colors duration-200">
                        Home
                    </a>
                    <a href="/about" 
                       class="block text-gray-300 hover:text-indigo-400 transition-colors duration-200">
                        About Us
                    </a>
                    <a href="/bookingpage" 
                       class="block text-gray-300 hover:text-indigo-400 transition-colors duration-200">
                        Booking
                    </a>
                    <a href="/listharga" 
                       class="block text-gray-300 hover:text-indigo-400 transition-colors duration-200">
                        Pricing
                    </a>
                    <a href="/maps" 
                       class="block text-gray-300 hover:text-indigo-400 transition-colors duration-200">
                        Maps
                    </a>
                </nav>
            </div>
            
            <!-- Contact Info -->
            <div class="space-y-6">
                <h4 class="text-lg font-semibold text-white">Kontak</h4>
                <div class="space-y-4">
                    <div class="flex items-start space-x-3">
                        <div class="w-5 h-5 text-indigo-400 mt-0.5">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <p class="text-gray-300 text-sm leading-relaxed">
                            Jl. Kyai Maja, RT.004/RW.002<br>
                            Panunggangan, Kec. Pinang<br>
                            Kota Tangerang, Banten 15143
                        </p>
                    </div>
                    
                    <div class="flex items-center space-x-3">
                        <div class="w-5 h-5 text-indigo-400">
                            <i class="fas fa-phone"></i>
                        </div>
                        <a href="tel:+6281234567890" 
                           class="text-gray-300 hover:text-indigo-400 transition-colors duration-200 text-sm">
                            +62 812 3456 7890
                        </a>
                    </div>
                    
                    <div class="flex items-center space-x-3">
                        <div class="w-5 h-5 text-indigo-400">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <a href="mailto:poxyz@gmail.com" 
                           class="text-gray-300 hover:text-indigo-400 transition-colors duration-200 text-sm">
                            poxyz@gmail.com
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bottom Bar -->
    <div class="relative border-t border-gray-800">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 py-6">
            <div class="flex flex-col sm:flex-row justify-between items-center space-y-2 sm:space-y-0">
                <p class="text-gray-400 text-sm">
                    &copy; {{ date('Y') }} PO XYZ Pariwisata. Semua hak dilindungi.
                </p>
                <p class="text-gray-500 text-sm">
                    Dibuat dengan <span class="text-red-400">♥</span> oleh 
                    <a href="https://bootstrapmade.com/" 
                       class="text-indigo-400 hover:text-indigo-300 transition-colors duration-200">
                        BootstrapMade
                    </a>
                </p>
            </div>
        </div>
    </div>
</footer>