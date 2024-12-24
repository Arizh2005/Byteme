@include('layouts.nav')
<x-app-layout>
    <body>
        @include('layouts/laptify')
        @include('layouts/merk')
        <div class="grid grid-cols-4 gap-8">
            @foreach($mostViewedProducts as $product)
                <div class="bg-blue-400 rounded-lg shadow-lg p-4">
                    <img src="{{ asset('storage/' . $product->gambar) }}" alt="{{ $product->model }}" class="w-full h-40 object-cover">
                    <h3 class="font-semibold text-lg">{{ $product->merk }} - {{ $product->model }}</h3>
                    <p class="text-gray-600 text-sm mt-2">Processor: {{ $product->processor }}</p>
                    <p class="text-gray-600 text-sm mt-2">RAM: {{ $product->ukuran_ram }} GB</p>
                    <p class="text-gray-600 text-sm mt-2">Storage: {{ $product->ukuran_storage }} GB</p>
                    <p class="text-lg font-bold text-right text-gray-800 mt-2">Rp {{ number_format($product->harga, 0, ',', '.') }}</p>
                </div>
            @endforeach
        </div>

        @include('layouts/slogan')
        @include('layouts/footer')
    </body>
</x-app-layout>
