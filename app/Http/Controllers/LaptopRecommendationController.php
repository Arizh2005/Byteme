<?php

namespace App\Http\Controllers;
use App\Models\Laptop;
use App\Models\UserPreference;
use Illuminate\Http\Request;

class LaptopRecommendationController extends Controller
{
    public function showRecommendation(){
        $userId = auth()->id();
        $preferences = UserPreference::where('user_id', $userId)->first();

        if ($preferences) {
            $userPreferences = json_decode($preferences->preferences, true);
            $recommendations = $this->getRecommendations($userPreferences);
        } else {
            $recommendations = [];
            $userPreferences = [];
        }
    }

    public function getRecommendations(Request $request)
{
    // Ambil preferensi pengguna
    $userPreferences = UserPreference::where('user_id', auth()->id())->first();

    if ($userPreferences) {
        // Jika pengguna memiliki preferensi, ambil data laptop sesuai dengan preferensi mereka
        $preferences = json_decode($userPreferences->preferences, true);

        // Query untuk mencocokkan laptop berdasarkan preferensi
        $query = Laptop::query();

        if (!empty($preferences['merk'])) {
            $query->where('merk', $preferences['merk']);
        }
        if (!empty($preferences['processor'])) {
            $query->where('processor', 'like', '%' . $preferences['processor'] . '%');
        }
        if (!empty($preferences['ukuran_ram'])) {
            $query->where('ukuran_ram', $preferences['ukuran_ram']);
        }
        if (!empty($preferences['ukuran_storage'])) {
            $query->where('ukuran_storage', $preferences['ukuran_storage']);
        }
        if (!empty($preferences['max_price'])) {
            $query->where('harga', '<=', $preferences['max_price']);
        }
        if (!empty($preferences['min_price'])) {
            $query->where('harga', '>=', $preferences['min_price']);
        }
        if (!empty($preferences['jenis_storage'])) {
            $query->where('jenis_storage', $preferences['jenis_storage']);
        }

        // Ambil hasil berdasarkan preferensi
        $recommendations = $query->get();
    } else {
        // Jika tidak ada preferensi, ambil rekomendasi berdasarkan preferensi pengguna lain
        // Ambil preferensi yang sudah ada (mungkin dari preferensi user lain)
        $otherUserPreferences = UserPreference::all();

        // Cari preferensi yang paling sering muncul
        $popularPreferences = $this->getMostPopularPreferences($otherUserPreferences);

        // Query untuk mencocokkan laptop berdasarkan preferensi populer
        $recommendations = Laptop::where('merk', $popularPreferences['merk'])
            ->where('processor', 'like', '%' . $popularPreferences['processor'] . '%')
            ->where('ukuran_ram', $popularPreferences['ukuran_ram'])
            ->where('ukuran_storage', $popularPreferences['ukuran_storage'])
            ->where('harga', '>=', $popularPreferences['min_price'])
            ->where('harga', '<=', $popularPreferences['max_price'])
            ->get();
    }

    // Kirim ke view
    return view('recommendations', [
        'recommendations' => $recommendations,
        'userPreferences' => $preferences ?? [],
    ]);
}

private function getMostPopularPreferences($otherUserPreferences)
{
    // Logika untuk mencari preferensi yang paling populer di antara pengguna lain
    // Misalnya, kita bisa mencari preferensi yang paling sering muncul
    $preferencesCount = [];

    foreach ($otherUserPreferences as $preference) {
        $preferences = json_decode($preference->preferences, true);

        foreach ($preferences as $key => $value) {
            if ($value) {
                if (!isset($preferencesCount[$key])) {
                    $preferencesCount[$key] = [];
                }
                $preferencesCount[$key][$value] = isset($preferencesCount[$key][$value])
                    ? $preferencesCount[$key][$value] + 1
                    : 1;
            }
        }
    }

    // Tentukan preferensi yang paling populer
    $popularPreferences = [];
    foreach ($preferencesCount as $key => $values) {
        arsort($values);
        $popularPreferences[$key] = key($values);
    }

    return $popularPreferences;
}
    //
}
