<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\berita;
use App\Models\kategori; // Pastikan Anda juga memiliki model Kategori
use App\Models\tag;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    /**
     * Display a listing of the beritas.
     */
    public function index()
    {
        $beritas = berita::with(['kategori', 'user'])->paginate(10); // Asumsi Anda memiliki relasi
        return view('admin.beritas.index', compact('beritas'));
    }

    /**
     * Show the form for creating a new berita.
     */
    public function create()
    {
        $kategoris = kategori::all(); // Ambil semua kategori
        $tags = tag::all(); // Ambil semua kategori
        return view('admin.beritas.create', compact('kategoris','tags'));
    }

    /**
     * Store a newly created berita in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal_post' => 'required|date',
            'id_kategori' => 'required|integer',
            'isi' => 'required|string',
            'tag' => 'nullable',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'background' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4048',
            'file.*' => 'nullable|file|max:2048' // Multiple files
        ]);

        $berita = new Berita();
        $berita->judul = $request->judul;
        $berita->tanggal_post = $request->tanggal_post;
        $berita->id_kategori = $request->id_kategori;
        $berita->isi = $request->isi;

        // Upload gambar utama
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('public/gambar');
            $berita->gambar = basename($gambarPath);
        }

        // Upload background
        if ($request->hasFile('background')) {
            $backgroundPath = $request->file('background')->store('public/background');
            $berita->background = basename($backgroundPath);
        }

        $berita->save();

        // Upload multiple files and save their paths
        if ($request->hasFile('file')) {
            $filesPaths = [];
            foreach ($request->file('file') as $file) {
                $filePath = $file->store('public/files');
                $filesPaths[] = basename($filePath);
            }
            $berita->file = json_encode($filesPaths);
        }

        // Save tags if any
        if ($request->has('tag')) {
            // $berita->tag()->sync($request->tag);
            $tags_save=[];
            foreach($request->tag as $tags){
                $tags_save[]=$tags;
            }
            $berita->tag=json_encode($tags_save);
        }

        return redirect()->route('adminberita.index')->with('success', 'Berita berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified berita.
     */
    public function edit($id)
    {
        $kategoris = Kategori::all(); // Ambil semua kategori
        $berita=Berita::find($id);
        $tag = tag::all(); // Ambil semua kategori
        return view('admin.beritas.edit', compact('berita', 'kategoris','tag'));
    }

    /**
     * Update the specified berita in storage.
     */
    public function update(Request $request, $id)
    {
       
        $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal_post' => 'required|date',
            'id_kategori' => 'required|integer',
            'tag'=>'nullable',
            'isi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'background' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4048',
            'file.*' => 'nullable|file|max:2048' // Multiple files
        ]);

        $berita = Berita::findOrFail($id);
        $berita->judul = $request->judul;
        $berita->tanggal_post = $request->tanggal_post;
        $berita->id_kategori = $request->id_kategori;
        $berita->isi = $request->isi;

        // Update gambar utama
        if ($request->hasFile('gambar')) {
            if ($berita->gambar && Storage::exists('public/gambar/' . $berita->gambar)) {
                Storage::delete('public/gambar/' . $berita->gambar);
            }
            $gambarPath = $request->file('gambar')->store('public/gambar');
            $berita->gambar = basename($gambarPath);
        }

        // Update background
        if ($request->hasFile('background')) {
            if ($berita->background && Storage::exists('public/background/' . $berita->background)) {
                Storage::delete('public/background/' . $berita->background);
            }
            $backgroundPath = $request->file('background')->store('public/background');
            $berita->background = basename($backgroundPath);
        }

        // Update multiple files
        if ($request->hasFile('file')) {
            // Delete old files
            if ($berita->file) {
                foreach (json_decode($berita->file) as $oldFile) {
                    Storage::delete('public/files/' . $oldFile);
                }
            }

            // Save new files
            $filesPaths = [];
            foreach ($request->file('file') as $file) {
                $filePath = $file->store('public/files');
                $filesPaths[] = basename($filePath);
            }
            $berita->file = json_encode($filesPaths);
        }

        $berita->save();

        // Update tags if any
        if ($request->has('tag')) {
            $berita->tag()->sync($request->tag);
        }

        // return redirect()->route('beritas.index')->with('success', 'Berita berhasil diperbarui!');


        return redirect()->route('adminberita.index')->with('success', 'Berita updated successfully.');
    }

    /**
     * Remove the specified berita from storage.
     */
    public function destroy(string $id)
    {
        $berita=berita::find($id);
        // Hapus gambar dan file jika ada
        if ($berita->gambar) {
            Storage::delete($berita->gambar);
        }

        if ($berita->background) {
            Storage::delete($berita->background);
        }

        if ($berita->file) {
            foreach ($berita->file as $file) {
                Storage::delete($file);
            }
        }
        $berita->delete();
        return redirect()->route('adminberita.index')->with('success', 'Berita deleted successfully.');
    }
}