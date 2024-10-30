<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\album;

class AlbumController extends Controller
{
     /**
     * Display a listing of the albums.
     */
    public function index()
    {
        $albums = album::paginate(10);
        return view('admin.albums.index', compact('albums'));
    }

    /**
     * Show the form for creating a new album.
     */
    public function create()
    {
        return view('admin.albums.create');
    }

    /**
     * Store a newly created album in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_album' => 'required|string|max:255',
            'tahun' => 'required|integer',
            'deskripsi' => 'nullable|string',
            'cover' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $coverName = null;
        if ($request->hasFile('cover')) {
            $coverName = time() . '.' . $request->cover->extension();
            $request->cover->move(public_path('images/albums'), $coverName); // Pastikan folder sudah ada
        }

        album::create([
            'nama_album' => $request->nama_album,
            'tahun' => $request->tahun,
            'deskripsi' => $request->deskripsi,
            'cover' => $coverName ? 'images/albums/' . $coverName : null,
        ]);

        return redirect()->route('adminalbums.index')->with('success', 'Album created successfully.');
    }

    /**
     * Show the form for editing the specified album.
     */
    public function edit($id)
    {
        $album=album::find($id);
        return view('admin.albums.edit', compact('album'));
    }

    /**
     * Update the specified album in storage.
     */
    public function update(Request $request, $id)
    {
        $album=album::find($id);
        $request->validate([
            'nama_album' => 'required|string|max:255',
            'tahun' => 'required|integer',
            'deskripsi' => 'nullable|string',
            'cover' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('cover')) {
            // Hapus cover lama jika ada
            if ($album->cover) {
                unlink(public_path($album->cover));
            }
            $coverName = time() . '.' . $request->cover->extension();
            $request->cover->move(public_path('images/albums'), $coverName);
            $album->cover = 'images/albums/' . $coverName;
        }

        $album->update([
            'nama_album' => $request->nama_album,
            'tahun' => $request->tahun,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('adminalbums.index')->with('success', 'Album updated successfully.');
    }

    /**
     * Remove the specified album from storage.
     */
    public function destroy(string $id)
    {
        // Hapus cover jika ada
        $album=album::find($id);
        if ($album->cover && file_exists(public_path($album->cover))) {
            unlink(public_path($album->cover));
        }

        $album->delete();
        return redirect()->route('adminalbums.index')->with('success', 'Album deleted successfully.');
    }
}