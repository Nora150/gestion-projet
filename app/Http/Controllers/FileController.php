<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class FileController extends Controller
{
    public function index()
    {
        $files = File::all();
        return view('files.index', compact('files'));
    }

    public function create()
    {
        return view('files.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:2048'
        ]);

        $path = $request->file('file')->store('uploads');

        File::create([
            'name' => $request->file('file')->getClientOriginalName(),
            'path' => $path,
            'user_id' => Auth::id() 
        ]);

        return redirect()->route('files.index')->with('success', 'Fichier téléversé avec succès.');
    }
}
