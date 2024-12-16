@include('layouts.nav')
<x-app-layout>
    <body>
        @include('layouts/laptify')
        @include('layouts/merk')
        <div class="grid grid-cols-4 gap-8">
            @foreach($laptops as $laptop)
            <div class="bg-blue-400 rounded-lg shadow-lg p-4">
                <img src="{{ asset('storage/' . $laptop->gambar) }}" alt="{{ $laptop->model }}" class="w-full h-48 object-cover">
                <div class="mt-4">
                    <h2 class="text-xl font-bold text-gray-800">{{ $laptop->model }}</h2>
                    <p class="text-gray-600 text-sm mt-2">Prosesor: {{ $laptop->processor }}</p>
                    <p class="text-gray-600 text-sm mt-2">RAM: {{ $laptop->ram }} GB</p>
                    <p class="text-gray-600 text-sm mt-2">Storage: {{ $laptop->storage }} GB</p>
                    <p class="text-lg font-bold text-right text-gray-800 mt-2">Rp {{ number_format($laptop->harga, 0, ',', '.') }}</p>
                </div>
            </div>
            @endforeach
        </div>

        @include('layouts/slogan')
        @include('layouts/footer')
    </body>
</x-app-layout>
