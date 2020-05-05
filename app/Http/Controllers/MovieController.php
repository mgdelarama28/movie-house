<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        $apiKey = config('services.tmdb.api_key');
        return view('pages.movies.index', [
            'apiKey' => $apiKey,
        ]);
    }

    public function show($id)
    {
        return view('pages.movies.show', [
            'id' => $id,
        ]);
    }
}
