<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekomendasi Laptop</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900">
    <div class="container mx-auto py-8">
        <!-- Judul -->
        <h1 class="text-3xl font-bold text-center mb-6 text-blue-600">Rekomendasi Laptop</h1>

        <!-- Preferensi Pengguna -->
        <div class="bg-white shadow-md rounded-lg p-6 mb-8">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Preferensi Anda:</h2>
            <ul class="list-disc list-inside">
                @foreach ($userPreferences as $key => $value)
                    <li><strong>{{ ucfirst(str_replace('_', ' ', $key)) }}:</strong> {{ $value ?: '-' }}</li>
                @endforeach
            </ul>
        </div>

        <!-- Daftar Laptop -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse ($recommendations as $laptop)
                <div class="bg-blue-500 text-white rounded-lg shadow-lg p-4">
                    <!-- Gambar Laptop -->
                    <img src="{{ $laptop->gambar }}" alt="{{ $laptop->model }}" class="w-full h-48 object-cover rounded-lg mb-4">

                    <!-- Informasi Laptop -->
                    <h3 class="text-lg font-bold">{{ $laptop->merk }} - {{ $laptop->model }}</h3>
                    <p class="text-sm">Prosesor: {{ $laptop->processor }}</p>
                    <p class="text-sm">RAM: {{ $laptop->ukuran_ram }}</p>
                    <p class="text-sm mb-2">Storage: {{ $laptop->ukuran_storage }}</p>

                    <!-- Harga -->
                    <p class="text-xl font-bold">Rp {{ number_format($laptop->harga, 0, ',', '.') }}</p>
                </div>
            @empty
                <p class="text-gray-500 text-center col-span-full">Tidak ada laptop yang sesuai dengan preferensi Anda.</p>
            @endforelse
        </div>
    </div>
</body>
</html>
