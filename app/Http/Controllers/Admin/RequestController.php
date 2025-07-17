<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SongRequest;
use App\Models\Song;

class RequestController extends Controller
{
    public function index()
    {
        if (auth()->user()->role !== 'admin') {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $requests = SongRequest::latest()->get();
        return response()->json($requests);
    }

    public function accept($id)
    {
        if (auth()->user()->role !== 'admin') {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $request = SongRequest::findOrFail($id);

        $song = Song::create([
            'title' => $request->title,
            'artist' => $request->artist,
        ]);

        $request->delete();

        return response()->json(['message' => 'Request diterima dan lagu ditambahkan', 'song' => $song]);
    }

    public function destroy($id)
    {
        if (auth()->user()->role !== 'admin') {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $request = SongRequest::findOrFail($id);
        $request->delete();

        return response()->json(['message' => 'Request berhasil dihapus']);
    }
}
