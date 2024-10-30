<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\download;

class DownloadController extends Controller
{
     /**
     * Display a listing of the downloads.
     */
    public function index()
    {
        $downloads = Download::paginate(10);
        return view('admin.downloads.index', compact('downloads'));
    }

    /**
     * Show the form for creating a new download.
     */
    public function create()
    {
        return view('admin.downloads.create');
    }

    /**
     * Store a newly created download in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_download' => 'required|string|max:255',
            'file' => 'required|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,jpg,png,|max:2048',
            'tanggal_post' => 'required|date',
        ]);

        $fileName = time() . '.' . $request->file->extension();
        $request->file->move(public_path('files/downloads'), $fileName); // pastikan folder sudah ada

        Download::create([
            'nama_download' => $request->nama_download,
            'file' => 'files/downloads/' . $fileName,
            'tanggal_post' => $request->tanggal_post,
        ]);

        return redirect()->route('admindownloads.index')->with('success', 'Download created successfully.');
    }

    /**
     * Show the form for editing the specified download.
     */
    public function edit($download)
    {
        $download=Download::find($id);
        return view('admin.downloads.edit', compact('download'));
    }

    /**
     * Update the specified download in storage.
     */
    public function update(Request $request, Download $download)
    {
        $request->validate([
            'nama_download' => 'required|string|max:255',
            'file' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,jpg,png,|max:2048',
            'tanggal_post' => 'required|date',
        ]);

        if ($request->hasFile('file')) {
            $fileName = time() . '.' . $request->file->extension();
            $request->file->move(public_path('files/downloads'), $fileName);
            $download->file = 'files/downloads/' . $fileName;
        }

        $download->nama_download = $request->nama_download;
        $download->tanggal_post = $request->tanggal_post;

        $download->save();

        return redirect()->route('admindownloads.index')->with('success', 'Download updated successfully.');
    }

    /**
     * Remove the specified download from storage.
     */
    public function destroy(string $id)
    {
        $download=download::find($id);
        // hapus file jika ada
        if (file_exists(public_path($download->file))) {
            unlink(public_path($download->file));
        }

        $download->delete();
        return redirect()->route('admindownloads.index')->with('success', 'Download deleted successfully.');
    }
}