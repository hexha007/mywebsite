<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\profil;

class ProfilController extends Controller
{
   /**
     * Display a listing of the profil.
     */
    public function index()
    {
        $profil = profil::first(); // Assume there's only one profile
        return view('admin.profil.index', compact('profil'));
    }

    /**
     * Show the form for editing the profil.
     */
    public function edit()
    {
        $profil = profil::first(); // Fetch the first and only profile
        return view('admin.profil.edit', compact('profil'));
    }

    /**
     * Update the profil in storage.
     */
    public function update(Request $request)
    {
        $profil = profil::first(); // Fetch the first and only profile

        $request->validate([
            'nama_sekolah' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'alamat' => 'required|string',
            'no_telp' => 'required|string',
            'email' => 'required|email',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'gambargedung' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'background' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Update the fields
        $profil->update($request->except(['logo', 'gambargedung', 'background']));

                // Upload file logo jika ada
                if ($request->hasFile('logo')) {
                    $logoPath = $request->file('logo')->store('logos', 'public');
                    $profil->logo = $logoPath;
                }
        
                // Upload file gambargedung jika ada
                if ($request->hasFile('gambargedung')) {
                    $gedungPath = $request->file('gambargedung')->store('gedung', 'public');
                    $profil->gambargedung = $gedungPath;
                }
        
                // Upload file background jika ada
                if ($request->hasFile('background')) {
                    $backgroundPath = $request->file('background')->store('backgrounds', 'public');
                    $profil->background = $backgroundPath;
                }



        $profil->save();

        return redirect()->route('adminprofil.index')->with('success', 'Profil updated successfully.');
    }
}