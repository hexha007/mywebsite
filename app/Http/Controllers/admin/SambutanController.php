<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Sambutan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SambutanController extends Controller
{
    public function index()
    {
        $sambutans = Sambutan::all();
        return view('admin.sambutan.index', compact('sambutans'));
    }

    public function create()
    {
        return view('admin.sambutan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $sambutan = new Sambutan();
        $sambutan->judul = $request->judul;
        $sambutan->konten = $request->konten;

        if ($request->hasFile('gambar')) {
            $sambutan->gambar = $request->file('gambar')->store('sambutans');
        }

        $sambutan->save();

        return redirect()->route('adminsambutan.index')->with('success', 'Sambutan created successfully.');
    }

    public function edit($id)
    {
        $sambutan = Sambutan::findOrFail($id);
        return view('admin.sambutan.edit', compact('sambutan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $sambutan = Sambutan::findOrFail($id);
        $sambutan->judul = $request->judul;
        $sambutan->konten = $request->konten;

        if ($request->hasFile('gambar')) {
            if ($sambutan->gambar) {
                Storage::delete($sambutan->gambar);
            }
            $sambutan->gambar = $request->file('gambar')->store('sambutans');
        }

        $sambutan->save();

        return redirect()->route('adminsambutan.index')->with('success', 'Sambutan updated successfully.');
    }

    public function destroy($id)
    {
        $sambutan = Sambutan::findOrFail($id);
        if ($sambutan->gambar) {
            Storage::delete($sambutan->gambar);
        }
        $sambutan->delete();

        return redirect()->route('sambutans.index')->with('success', 'Sambutan deleted successfully.');
    }
}