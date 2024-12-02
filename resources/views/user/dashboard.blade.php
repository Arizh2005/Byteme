@include('layouts.nav')
<x-app-layout>
    <body>
        @include('layouts/laptify')
        @include('layouts/merk')
        <div class="flex gap-10 pt-10 p-8 mt-7 mr-12 ml-12 bg-yellow-50 shadow-md min-h-[400px]">
            <div class="container mx-auto py-8 mb-8">
                <h2 class="text-4xl md:text-5xl text-center font-bold text-blue-900 leading-tight mb-12">Rekomendasi Untukmu</h2>
                <div class="grid grid-cols-4 gap-8">
                    @foreach($laptops as $laptop)
                    <div class="bg-blue-400 rounded-lg shadow-lg p-4">
                        <img src="{{ asset('storage/' . $laptop->gambar) }}" alt="{{ $laptop->model }}" class="w-full h-48 object-cover">
                        <div class="mt-4">
                            <h2 class="text-xl font-bold text-gray-800">{{ $laptop->model }}</h2>
                            <p class="text-gray-600 text-sm mt-2">{{ Str::limit($laptop->description, 50, '...') }}</p>
                            <p class="text-lg font-bold text-right text-gray-800 mt-2">Rp {{ number_format($laptop->harga, 0, ',', '.') }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- View More Button -->
                <div class="flex justify-center mt-12">
                    <button class="bg-gray-800 text-white py-2 px-6 rounded-md hover:bg-gray-700">
                        View More
                    </button>
                </div>
            </div>
        </div>
        @include('layouts/slogan')
        @include('layouts/footer')
    </body>
</x-app-layout>
