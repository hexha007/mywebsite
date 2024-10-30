<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\berita;
use App\Models\kategori;
use App\Models\Suggestion;

class dashboard extends Controller
{

    public function index(){
        $totalUsers = User::count();
    $totalBerita = berita::count();
    $totalKategori = kategori::count();
    $recentSuggestions = Suggestion::orderBy('created_at', 'desc')->take(5)->get();

    return view('admin.dashboard', compact('totalUsers', 'totalBerita', 'totalKategori', 'recentSuggestions'));
    }
    //
}
