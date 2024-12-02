<?php

namespace App\Http\Controllers\User;
use App\Models\Laptop;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $laptops = Laptop::all();

        return view('user.dashboard', compact('laptops'));
    }
    //
}
