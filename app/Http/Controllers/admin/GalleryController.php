<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\galleri;
use App\Models\album;

class GalleryController extends Controller
{
   /**
     * Display a listing of the gallery.
     */
    public function index()
    {
        $gallerys = galleri::with('album')->paginate(10); // sesuaikan jika album adalah relasi
        return view('admin.gallery.index', compact('gallerys'));
    }

    /**
     * Show the form for creating a new gallery.
     */
    public function create()
    {
        $albums=album::all();
        return view('admin.gallery.create',compact('albums')); // tambahkan jika ada album
    }

    /**
     * Store a newly created gallery in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'nama_image' => 'required|string|max:255',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi' => 'nullable|string',
            'id_album' => 'required|exists:albums,id', // pastikan album ada
        ]);

        $fileName = time() . '.' . $request->file->extension();
        $request->file->move(public_path('images/gallery'), $fileName); // pastikan folder sudah ada

        Gallery::create([
            'tanggal' => $request->tanggal,
            'nama_image' => $request->nama_image,
            'file' => 'images/gallery/' . $fileName,
            'deskripsi' => $request->deskripsi,
            'id_album' => $request->id_album,
        ]);

        return redirect()->route('admingallerys.index')->with('success', 'Gallery created successfully.');
    }

    /**
     * Show the form for editing the specified gallery.
     */
    public function edit($id)
    {
        $gallery=galleri::find($id);
        $albums =album::all();
        return view('admin.gallery.edit', compact('gallery','albums'));
    }

    /**
     * Update the specified gallery in storage.
     */
    public function update(Request $request, string $id)
    {
        $gallery=galleri::find($id);
        $request->validate([
            'tanggal' => 'required|date',
            'nama_image' => 'required|string|max:255',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi' => 'nullable|string',
            'id_album' => 'required|exists:albums,id',
        ]);

        if ($request->hasFile('file')) {
            $fileName = time() . '.' . $request->file->extension();
            $request->file->move(public_path('images/gallery'), $fileName);
            $gallery->file = 'images/gallery/' . $fileName;
        }

        $gallery->tanggal = $request->tanggal;
        $gallery->nama_image = $request->nama_image;
        $gallery->deskripsi = $request->deskripsi;
        $gallery->id_album = $request->id_album;

        $gallery->save();

        return redirect()->route('admingallerys.index')->with('success', 'Gallery updated successfully.');
    }

    /**
     * Remove the specified gallery from storage.
     */
    public function destroy(string $id)
    {
        $gallery=galleri::find($id);
        // hapus file jika ada
        if (file_exists(public_path($gallery->file))) {
            unlink(public_path($gallery->file));
        }

        $gallery->delete();
        return redirect()->route('admingallerys.index')->with('success', 'Gallery deleted successfully.');
    }
}