<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\kategori;

class KategoriController extends Controller
{
    /**
     * Display a listing of the kategoris.
     */
    public function index()
    {
        $kategoris = kategori::paginate(10);
        return view('admin.kategoris.index', compact('kategoris'));
    }

    /**
     * Show the form for creating a new kategori.
     */
    public function create()
    {
        return view('admin.kategoris.create');
    }

    /**
     * Store a newly created kategori in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255|unique:kategoris',
        ]);

        kategori::create($request->all());

        return redirect()->route('adminkategoris.index')->with('success', 'Kategori created successfully.');
    }

    /**
     * Show the form for editing the specified kategori.
     */
    public function edit($id)
    {
        $kategori=Kategori::find($id);
        return view('admin.kategoris.edit', compact('kategori'));
    }

    /**
     * Update the specified kategori in storage.
     */
    public function update(Request $request, $id)
    {
        $kategori=Kategori::find($id);
        $request->validate([
            'nama_kategori' => 'required|string|max:255|unique:kategoris,nama_kategori,' . $kategori->id,
        ]);

        $kategori->update($request->all());

        return redirect()->route('adminkategoris.index')->with('success', 'Kategori updated successfully.');
    }

    /**
     * Remove the specified kategori from storage.
     */
    public function destroy(string $id)
    {
        $kategori=kategori::find($id);
        $kategori->delete();
        return redirect()->route('adminkategoris.index')->with('success', 'Kategori deleted successfully.');
    }
}