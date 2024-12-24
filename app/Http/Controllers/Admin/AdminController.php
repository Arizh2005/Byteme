<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Laptop;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        // Ambil data login per hari dalam seminggu terakhir
        $statistics = DB::table('logins')
            ->selectRaw('DAYNAME(created_at) as day_name, COUNT(*) as count')
            ->whereBetween('created_at', ['2024-12-16 00:00:00', '2024-12-22 23:59:59'])
            ->groupBy(DB::raw('DAYNAME(created_at), DAYOFWEEK(created_at)'))
            ->orderBy(DB::raw('DAYOFWEEK(created_at)'))
            ->get();


        $chartData = [
            'labels' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
            'data' => [0, 0, 0, 0, 0, 0, 0]
        ];

        // Process query result and update chart data
        foreach ($statistics as $stat) {
            $dayIndex = array_search($stat->day_name, $chartData['labels']);
            $chartData['data'][$dayIndex] = $stat->count;
        }// Debug output

        $totalLogins = array_sum($chartData['data']);
        $totalProducts = Laptop::count();
        $totalUsers = User::count();




        return view('admin.dashboard', compact('chartData', 'totalLogins', 'totalProducts', 'totalUsers'));
    }


    //
}
