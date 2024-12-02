@include('layouts.nav')
<x-app-layout>
    <div class="container mx-auto py-10">
        <h1 class="text-3xl font-bold text-center mb-8">Daftar Laptop</h1>

        <!-- Card Produsen -->
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-6 mb-8">
            @foreach ($producers as $producer)
                <a href="{{ route('user.product', ['merk' => $producer->merk]) }}"
                   class="block bg-blue-500 text-white text-center rounded-lg shadow-md p-4 hover:bg-blue-600 transition">
                    <p class="text-lg font-bold">{{ $producer->merk }}</p>
                </a>
            @endforeach
        </div>

        <!-- Card Laptop -->
        <div class="grid grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6">
            @if($laptops->isNotEmpty())
                @foreach ($laptops as $laptop)
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                        <img src="{{ asset('storage/' . $laptop->gambar) }}" alt="{{ $laptop->merk }}" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h2 class="font-bold text-lg">{{ $laptop->merk }} {{ $laptop->model }}</h2>
                            <p class="text-gray-600 text-sm mt-2">{{ Str::limit($laptop->description, 50, '...') }}</p>
                            <p class="font-semibold text-blue-600 mt-3">Rp {{ number_format($laptop->harga, 0, ',', '.') }}</p>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="col-span-full text-center text-gray-600">Silakan pilih produsen untuk melihat laptop yang tersedia.</p>
            @endif
        </div>

    </div>
</x-app-layout>
