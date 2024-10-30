<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\pegawai;
use App\Models\kompetensi;

class PegawaiController extends Controller
{
        /**
     * Display a listing of the pegawai.
     */
    public function index()
    {
        $pegawai = pegawai::paginate(10);
        return view('admin.pegawai.index', compact('pegawai'));
    }

    /**
     * Show the form for creating a new pegawai.
     */
    public function create()
    {
        $kompetensi = kompetensi::all();
        return view('admin.pegawai.create',compact('kompetensi'));
    }

    /**
     * Store a newly created pegawai in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            // 'uid' => 'required|string|max:255|unique:pegawai',
            'nip' => 'required|string|max:255|unique:pegawais',
            'nuptk' => 'required|string|max:255|unique:pegawais',
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'status' => 'required|in:tenaga kependidikan,tenaga pendidik',
            'nama_pelajaran' => 'required|string|max:255',
            'id_kompetensi' => 'required|integer',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $pegawai = new pegawai($request->except(['foto']));

        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('pegawai', 'public');
            $pegawai->foto = $fotoPath;
        }

        $pegawai->save();

        return redirect()->route('adminpegawai.index')->with('success', 'Pegawai created successfully.');
    }

    /**
     * Show the form for editing the specified pegawai.
     */
    public function edit($id)
    {
        $kompetensi = kompetensi::all();
        $pegawai=pegawai::find($id);
        return view('admin.pegawai.edit', compact('pegawai', 'kompetensi'));

    }

    /**
     * Update the specified pegawai in storage.
     */
    public function update(Request $request, pegawai $pegawai)
    {
        // $pegawai=pegawai::find($id);
        $request->validate([
            // 'uid' => 'required|string|max:255|unique:pegawai,uid,' . $pegawai->id,
            'nip' => 'required|string|max:255|unique:pegawai,nip,' . $pegawai->id,
            'nuptk' => 'required|string|max:255|unique:pegawai,nuptk,' . $pegawai->id,
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'status' => 'required|in:tenaga kependidikan,tenaga pendidik',
            'nama_pelajaran' => 'required|string|max:255',
            'id_kompetensi' => 'required|integer',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $pegawai->update($request->except(['foto']));

        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('pegawai', 'public');
            $pegawai->foto = $fotoPath;
        }

        $pegawai->save();

        return redirect()->route('adminpegawai.index')->with('success', 'Pegawai updated successfully.');
    }

    /**
     * Remove the specified pegawai from storage.
     */
    public function destroy(string $id)
    {
        $pegawai=pegawai::find($id);
        if ($pegawai->foto) {
            \Storage::delete('public/' . $pegawai->foto);
        }
        
        $pegawai->delete();
        return redirect()->route('adminpegawai.index')->with('success', 'Pegawai deleted successfully.');
    }
}
