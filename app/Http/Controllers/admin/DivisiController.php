<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\divisi;

class DivisiController extends Controller
{
    /**
     * Display a listing of the divisis.
     */
    public function index()
    {
        $divisis = divisi::paginate(10);
        return view('admin.divisis.index', compact('divisis'));
    }

    /**
     * Show the form for creating a new divisi.
     */
    public function create()
    {
        return view('admin.divisis.create');
    }

    /**
     * Store a newly created divisi in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_divisi' => 'required|string|max:255',
            'isi' => 'required|string',
            'img' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imageName = time() . '.' . $request->img->extension();
        $request->img->move(public_path('images/divisis'), $imageName); // pastikan folder sudah ada

        divisi::create([
            'nama_divisi' => $request->nama_divisi,
            'isi' => $request->isi,
            'img' => 'images/divisis/' . $imageName,
        ]);

        return redirect()->route('admindivisis.index')->with('success', 'Divisi created successfully.');
    }

    /**
     * Show the form for editing the specified divisi.
     */
    public function edit( $id)
    {
        $divisi=divisi::find($id);
        return view('admin.divisis.edit', compact('divisi'));
    }

    /**
     * Update the specified divisi in storage.
     */
    public function update(Request $request, $id)
    {
        $divisi=Divisi::find($id);
        $request->validate([
            'nama_divisi' => 'required|string|max:255',
            'isi' => 'required|string',
            'img' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('img')) {
            $imageName = time() . '.' . $request->img->extension();
            $request->img->move(public_path('images/divisis'), $imageName);
            $divisi->img = 'images/divisis/' . $imageName;
        }

        $divisi->nama_divisi = $request->nama_divisi;
        $divisi->isi = $request->isi;

        $divisi->save();

        return redirect()->route('admindivisis.index')->with('success', 'Divisi updated successfully.');
    }

    /**
     * Remove the specified divisi from storage.
     */
    public function destroy(string $id)
    {
        // hapus gambar jika ada
        $divisi=divisi::find($id);
        // if (file_exists(public_path($divisi->img))) {
        //     unlink(public_path($divisi->img));
        // }
        if ($divisi->img && \Storage::disk('public')->exists($divisi->img)) {
            \Storage::disk('public')->delete($divisi->img);
        }

        $divisi->delete();
        return redirect()->route('admindivisis.index')->with('success', 'Divisi deleted successfully.');
    }
}