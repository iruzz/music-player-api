<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SongRequest;

class RequestController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'artist' => 'required|string|max:255',
        ]);

        SongRequest::create([
            'user_id' => $request->user()->id,
            'title' => $validated['title'],
            'artist' => $validated['artist'],
        ]);

        return response()->json(['message' => 'Request lagu berhasil dikirim.']);
    }
}
