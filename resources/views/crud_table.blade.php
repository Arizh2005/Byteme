<x-admin-layout>
    <div class="max-w-6xl mx-auto bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-4">Kelola Data Laptop</h1>

        <!-- Notifikasi Sukses -->
        @if(session('success'))
            <div class="mb-4 text-green-600 bg-green-100 p-3 rounded">
                {{ session('success') }}
            </div>
        @endif

        <!-- Form Tambah Laptop Baru -->
        <form action="{{ route('crud_table.index') }}" method="GET" class="mb-6 flex gap-4">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari berdasarkan merk atau model" class="border p-2 rounded w-full">
            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Cari</button>
        </form>

        <form action="{{ route('crud_table.store') }}" method="POST" enctype="multipart/form-data" class="mb-6">
            @csrf
            <div class="grid grid-cols-2 gap-4">
                <input type="text" name="merk" placeholder="Merk" required class="border p-2 rounded">
                <input type="text" name="model" placeholder="Model" required class="border p-2 rounded">
                <input type="text" name="processor" placeholder="Processor" required class="border p-2 rounded">
                <select name="jenis_ram" id="jenis_ram" required class="border p-2 rounded w-full">
                    <option value="DDR3">DDR3</option>
                    <option value="DDR4">DDR4</option>
                    <option value="DDR5">DDR5</option>
                </select>
                <select name="ukuran_ram" id="ukuran_ram" required class="border p-2 rounded w-full">
                    <option value="4GB">4GB</option>
                    <option value="8GB">8GB</option>
                    <option value="12GB">12GB</option>
                    <option value="16GB">16GB</option>
                </select>
                <select name="jenis_storage" id="jenis_storage" required class="border p-2 rounded w-full">
                    <option value="HDD">HDD</option>
                    <option value="SSD">SSD</option>
                </select>
                <select name="ukuran_storage" id="ukuran_storage" required class="border p-2 rounded w-full">
                    <option value="256GB">256GB</option>
                    <option value="512GB">512GB</option>
                    <option value="1TB">1TB</option>
                </select>
                <input type="text" name="gpu" placeholder="GPU (Optional)" required class="border p-2 rounded">
                <select name="sistem_operasi" id="sistem_operasi" required class="border p-2 rounded w-full">
                    <option value="Windows 10">Windows 10</option>
                    <option value="Windows 11">Windows 11</option>
                    <option value="iOS">iOS</option>
                </select>
                <input type="text" name="tipe_laptop" placeholder="Tipe Laptop" required class="border p-2 rounded">
                <input type="text" name="description" placeholder="Description" required class="border p-2 rounded">
                <input type="number" name="harga" placeholder="Harga (IDR)" required class="border p-2 rounded">
                <input type="text" name="link" placeholder="Link" required class="border p-2 rounded">
                <input type="file" name="gambar" class="border p-2 rounded" accept="image/*">
            </div>
            <button type="submit" class="bg-green-500 text-white py-2 px-4 mt-4 rounded">Tambah Laptop</button>
        </form>

        <!-- Tabel Data Laptop -->
        <table class="min-w-full bg-white border">
            <thead>
                <tr class="bg-gray-200 text-gray-600">
                    <th class="p-3 border">Merk</th>
                    <th class="p-3 border">Model</th>
                    <th class="p-3 border">Processor</th>
                    <th class="p-3 border">Jenis RAM</th>
                    <th class="p-3 border">Ukuran RAM (GB)</th>
                    <th class="p-3 border">Jenis Storage</th>
                    <th class="p-3 border">Ukuran Storage (GB)</th>
                    <th class="p-3 border">GPU</th>
                    <th class="p-3 border">OS</th>
                    <th class="p-3 border">Tipe Laptop</th>
                    <th class="p-3 border">Harga</th>
                    <th class="p-3 border">Gambar</th>
                    <th class="p-3 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($laptops as $laptop)
                    <tr>
                        <td class="p-3 border">{{ $laptop->merk }}</td>
                        <td class="p-3 border">{{ $laptop->model }}</td>
                        <td class="p-3 border">{{ $laptop->processor }}</td>
                        <td class="p-3 border">{{ $laptop->jenis_ram }}</td>
                        <td class="p-3 border">{{ $laptop->ukuran_ram }}</td>
                        <td class="p-3 border">{{ $laptop->jenis_storage }}</td>
                        <td class="p-3 border">{{ $laptop->ukuran_storage }}</td>
                        <td class="p-3 border">{{ $laptop->gpu}}</td>
                        <td class="p-3 border">{{ $laptop->sistem_operasi}}</td>
                        <td class="p-3 border">{{ $laptop->tipe_laptop}}</td>
                        <td class="p-3 border">Rp{{ number_format($laptop->harga, 0, ',', '.') }}</td>
                        <td class="p-3 border">
                            @if($laptop->gambar)
                                <img src="{{ asset('storage/'.$laptop->gambar) }}" alt="Laptop" class="w-20 h-20 object-cover">
                            @else
                                Tidak ada gambar
                            @endif
                        </td>
                        <td class="p-3 border">
                            <button onclick="openEditForm('{{ $laptop->id }}', '{{ $laptop->merk }}', '{{ $laptop->model }}', '{{ $laptop->processor }}', '{{ $laptop->jenis_ram }}', '{{ $laptop->ukuran_ram }}', '{{ $laptop->jenis_storage }}', '{{ $laptop->ukuran_storage }}', '{{ $laptop->gpu }}', '{{ $laptop->sistem_operasi }}', '{{ $laptop->tipe_laptop }}', '{{ $laptop->harga }}', '{{ $laptop->gambar }}')" class="bg-blue-500 text-white py-1 px-2 rounded">Edit</button>
                            <form action="{{ route('crud_table.destroy', $laptop->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white py-1 px-2 rounded">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal Form Edit Laptop -->
    <div id="editModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden items-center justify-center overflow-y-auto">
        <div class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full mt-10 mb-10">
            <h2 class="text-xl font-bold mb-4">Edit Laptop</h2>
            <form id="editForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <input type="text" name="merk" id="editMerk" placeholder="Merk" required class="border p-2 w-full rounded">
                </div>
                <div class="mb-4">
                    <input type="text" name="model" id="editModel" placeholder="Model" required class="border p-2 w-full rounded">
                </div>
                <div class="mb-4">
                    <input type="text" name="processor" id="editProcessor" placeholder="Processor" required class="border p-2 w-full rounded">
                </div>

                <div class="mb-4">
                    <input type="text" name="gpu" id="editGPU" placeholder="GPU" class="border p-2 w-full rounded">
                </div>

                <div class="mb-4">
                    <select name="jenis_ram" id="editJenisRam" required class="border p-2 rounded w-full">
                        <option value="DDR3">DDR3</option>
                        <option value="DDR4">DDR4</option>
                        <option value="DDR5">DDR5</option>
                    </select>
                </div>
                <div class="mb-4">
                    <select name="ukuran_ram" id="editUkuranRam" required class="border p-2 rounded w-full">
                        <option value="4GB">4GB</option>
                        <option value="8GB">8GB</option>
                        <option value="12GB">12GB</option>
                        <option value="16GB">16GB</option>
                    </select>
                </div>
                <div class="mb-4">
                    <select name="jenis_storage" id="editJenisStorage" required class="border p-2 rounded w-full">
                        <option value="HDD">HDD</option>
                        <option value="SSD">SSD</option>
                    </select>
                </div>
                <div class="mb-4">
                    <select name="ukuran_storage" id="editUkuranStorage" required class="border p-2 rounded w-full">
                        <option value="256GB">256GB</option>
                        <option value="512GB">512GB</option>
                        <option value="1TB">1TB</option>
                    </select>
                </div>

                <div class="mb-4">
                    <select name="sistem_operasi" id="editSistemOperasi" required class="border p-2 rounded w-full">
                        <option value="Windows 10">Windows 10</option>
                        <option value="Windows 11">Windows 11</option>
                        <option value="iOS">iOS</option>
                    </select>
                </div>


                <div class="mb-4">
                    <input type="text" name="tipe_laptop" id="editTipeLaptop" placeholder="Tipe Laptop" class="border p-2 w-full rounded">
                </div>
                <div class="mb-4">
                    <input type="number" name="harga" id="editHarga" placeholder="Harga" required class="border p-2 w-full rounded">
                </div>
                <div class="mb-4">
                    <input type="file" name="gambar" class="border p-2 w-full rounded" accept="image/*">
                    <p id="currentImage" class="text-gray-500 mt-2">Gambar saat ini: <span id="imagePreview"></span></p>
                </div>

                <div class="flex justify-end">
                    <button type="button" onclick="closeEditForm()" class="bg-gray-500 text-white py-2 px-4 rounded mr-2">Batal</button>
                    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Simpan</button>
                </div>
            </form>
        </div>
    </div>


    <script>
        function openEditForm(id, merk, model, processor, jenis_ram, ukuran_ram, jenis_storage, ukuran_storage, gpu, sistem_operasi, tipe_laptop, harga, gambar) {
            document.getElementById('editForm').action = `/crud-table/${id}`;
            document.getElementById('editMerk').value = merk;
            document.getElementById('editModel').value = model;
            document.getElementById('editProcessor').value = processor;
            document.getElementById('editJenisRam').value = jenis_ram;
            document.getElementById('editUkuranRam').value = ukuran_ram;
            document.getElementById('editJenisStorage').value = jenis_storage;
            document.getElementById('editUkuranStorage').value = ukuran_storage;
            document.getElementById('editGPU').value = gpu;
            document.getElementById('editSistemOperasi').value = sistem_operasi;
            document.getElementById('editTipeLaptop').value = tipe_laptop;
            document.getElementById('editHarga').value = harga;

            // Tampilkan gambar saat ini jika ada
            const imagePreview = document.getElementById('imagePreview');

            if (gambar) {
                imagePreview.innerHTML = `<img src="/storage/${gambar}" alt="Gambar Laptop" class="w-20 h-20 object-cover">`;
            } else {
                imagePreview.innerText = 'Tidak ada gambar';
            }

            document.getElementById('editModal').classList.remove('hidden');
        }

        function closeEditForm() {
            document.getElementById('editModal').classList.add('hidden');
        }
    </script>

</x-admin-layout>
