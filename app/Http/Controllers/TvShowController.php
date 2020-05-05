<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TvShowController extends Controller
{
    public function index()
    {
        $apiKey = config('services.tmdb.api_key');
        return view('pages.tv_shows.index', [
            'apiKey' => $apiKey,
        ]);
    }

    public function show($id)
    {
        return view('pages.tv_shows.show', [
            'id' => $id,
        ]);
    }
}
