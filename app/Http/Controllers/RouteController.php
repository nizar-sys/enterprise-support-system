<?php

namespace App\Http\Controllers;

use App\Models\HomePage;

class RouteController extends Controller
{
    public function dashboard()
    {
        $matkuls = HomePage::orderByDesc('id')->get();

        return view('dashboard.index', compact('matkuls'));
    }
}
