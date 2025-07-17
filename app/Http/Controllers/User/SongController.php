<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Song;
use Illuminate\Http\JsonResponse;

class SongController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json([
            'data' => Song::all()
        ]);
    }
}
