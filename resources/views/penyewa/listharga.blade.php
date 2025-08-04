@extends('penyewa.layouts.app')

@section('title', 'Daftar Harga')

@section('content')
    <!-- Page Header -->
    <section class="pt-24 pb-8 bg-gradient-to-br from-indigo-50 to-purple-50">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 text-center">
            <h1 class="text-4xl sm:text-5xl font-bold text-gray-900 mb-4" data-aos="fade-up">
                Daftar Harga Sewa Bus
            </h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto" data-aos="fade-up" data-aos-delay="100">
                Informasi lengkap harga sewa bus pariwisata untuk berbagai destinasi dan tipe bus
            </p>
        </div>
    </section>

    <!-- Price Tables Section -->
    <section class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 space-y-12">
            
            <!-- Kantor Cabang Tangerang -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden" data-aos="fade-up">
                <div class="bg-gradient-to-r from-indigo-600 to-purple-600 p-6">
                    <h2 class="text-2xl font-bold text-white flex items-center">
                        <i class="fas fa-building mr-3"></i>
                        Kantor Cabang Tangerang
                    </h2>
                    <p class="text-indigo-100 mt-2">Harga sewa bus dari kantor cabang Tangerang</p>
                </div>
                
                <div class="p-6 overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="bg-gray-50">
                                <th class="px-4 py-3 text-left font-semibold text-gray-900 rounded-tl-lg">Tujuan</th>
                                <th class="px-4 py-3 text-center font-semibold text-gray-900">Big Bus 46 (2-2)</th>
                                <th class="px-4 py-3 text-center font-semibold text-gray-900">Big Bus 50 (2-2)</th>
                                <th class="px-4 py-3 text-center font-semibold text-gray-900">Big Bus 59 (2-3)</th>
                                <th class="px-4 py-3 text-center font-semibold text-gray-900">Medium Bus 35</th>
                                <th class="px-4 py-3 text-center font-semibold text-gray-900">Micro ELF 18</th>
                                <th class="px-4 py-3 text-center font-semibold text-gray-900">Micro Hiace 14</th>
                                <th class="px-4 py-3 text-center font-semibold text-gray-900 rounded-tr-lg">Min. Sewa</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <tr class="hover:bg-gray-50 transition-colors duration-200">
                                <td class="px-4 py-3 font-medium text-gray-900">Jakarta / Ancol / TMII</td>
                                <td class="px-4 py-3 text-center text-indigo-600 font-semibold">Rp. 3.200.000</td>
                                <td class="px-4 py-3 text-center text-indigo-600 font-semibold">Rp. 3.200.000</td>
                                <td class="px-4 py-3 text-center text-indigo-600 font-semibold">Rp. 3.200.000</td>
                                <td class="px-4 py-3 text-center text-indigo-600 font-semibold">Rp. 2.700.000</td>
                                <td class="px-4 py-3 text-center text-indigo-600 font-semibold">Rp. 2.400.000</td>
                                <td class="px-4 py-3 text-center text-indigo-600 font-semibold">Rp. 2.400.000</td>
                                <td class="px-4 py-3 text-center text-gray-600">1 hari</td>
                            </tr>
                            <tr class="hover:bg-gray-50 transition-colors duration-200">
                                <td class="px-4 py-3 font-medium text-gray-900">Bogor / Puncak</td>
                                <td class="px-4 py-3 text-center text-indigo-600 font-semibold">Rp. 4.000.000</td>
                                <td class="px-4 py-3 text-center text-indigo-600 font-semibold">Rp. 4.000.000</td>
                                <td class="px-4 py-3 text-center text-indigo-600 font-semibold">Rp. 4.000.000</td>
                                <td class="px-4 py-3 text-center text-indigo-600 font-semibold">Rp. 3.500.000</td>
                                <td class="px-4 py-3 text-center text-indigo-600 font-semibold">Rp. 3.200.000</td>
                                <td class="px-4 py-3 text-center text-indigo-600 font-semibold">Rp. 3.200.000</td>
                                <td class="px-4 py-3 text-center text-gray-600">1 hari</td>
                            </tr>
                            <tr class="hover:bg-gray-50 transition-colors duration-200">
                                <td class="px-4 py-3 font-medium text-gray-900">P. Carita / P. Anyer</td>
                                <td class="px-4 py-3 text-center text-indigo-600 font-semibold">Rp. 5.000.000</td>
                                <td class="px-4 py-3 text-center text-indigo-600 font-semibold">Rp. 5.000.000</td>
                                <td class="px-4 py-3 text-center text-indigo-600 font-semibold">Rp. 5.000.000</td>
                                <td class="px-4 py-3 text-center text-indigo-600 font-semibold">Rp. 4.500.000</td>
                                <td class="px-4 py-3 text-center text-indigo-600 font-semibold">Rp. 4.200.000</td>
                                <td class="px-4 py-3 text-center text-indigo-600 font-semibold">Rp. 4.200.000</td>
                                <td class="px-4 py-3 text-center text-gray-600">1 hari</td>
                            </tr>
                            <tr class="hover:bg-gray-50 transition-colors duration-200">
                                <td class="px-4 py-3 font-medium text-gray-900">Bandung / Ciater</td>
                                <td class="px-4 py-3 text-center text-indigo-600 font-semibold">Rp. 5.200.000</td>
                                <td class="px-4 py-3 text-center text-indigo-600 font-semibold">Rp. 5.200.000</td>
                                <td class="px-4 py-3 text-center text-indigo-600 font-semibold">Rp. 5.200.000</td>
                                <td class="px-4 py-3 text-center text-indigo-600 font-semibold">Rp. 4.700.000</td>
                                <td class="px-4 py-3 text-center text-indigo-600 font-semibold">Rp. 4.400.000</td>
                                <td class="px-4 py-3 text-center text-indigo-600 font-semibold">Rp. 4.400.000</td>
                                <td class="px-4 py-3 text-center text-gray-600">1 hari</td>
                            </tr>
                            <tr class="hover:bg-gray-50 transition-colors duration-200">
                                <td class="px-4 py-3 font-medium text-gray-900">Pangandaran</td>
                                <td class="px-4 py-3 text-center text-indigo-600 font-semibold">Rp. 9.500.000</td>
                                <td class="px-4 py-3 text-center text-indigo-600 font-semibold">Rp. 9.500.000</td>
                                <td class="px-4 py-3 text-center text-indigo-600 font-semibold">Rp. 9.500.000</td>
                                <td class="px-4 py-3 text-center text-indigo-600 font-semibold">Rp. 7.500.000</td>
                                <td class="px-4 py-3 text-center text-indigo-600 font-semibold">Rp. 7.200.000</td>
                                <td class="px-4 py-3 text-center text-indigo-600 font-semibold">Rp. 7.200.000</td>
                                <td class="px-4 py-3 text-center text-gray-600">2 hari</td>
                            </tr>
                            <tr class="hover:bg-gray-50 transition-colors duration-200">
                                <td class="px-4 py-3 font-medium text-gray-900">Pelabuhan Ratu / Tanjung Lesung</td>
                                <td class="px-4 py-3 text-center text-indigo-600 font-semibold">Rp. 7.000.000</td>
                                <td class="px-4 py-3 text-center text-indigo-600 font-semibold">Rp. 7.000.000</td>
                                <td class="px-4 py-3 text-center text-indigo-600 font-semibold">Rp. 7.000.000</td>
                                <td class="px-4 py-3 text-center text-indigo-600 font-semibold">Rp. 6.000.000</td>
                                <td class="px-4 py-3 text-center text-indigo-600 font-semibold">Rp. 5.400.000</td>
                                <td class="px-4 py-3 text-center text-indigo-600 font-semibold">Rp. 5.400.000</td>
                                <td class="px-4 py-3 text-center text-gray-600">2 hari</td>
                            </tr>
                            <tr class="hover:bg-gray-50 transition-colors duration-200">
                                <td class="px-4 py-3 font-medium text-gray-900">Jogja / Solo</td>
                                <td class="px-4 py-3 text-center text-indigo-600 font-semibold">Rp. 15.000.000</td>
                                <td class="px-4 py-3 text-center text-indigo-600 font-semibold">Rp. 15.000.000</td>
                                <td class="px-4 py-3 text-center text-indigo-600 font-semibold">Rp. 15.000.000</td>
                                <td class="px-4 py-3 text-center text-indigo-600 font-semibold">Rp. 13.500.000</td>
                                <td class="px-4 py-3 text-center text-indigo-600 font-semibold">Rp. 12.600.000</td>
                                <td class="px-4 py-3 text-center text-indigo-600 font-semibold">Rp. 12.600.000</td>
                                <td class="px-4 py-3 text-center text-gray-600">3 hari</td>
                            </tr>
                            <tr class="hover:bg-gray-50 transition-colors duration-200 bg-yellow-50">
                                <td class="px-4 py-3 font-medium text-gray-900">Bali</td>
                                <td class="px-4 py-3 text-center text-yellow-600 font-bold">Rp. 24.000.000</td>
                                <td class="px-4 py-3 text-center text-yellow-600 font-bold">Rp. 24.000.000</td>
                                <td class="px-4 py-3 text-center text-yellow-600 font-bold">Rp. 24.000.000</td>
                                <td class="px-4 py-3 text-center text-yellow-600 font-bold">Rp. 20.500.000</td>
                                <td class="px-4 py-3 text-center text-yellow-600 font-bold">Rp. 18.400.000</td>
                                <td class="px-4 py-3 text-center text-yellow-600 font-bold">Rp. 18.400.000</td>
                                <td class="px-4 py-3 text-center text-gray-600 font-medium">7 hari</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Kantor Cabang Jakarta -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden" data-aos="fade-up" data-aos-delay="200">
                <div class="bg-gradient-to-r from-green-600 to-teal-600 p-6">
                    <h2 class="text-2xl font-bold text-white flex items-center">
                        <i class="fas fa-building mr-3"></i>
                        Kantor Cabang Jakarta
                    </h2>
                    <p class="text-green-100 mt-2">Harga sewa bus dari kantor cabang Jakarta</p>
                </div>
                
                <div class="p-6 overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="bg-gray-50">
                                <th class="px-4 py-3 text-left font-semibold text-gray-900 rounded-tl-lg">Tujuan</th>
                                <th class="px-4 py-3 text-center font-semibold text-gray-900">Big Bus 46 (2-2)</th>
                                <th class="px-4 py-3 text-center font-semibold text-gray-900">Big Bus 50 (2-2)</th>
                                <th class="px-4 py-3 text-center font-semibold text-gray-900">Big Bus 59 (2-3)</th>
                                <th class="px-4 py-3 text-center font-semibold text-gray-900">Medium Bus 35</th>
                                <th class="px-4 py-3 text-center font-semibold text-gray-900">Micro ELF 18</th>
                                <th class="px-4 py-3 text-center font-semibold text-gray-900">Micro Hiace 14</th>
                                <th class="px-4 py-3 text-center font-semibold text-gray-900 rounded-tr-lg">Min. Sewa</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <tr class="hover:bg-gray-50 transition-colors duration-200">
                                <td class="px-4 py-3 font-medium text-gray-900">Jakarta / Ancol / TMII</td>
                                <td class="px-4 py-3 text-center text-green-600 font-semibold">Rp. 3.000.000</td>
                                <td class="px-4 py-3 text-center text-green-600 font-semibold">Rp. 3.000.000</td>
                                <td class="px-4 py-3 text-center text-green-600 font-semibold">Rp. 3.000.000</td>
                                <td class="px-4 py-3 text-center text-green-600 font-semibold">Rp. 2.500.000</td>
                                <td class="px-4 py-3 text-center text-green-600 font-semibold">Rp. 2.200.000</td>
                                <td class="px-4 py-3 text-center text-green-600 font-semibold">Rp. 2.200.000</td>
                                <td class="px-4 py-3 text-center text-gray-600">1 hari</td>
                            </tr>
                            <tr class="hover:bg-gray-50 transition-colors duration-200 bg-yellow-50">
                                <td class="px-4 py-3 font-medium text-gray-900">Bali</td>
                                <td class="px-4 py-3 text-center text-yellow-600 font-bold">Rp. 23.800.000</td>
                                <td class="px-4 py-3 text-center text-yellow-600 font-bold">Rp. 23.800.000</td>
                                <td class="px-4 py-3 text-center text-yellow-600 font-bold">Rp. 23.800.000</td>
                                <td class="px-4 py-3 text-center text-yellow-600 font-bold">Rp. 20.300.000</td>
                                <td class="px-4 py-3 text-center text-yellow-600 font-bold">Rp. 18.200.000</td>
                                <td class="px-4 py-3 text-center text-yellow-600 font-bold">Rp. 18.200.000</td>
                                <td class="px-4 py-3 text-center text-gray-600 font-medium">7 hari</td>
                            </tr>
                            <!-- Add more rows as needed, condensed for space -->
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Kantor Cabang Depok -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden" data-aos="fade-up" data-aos-delay="300">
                <div class="bg-gradient-to-r from-purple-600 to-pink-600 p-6">
                    <h2 class="text-2xl font-bold text-white flex items-center">
                        <i class="fas fa-building mr-3"></i>
                        Kantor Cabang Depok
                    </h2>
                    <p class="text-purple-100 mt-2">Harga sewa bus dari kantor cabang Depok</p>
                </div>
                
                <div class="p-6 overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="bg-gray-50">
                                <th class="px-4 py-3 text-left font-semibold text-gray-900 rounded-tl-lg">Tujuan</th>
                                <th class="px-4 py-3 text-center font-semibold text-gray-900">Big Bus 46 (2-2)</th>
                                <th class="px-4 py-3 text-center font-semibold text-gray-900">Big Bus 50 (2-2)</th>
                                <th class="px-4 py-3 text-center font-semibold text-gray-900">Big Bus 59 (2-3)</th>
                                <th class="px-4 py-3 text-center font-semibold text-gray-900">Medium Bus 35</th>
                                <th class="px-4 py-3 text-center font-semibold text-gray-900">Micro ELF 18</th>
                                <th class="px-4 py-3 text-center font-semibold text-gray-900">Micro Hiace 14</th>
                                <th class="px-4 py-3 text-center font-semibold text-gray-900 rounded-tr-lg">Min. Sewa</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <tr class="hover:bg-gray-50 transition-colors duration-200">
                                <td class="px-4 py-3 font-medium text-gray-900">Bogor / Puncak</td>
                                <td class="px-4 py-3 text-center text-purple-600 font-semibold">Rp. 3.800.000</td>
                                <td class="px-4 py-3 text-center text-purple-600 font-semibold">Rp. 3.800.000</td>
                                <td class="px-4 py-3 text-center text-purple-600 font-semibold">Rp. 3.800.000</td>
                                <td class="px-4 py-3 text-center text-purple-600 font-semibold">Rp. 3.300.000</td>
                                <td class="px-4 py-3 text-center text-purple-600 font-semibold">Rp. 3.000.000</td>
                                <td class="px-4 py-3 text-center text-purple-600 font-semibold">Rp. 3.000.000</td>
                                <td class="px-4 py-3 text-center text-gray-600">1 hari</td>
                            </tr>
                            <tr class="hover:bg-gray-50 transition-colors duration-200 bg-yellow-50">
                                <td class="px-4 py-3 font-medium text-gray-900">Bali</td>
                                <td class="px-4 py-3 text-center text-yellow-600 font-bold">Rp. 24.000.000</td>
                                <td class="px-4 py-3 text-center text-yellow-600 font-bold">Rp. 24.000.000</td>
                                <td class="px-4 py-3 text-center text-yellow-600 font-bold">Rp. 24.000.000</td>
                                <td class="px-4 py-3 text-center text-yellow-600 font-bold">Rp. 20.500.000</td>
                                <td class="px-4 py-3 text-center text-yellow-600 font-bold">Rp. 18.400.000</td>
                                <td class="px-4 py-3 text-center text-yellow-600 font-bold">Rp. 18.400.000</td>
                                <td class="px-4 py-3 text-center text-gray-600 font-medium">7 hari</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Important Notes -->
            <div class="bg-blue-50 rounded-2xl p-8" data-aos="fade-up" data-aos-delay="400">
                <h3 class="text-2xl font-bold text-blue-900 mb-6 flex items-center">
                    <i class="fas fa-info-circle mr-3"></i>
                    Catatan Penting
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-blue-800">
                    <div class="space-y-3">
                        <div class="flex items-start">
                            <i class="fas fa-check-circle text-blue-500 mr-3 mt-1"></i>
                            <p>Harga sudah termasuk driver dan BBM</p>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-check-circle text-blue-500 mr-3 mt-1"></i>
                            <p>Fasilitas AC, TV, Karaoke, dan Charging Port</p>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-check-circle text-blue-500 mr-3 mt-1"></i>
                            <p>Asuransi perjalanan untuk penumpang</p>
                        </div>
                    </div>
                    <div class="space-y-3">
                        <div class="flex items-start">
                            <i class="fas fa-exclamation-triangle text-yellow-500 mr-3 mt-1"></i>
                            <p>Harga dapat berubah sewaktu-waktu</p>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-exclamation-triangle text-yellow-500 mr-3 mt-1"></i>
                            <p>Biaya tol dan parkir ditanggung penyewa</p>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-exclamation-triangle text-yellow-500 mr-3 mt-1"></i>
                            <p>Konfirmasi harga saat booking</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CTA Section -->
            <div class="text-center" data-aos="fade-up" data-aos-delay="500">
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Siap untuk Booking?</h3>
                <p class="text-gray-600 mb-8 max-w-2xl mx-auto">
                    Dapatkan penawaran terbaik untuk perjalanan Anda. Tim kami siap membantu mencarikan bus yang sesuai dengan kebutuhan dan budget Anda.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="/bookingpage" 
                       class="bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white font-semibold px-8 py-4 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                        <i class="fas fa-calendar-check mr-2"></i>
                        Booking Sekarang
                    </a>
                    <a href="tel:+6281234567890" 
                       class="border-2 border-indigo-300 hover:border-indigo-500 text-indigo-600 hover:text-indigo-800 font-semibold px-8 py-4 rounded-xl transition-all duration-300">
                        <i class="fas fa-phone mr-2"></i>
                        Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection