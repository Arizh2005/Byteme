@include('layouts.nav')
<x-app-layout>
    <div class="max-w-full mx-auto px-8 py-8 sm:px-10 lg:px-12">
        <!-- Header -->
        <h1 class="text-4xl font-bold text-left mb-8 ml-8 text-blue-800">Find Your Ideal Laptop</h1>
        <hr class="border-t-2 border-blue-400 mb-8">

        <form action="{{ route('matching.check') }}" method="POST">
            @csrf
            <div class="grid grid-cols-2 gap-16">
                <!-- Spesifikasi Dasar -->
                <div class="bg-blue-100 p-6 rounded-lg shadow-md">
                    <h2 class="text-2xl font-bold text-blue-700 mb-6">Spesifikasi Dasar</h2>
                    <div class="grid grid-cols-1 gap-2">
                        <label for="merk">Merk</label>
                        <select name="merk" class="border p-2 rounded w-full mb-2">
                            <option value="">Pilih Merk</option>
                            <option value="Asus">Asus</option>
                            <option value="Dell">Dell</option>
                            <option value="HP">HP</option>
                        </select>

                        <label for="model">Model</label>
                        <input type="text" name="model" placeholder="Model" class="border p-2 rounded w-full mb-2">

                        <label for="sistem operasi">Sistem Operasi</label>
                        <select name="sistem_operasi" class="border p-2 rounded w-full mb-2">
                            <option value="">Pilih Sistem Operasi</option>
                            <option value="Windows 10">Windows 10</option>
                            <option value="Windows 11">Windows 11</option>
                            <option value="iOS">iOS</option>
                        </select>

                        <label for="processor">Processor</label>
                        <input type="text" name="prosesor" placeholder="Prosesor" class="border p-2 rounded w-full mb-2">

                        <label for="jenis ram">Jenis RAM</label>
                        <select name="jenis_ram" class="border p-2 rounded w-full mb-2">
                            <option value="">Pilih Jenis RAM</option>
                            <option value="DDR3">DDR3</option>
                            <option value="DDR4">DDR4</option>
                            <option value="DDR5">DDR5</option>
                        </select>

                        <label for="ukuran ram">Ukuran RAM</label>
                        <select name="ukuran_ram" class="border p-2 rounded w-full mb-2">
                            <option value="">Pilih Ukuran RAM</option>
                            <option value="4">4 GB</option>
                            <option value="8">8 GB</option>
                            <option value="16">16 GB</option>
                        </select>

                        <label for="jenis storage">Jenis Storage</label>
                        <select name="jenis_storage" class="border p-2 rounded w-full mb-2">
                            <option value="">Pilih Jenis Storage</option>
                            <option value="SSD">SSD</option>
                            <option value="HDD">HDD</option>
                        </select>

                        <label for="ukuran storage">Ukuran Storage</label>
                        <select name="besar_storage" class="border p-2 rounded w-full mb-2">
                            <option value="">Pilih Besar Storage</option>
                            <option value="256">256 GB</option>
                            <option value="512">512 GB</option>
                            <option value="1024">1 TB</option>
                        </select>

                        <label for="gpu">GPU</label>
                        <input type="text" name="gpu" placeholder="GPU" class="border p-2 rounded w-full">
                    </div>
                </div>

                <div class="grid grid-rows-2 gap-4">
                    <!-- Gambar -->
                    <div class="flex items-center justify-center">
                        <img src="images/laptify.png" alt="Laptify Image" class="w-2/3 h-2/3 object-contain">
                    </div>

                    <!-- Preferensi Anda -->
                    <div class="bg-yellow-100 p-6 rounded-lg shadow-md">
                        <h2 class="text-2xl font-bold text-yellow-600 mb-6">Preferensi Anda</h2>
                        <div class="grid grid-cols-1 gap-2">
                            <label for="min price">Harga Minimum</label>
                            <input type="number" name="min_price" placeholder="Harga Minimum" class="border p-2 rounded w-full mb-2">

                            <label for="max price">Harga Maksimum</label>
                            <input type="number" name="max_price" placeholder="Harga Maksimum" class="border p-2 rounded w-full mb-2">

                            <label for="ukuran layar">Ukuran Layar</label>
                            <input type="text" name="ukuran_layar" placeholder="Ukuran Layar" class="border p-2 rounded w-full mb-2">

                            <label for="tipe laptop">Tipe Laptop</label>
                            <select name="tipe_laptop" class="border p-2 rounded w-full">
                                <option value="">Pilih Tipe Laptop</option>
                                <option value="Gaming">Gaming</option>
                                <option value="Ultrabook">Ultrabook</option>
                                <option value="Workstation">Workstation</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Button -->
            <div class="mt-12">
                <button type="submit"
                    class="bg-blue-900 text-white py-3 px-8 rounded-lg shadow-lg hover:bg-blue-800 w-full text-center">
                    Find Your Laptop
                </button>
            </div>
        </form>
    </div>
</x-app-layout>

@include('layouts.footer')
