<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TrainingCenterController extends Controller
{
    private $apiUrl;

    public function __construct()
    {
        $this->apiUrl = rtrim(env('API_BASE_URL', 'http://api.adminsena.test/api/v1'), '/');
    }

    public function index()
    {
        $response = Http::get($this->apiUrl . '/training_centers');
        $training_centers = $response->successful() ? $response->json() : [];
        return view('training_centers.index', compact('training_centers'));
    }

    public function create()
    {
        return view('training_centers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ]);

        $response = Http::post($this->apiUrl . '/training_centers', $request->all());

        if ($response->successful()) {
            return redirect()->route('training_centers.index')->with('success', 'Centro de formación creado correctamente.');
        }

        return back()->withErrors(['api_error' => 'No se pudo crear el centro de formación en la API.'])->withInput();
    }
}
