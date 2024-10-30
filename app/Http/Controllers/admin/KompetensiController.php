<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\kompetensi;

class KompetensiController extends Controller
{
   /**
     * Display a listing of kompetensi.
     */
    public function index()
    {
        $kompetensi = kompetensi::all();
        return view('admin.kompetensi.index', compact('kompetensi'));
    }

    /**
     * Show the form for creating a new kompetensi.
     */
    public function create()
    {
        return view('admin.kompetensi.create');
    }

    /**
     * Store a newly created kompetensi in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kompetensi' => 'required|string|max:255',
            'singkatan'=>'nullable|string',
            'deskripsi' => 'required|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'video' => 'nullable|string|max:255',
            'prestasi' => 'nullable|string',
        ]);

        $kompetensi = new kompetensi($request->except(['logo', 'foto']));

        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('kompetensi', 'public');
            $kompetensi->logo = $logoPath;
        }

        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('kompetensi', 'public');
            $kompetensi->foto = $fotoPath;
        }

        $kompetensi->save();

        return redirect()->route('adminkompetensi.index')->with('success', 'Kompetensi created successfully.');
    }

    /**
     * Show the form for editing the specified kompetensi.
     */
    public function edit($id)
    {
        $kompetensi=kompetensi::find($id);
        return view('admin.kompetensi.edit', compact('kompetensi'));
    }

    /**
     * Update the specified kompetensi in storage.
     */
    public function update(Request $request,$id )
    {
        $request->validate([
            'nama_kompetensi' => 'required|string|max:255',
            'singkatan'=>'nullable|string',
            'deskripsi' => 'required|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'video' => 'nullable|string|max:255',
            'prestasi' => 'nullable|string',
        ]);
        $kompetensi=kompetensi::find($id);

        $kompetensi->update($request->except(['logo', 'foto']));

        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('kompetensi', 'public');
            $kompetensi->logo = $logoPath;
        }

        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('kompetensi', 'public');
            $kompetensi->foto = $fotoPath;
        }

        $kompetensi->save();

        return redirect()->route('adminkompetensi.index')->with('success', 'Kompetensi updated successfully.');
    }

    /**
     * Remove the specified kompetensi from storage.
     */
    public function destroy(string $id)
    {
        $kompetensi=kompetensi::find($id);
        if ($kompetensi->logo) {
            \Storage::delete('public/' . $kompetensi->logo);
        }
        if ($kompetensi->foto) {
            \Storage::delete('public/' . $kompetensi->foto);
        }
        $kompetensi->delete();
        return redirect()->route('adminkompetensi.index')->with('success', 'Kompetensi deleted successfully.');
    }
}
