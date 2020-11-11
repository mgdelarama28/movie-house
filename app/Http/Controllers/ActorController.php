<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActorController extends Controller
{
    

    public function index()
    {
        $apiKey = config('services.tmdb.api_key');

        return view('pages.actors.index', [
            'apiKey' => $apiKey,
        ]);
    }

    public function show($id)
    {
        $apiKey = config('services.tmdb.api_key');
        
        return view('pages.actors.show', [
            'id' => $id,
            'apiKey' => $apiKey,
        ]);
    }
}
