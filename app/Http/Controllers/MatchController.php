<?php

// app/Http/Controllers/MatchController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laptop;

class MatchController extends Controller
{
    // Menampilkan halaman form matching
    public function showForm()
    {
        return view('matching_form');
    }

    public function checkMatch(Request $request)
    {
        $merk = $request->input('merk');
        $model = $request->input('model');
        $processor = $request->input('processor'); // Tambahkan baris ini untuk memeriksa nilai $procesor = $request->input('prosesor');
        $jenis_ram = $request->input('jenis_ram');
        $ukuran_ram = $request->input('ukuran_ram');
        $jenis_storage = $request->input('jenis_storage');
        $ukuran_storage = $request->input('ukuran_storage');
        $sistem_operasi = $request->input('sistem_operasi');
        $gpu = $request->input('gpu');
        $harga = $request->input('harga');
        $ukuran_layar = $request->input('ukuran_layar');
        $tipe_laptop = $request->input('tipe_laptop');

        $query = Laptop::query();

        if ($request->filled('merk')) {
            $query->where('merk', $request->merk);
        }
        if ($request->filled('model')) {
            $query->where('model', $request->model);
        }
        if ($request->filled('sistem_operasi')) {
            $query->where('sistem_operasi', $request->sistem_operasi);
        }
        if ($request->filled('processor')) {
            $query->where('processor', $request->processor);
        }
        if ($request->filled('jenis_ram')) {
            $query->where('jenis_ram', $request->jenis_ram);
        }
        if ($request->filled('ukuran_ram')) {
            $query->where('ukuran_ram', $request->ukuran_ram);
        }
        if ($request->filled('jenis_storage')) {
            $query->where('jenis_storage', $request->jenis_storage);
        }
        if ($request->filled('ukuran_storage')) {
            $query->where('ukuran_storage', $request->ukuran_storage);
        }
        if ($request->filled('gpu')) {
            $query->where('gpu', $request->gpu);
        }
        if ($request->filled('ukuran_layar')) {
            $query->where('ukuran_layar', $request->ukuran_layar);
        }
        if ($request->filled('tipe_laptop')) {
            $query->where('tipe_laptop', $request->tipe_laptop);
        }
        if ($request->filled('min_price')){
            $query->where('harga', '>=', $request->min_price);
        }

        if ($request->filled('max_price')) {
            $query->where('harga', '<=', $request->max_price);
        }


        // Dapatkan hasil pencarian
        $matchingLaptops = $query->get();

        // Tampilkan hasil di view
        return view('matching_results', compact('matchingLaptops'));
    }

    public function showCrudTable(Request $request)
    {
        $search = $request->input('search');

    // Query dengan pencarian
        $laptops = Laptop::when($search, function ($query, $search) {
            $query->where('merk', 'like', "%$search%")
                ->orWhere('model', 'like', "%$search%")
                ->orWhere('processor', 'like', '%' . $search . '%')
                ->orWhere('jenis_ram', 'like', '%' . $search . '%')
                ->orWhere('ukuran_ram', 'like', '%' . $search . '%')
                ->orWhere('jenis_storage', 'like', '%' . $search . '%')
                ->orWhere('ukuran_storage', 'like', '%' . $search . '%')
                ->orWhere('gpu', 'like', '%' . $search . '%')
                ->orWhere('sistem_operasi', 'like', '%' . $search . '%')
                ->orWhere('tipe_laptop', 'like', '%' . $search . '%')
                ->orWhere('harga', 'like', '%' . $search . '%');
        })->get();
        return view('crud_table', compact('laptops', 'search'));
    }

    // Memproses data dari form matching
    // app/Http/Controllers/MatchController.php

public function store(Request $request)
{
    $request->validate([
            'merk' => 'required|string',
            'model' => 'required|string',
            'sistem_operasi' => 'required|string|in:Windows 10,Windows 11,iOS',
            'processor' => 'required|string',
            'jenis_ram' => 'required|string|in:DDR3,DDR4,DDR5',
            'ukuran_ram' => 'required|string|in:4GB,8GB,12GB,16GB',
            'jenis_storage' => 'required|string|in:SSD,HDD',
            'ukuran_storage' => 'required|string|in:256GB,512GB,1TB',
            'gpu' => 'nullable|string',
            'ukuran_layar' => 'nullable|string',
            'tipe_laptop' => 'nullable|string',
            'description' => 'nullable|string',
            'harga' => 'required|integer',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    // Cek apakah ada gambar yang diupload
    if ($request->hasFile('gambar')) {
        $data['gambar'] = $request->file('gambar')->store('uploads', 'public');
    }

    Laptop::create([
        'merk' => $request->merk,
        'model' => $request->model,
        'sistem_operasi' => $request->sistem_operasi,
        'processor' => $request->processor,
        'jenis_ram' => $request->jenis_ram,
        'ukuran_ram' => $request->ukuran_ram,
        'jenis_storage' => $request->jenis_storage,
        'ukuran_storage' => $request->ukuran_storage,
        'gpu' => $request->gpu,
        'ukuran_layar' => $request->ukuran_layar,
        'tipe_laptop' => $request->tipe_laptop,
        'description' => $request->description,
        'harga' => $request->harga,
        'gambar' => $data['gambar'] ?? null,
    ]);


    return redirect()->route('crud_table.index')->with('success', 'Laptop berhasil ditambahkan.');
}

public function update(Request $request, $id)
{
    $request->validate([
            'merk' => 'required|string',
            'model' => 'required|string',
            'sistem_operasi' => 'required|string|in:Windows 10,Windows 11,iOS',
            'processor' => 'required|string',
            'jenis_ram' => 'required|string|in:DDR3,DDR4,DDR5',
            'ukuran_ram' => 'required|string|in:4GB,8GB,12GB,16GB',
            'jenis_storage' => 'required|string|in:SSD,HDD',
            'ukuran_storage' => 'required|string|in:256GB,512GB,1TB',
            'gpu' => 'nullable|string',
            'ukuran_layar' => 'nullable|string',
            'tipe_laptop' => 'nullable|string',
            'description' => 'nullable|string',
            'harga' => 'required|integer',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $laptop = Laptop::findOrFail($id);
    $data = $request->all();

    // Jika ada gambar baru yang diupload, hapus yang lama dan simpan yang baru
    if ($request->hasFile('gambar')) {
        if ($laptop->gambar && \Storage::disk('public')->exists($laptop->gambar)) {
            \Storage::disk('public')->delete($laptop->gambar);
        }
        $data['gambar'] = $request->file('gambar')->store('uploads', 'public');
    }

    $laptop->update($data);

    return redirect()->route('crud_table.index')->with('success', 'Laptop berhasil diperbarui.');
    }
    public function show($id){
        $laptop = Laptop::findOrFail($id);

        return view('user.detail', compact('laptop'));
    }

    public function product(Request $request){

        $laptops = Laptop::all();

        $producers = Laptop::select('merk')->distinct()->get();

        $query = Laptop::query();
        if($request->has('merk') && $request->merk){
            $query->where('merk', $request->merk);

        }

        $laptops = $query->get();
        return view('user.product', compact('producers','laptops'));
    }

    public function destroy($id){
        $laptop = Laptop::findOrFail($id);
        if ($laptop->gambar && \Storage::disk('public')->exists($laptop->gambar)) {
            \Storage::disk('public')->delete($laptop->gambar);
        }
        $laptop->delete();
        return redirect()->route('crud_table.index')->with('success', 'Laptop berhasil dihapus.');
    }




}
