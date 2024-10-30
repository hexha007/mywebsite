<?php

namespace App\Http\Controllers;

use App\Models\Suggestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SuggestionController extends Controller
{
// Menampilkan semua saran
public function index()
{
    $suggestions = Suggestion::all();
    return view('admin.suggestions.index', compact('suggestions'));
}

// Menampilkan form input saran
public function create()
{
    return view('suggestions.create');
}

// Menyimpan saran yang diinput user
public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'message' => 'required',
    ]);

    Suggestion::create($request->all());

    return redirect()->route('suggestions.create')->with('success', 'Saran berhasil dikirim!');
}

// Menampilkan form balasan untuk admin
public function edit($id)
{
    $suggestion = Suggestion::findOrFail($id);
    return view('admin.suggestions.edit', compact('suggestion'));
}

// Menyimpan balasan dan mengirim email
public function update(Request $request, $id)
{
    $suggestion = Suggestion::findOrFail($id);

    $request->validate([
        'response' => 'required',
    ]);

    $suggestion->update($request->all());

    // Kirim balasan ke email user
    Mail::raw($suggestion->response, function ($message) use ($suggestion) {
        $message->to($suggestion->email)
                ->subject('Balasan Saran Anda');
    });

    return redirect()->route('suggestions.index')->with('success', 'Balasan berhasil dikirim!');
}
}
