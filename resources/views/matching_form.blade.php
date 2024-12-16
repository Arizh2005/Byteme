<!-- Tambahkan Link Google Fonts di sini -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Jua&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

@include('layouts.nav')
<x-app-layout>
    <div class="max-w-full mx-auto px-8 py-8 sm:px-10 lg:px-12">
        <!-- Header -->
        <h1 class="text-5xl md:text-5xl font-jua text-darkblue text-left mb-8 ml-8">Find Your Ideal Laptop</h1>
        <hr class="border-t-2 border-darkblue mb-8">

        <form action="{{ route('matching.check') }}" method="POST">
            @csrf
            <div class="grid grid-cols-2 gap-16">
                <!-- Spesifikasi Dasar -->
                <div class="bg-iceblue p-6 rounded-lg shadow-md">
                    <h2 class="text-2xl font-poppins font-semibold text-darkblue mb-6">Spesifikasi Dasar</h2>
                    <div class="grid grid-cols-1 gap-2 text-base font-inter font-normal">
                        <label for="merk">Merk</label>
                        <input type="text" name="merk" placeholder="Merk" class="border p-2 rounded w-full mb-2">

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
                        <input type="text" name="processor" placeholder="Prosesor" class="border p-2 rounded w-full mb-2">

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
                    <div class="bg-creamy p-6 rounded-lg shadow-md">
                        <h2 class="text-2xl font-poppins font-semibold text-darkblue mb-6">Preferensi Anda</h2>
                        <div class="grid grid-cols-1 gap-2 text-base font-inter font-normal">
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
                    class="text-base bg-darkblue font-inter font-semibold text-white py-3 px-8 rounded-lg shadow-lg hover:bg-iceblue w-full text-center">
                    Find Your Laptop
                </button>
            </div>
        </form>
    </div>
</x-app-layout>

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const formElements = document.querySelectorAll(
            'input[name], select[name]'
        );

        formElements.forEach(element => {
            element.addEventListener('change', () => {
                const formData = new FormData();

                formElements.forEach(input => {
                    if (input.name) {
                        formData.append(input.name, input.value);
                    }
                });

                axios.post('{{ route('preferences.save') }}', formData)
                    .then(response => {
                        console.log(response.data.message);
                    })
                    .catch(error => {
                        console.error('Error saving preferences:', error);
                    });
            });
        });
    });
</script>


@include('layouts.footer')
