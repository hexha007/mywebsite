<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\tag;

class TagController extends Controller
{
     /**
     * Display a listing of the tags.
     */
    public function index()
    {
        $tags = Tag::paginate(10);
        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new tag.
     */
    public function create()
    {
        return view('admin.tags.create');
    }

    /**
     * Store a newly created tag in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_tag' => 'required|string|max:255',
        ]);

        Tag::create($request->all());

        return redirect()->route('admintags.index')->with('success', 'Tag created successfully.');
    }

    /**
     * Show the form for editing the specified tag.
     */
    public function edit(string $id)
    {
        // $tag=tag::find($id);
        $data['tag']=tag::find($id);
        return view('admin.tags.edit',$data );
    }

    /**
     * Update the specified tag in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_tag' => 'required|string|max:255',
        ]);
        $tag=tag::find($id);
        $tag->update($request->all());

        return redirect()->route('admintags.index')->with('success', 'Tag updated successfully.');
    }

    /**
     * Remove the specified tag from storage.
     */
    public function destroy(string $id)
    {   
        $tag=tag::find($id);
        $tag->delete();
        return redirect()->route('admintags.index')->with('success', 'Tag deleted successfully.');
    }
}
