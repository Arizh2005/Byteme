@include('layouts.nav')
<x-app-layout>
    <div class="max-w-full mx-auto px-8 py-8 sm:px-10 lg:px-12">
        <!-- Header -->
        <h1 class="text-4xl font-bold text-left mb-8 ml-8 text-blue-800">Hasil Pencarian</h1>
        <hr class="border-t-2 border-blue-400 mb-8">

        <!-- Hasil Pencarian -->
        @if(isset($matchingLaptops))
        <div class="grid grid-cols-1 gap-6">
            @forelse($matchingLaptops as $laptop)
            <div class="border p-6 rounded-lg shadow-md bg-yellow-50 flex items-center">
                <!-- Gambar -->
                <div class="w-1/4">
                    @if($laptop->gambar)
                    <img src="{{ asset('storage/' . $laptop->gambar) }}" alt="Gambar Laptop" class="w-full h-32 object-cover rounded">
                    @else
                    <p class="text-gray-500">Tidak ada gambar</p>
                    @endif
                </div>

                <!-- Detail Laptop -->
                <div class="w-2/4 px-4">
                    <h2 class="text-2xl font-bold mb-2 text-blue-900">{{ $laptop->model }}</h2>
                    <p class="text-gray-600">By {{ $laptop->merk }}</p>
                    <ul class="mt-2 text-gray-700 space-y-1">
                        <li><strong>Tipe Laptop:</strong> {{ $laptop->tipe_laptop }}</li>
                        <li><strong>Processor:</strong> {{ $laptop->processor }}</li>
                        <li><strong>Ukuran Layar:</strong> {{ $laptop->ukuran_layar }}"</li>
                        <li><strong>RAM:</strong> {{ $laptop->ukuran_ram }} GB</li>
                        <li><strong>Storage:</strong> {{ $laptop->ukuran_storage }} GB {{ $laptop->jenis_storage }}</li>
                    </ul>
                </div>

                <!-- Harga dan Tombol -->
                <div class="w-1/4 text-center">
                    <p class="text-xl font-semibold text-blue-900 mb-4">Rp {{ number_format($laptop->harga, 0, ',', '.') }}</p>
                    <a href="{{ route('user.detail', $laptop->id) }}" class="bg-blue-800 text-white px-4 py-2 rounded hover:bg-blue-900">Lihat Detail</a>
                </div>
            </div>
            @empty
            <p class="text-red-500">Data Not Found</p>
            @endforelse
        </div>
        @endif
    </div>
</x-app-layout>

@include('layouts.footer')
