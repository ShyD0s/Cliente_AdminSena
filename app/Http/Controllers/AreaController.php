<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AreaController extends Controller
{
    private $apiUrl;

    public function __construct()
    {
        $this->apiUrl = rtrim(env('API_BASE_URL', 'http://api.adminsena.test/api/v1'), '/');
    }

    public function index()
    {
        $response = Http::get($this->apiUrl . '/areas');
        $areas = $response->successful() ? $response->json() : [];
        return view('areas.index', compact('areas'));
    }

    public function create()
    {
        return view('areas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $response = Http::post($this->apiUrl . '/areas', $request->all());

        if ($response->successful()) {
            return redirect()->route('areas.index')->with('success', 'Área creada correctamente.');
        }

        return back()->withErrors(['api_error' => 'No se pudo crear el área en la API.'])->withInput();
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $response = Http::put($this->apiUrl . '/areas/' . $id, $request->all());

        if ($response->successful()) {
            return redirect()->route('areas.index')->with('success', 'Área actualizada correctamente.');
        }

        return back()->withErrors(['api_error' => 'No se pudo actualizar el área en la API.'])->withInput();
    }
    public function destroy($id)
    {
        $response = Http::delete($this->apiUrl . '/areas/' . $id);

        if ($response->successful()) {
            return redirect()->route('areas.index')->with('success', 'Área eliminada correctamente.');
        }

        return back()->withErrors(['api_error' => 'No se pudo eliminar el área en la API.']);
    }
}
