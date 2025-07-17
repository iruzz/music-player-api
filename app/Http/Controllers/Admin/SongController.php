<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Song;
use Illuminate\Support\Facades\Storage;

class SongController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'artist' => 'required|string',
            'category' => 'required|in:new,indo,luar',
            'audio' => 'required|mimes:mp3',
            'cover' => 'required|image|mimes:jpg,jpeg,png',
        ]);

        $audioPath = $request->file('audio')->store('songs', 'public');
        $coverPath = $request->file('cover')->store('covers', 'public');

        Song::create([
            'title' => $request->title,
            'artist' => $request->artist,
            'category' => $request->category,
            'audio_path' => $audioPath,
            'cover_path' => $coverPath, // ✅ sudah benar sekarang
        ]);

        return response()->json(['message' => 'Lagu berhasil ditambahkan'], 201);
    }
}
