@include('layouts.nav')
<x-app-layout>
    <div class="max-w-4xl mx-auto px-8 py-8 sm:px-10 lg:px-12">
        <!-- Header -->
        <h1 class="text-4xl font-bold text-left mb-8 ml-8 text-blue-800">{{ $laptop->model }}</h1>
        <hr class="border-t-2 border-blue-400 mb-8">

        <!-- Detail Laptop -->
        <div class="flex items-center">
            <!-- Gambar -->
            <div class="w-1/3">
                @if($laptop->gambar)
                <img src="{{ asset('storage/' . $laptop->gambar) }}" alt="Gambar Laptop" class="w-full h-auto object-cover rounded">
                @else
                <p class="text-gray-500">Tidak ada gambar</p>
                @endif
            </div>

            <!-- Informasi Detail -->
            <div class="w-2/3 px-8">
                <ul class="space-y-2">
                    <li><strong>Merk:</strong> {{ $laptop->merk }}</li>
                    <li><strong>Model:</strong> {{ $laptop->model }}</li>
                    <li><strong>Tipe Laptop:</strong> {{ $laptop->tipe_laptop }}</li>
                    <li><strong>Processor:</strong> {{ $laptop->processor }}</li>
                    <li><strong>Sistem Operasi:</strong> {{ $laptop->sistem_operasi }}</li>
                    <li><strong>RAM:</strong> {{ $laptop->besar_ram }} GB ({{ $laptop->jenis_ram }})</li>
                    <li><strong>Storage:</strong> {{ $laptop->besar_storage }} GB ({{ $laptop->jenis_storage }})</li>
                    <li><strong>GPU:</strong> {{ $laptop->gpu }}</li>
                    <li><strong>Ukuran Layar:</strong> {{ $laptop->ukuran_layar }}"</li>
                    <li><strong>Harga:</strong> Rp {{ number_format($laptop->harga, 0, ',', '.') }}</li>
                    <li><strong>Official Store :</strong>{{$laptop->link}}</li>
                </ul>
            </div>
        </div>

        <!-- Tombol Kembali -->
        <div class="mt-8">
            <a href="{{ route('match.form')}}" class="bg-blue-800 text-white px-4 py-2 rounded hover:bg-blue-900">Kembali</a>
        </div>
    </div>
</x-app-layout>

@include('layouts.footer')
