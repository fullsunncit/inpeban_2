<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RecommendationController extends Controller
{
    public function index()
    {
        $response = Http::withoutVerifying()->get('https://raw.githubusercontent.com/fullsunncit/db_rekomendasi_inpeban/main/db.json');
        $data = $response->json();

        $rekomendasi = $data['recomendation'];
        $gallery = $data['gallery'];

        return view('index', compact('rekomendasi', 'gallery'));
    }

    public function detail($id)
    {
        $response = Http::withoutVerifying()->get('https://raw.githubusercontent.com/fullsunncit/db_rekomendasi_inpeban/main/db.json');
        $data = $response->json();

        $item = collect($data['recomendation'])->firstWhere('id', $id);

        return view('detail_recommendation', compact('item'));
    }
}
