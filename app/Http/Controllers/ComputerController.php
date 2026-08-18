<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ComputerController extends Controller
{
    private $apiUrl;

    public function __construct()
    {
        $this->apiUrl = rtrim(env('API_BASE_URL', 'http://api.adminsena.test/api/v1'), '/');
    }

    public function index()
    {
        $response = Http::get($this->apiUrl . '/computers');
        $computers = $response->successful() ? $response->json() : [];
        return view('computers.index', compact('computers'));
    }

    public function create()
    {
        return view('computers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'number' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
        ]);

        $response = Http::post($this->apiUrl . '/computers', $request->all());

        if ($response->successful()) {
            return redirect()->route('computers.index')->with('success', 'Equipo de cómputo creado correctamente.');
        }

        return back()->withErrors(['api_error' => 'No se pudo crear el equipo en la API.'])->withInput();
    }

    public function edit($id)
    {
        $response = Http::get($this->apiUrl . '/computers/' . $id);

        if (!$response->successful()) {
            return redirect()->route('computers.index')->withErrors(['api_error' => 'No se pudo obtener el equipo de la API.']);
        }

        $computer = $response->json();
        return view('computers.edit', compact('computer'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'number' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
        ]);

        $response = Http::put($this->apiUrl . '/computers/' . $id, $request->all());

        if ($response->successful()) {
            return redirect()->route('computers.index')->with('success', 'Equipo de cómputo actualizado correctamente.');
        }

        return back()->withErrors(['api_error' => 'No se pudo actualizar el equipo en la API.'])->withInput();
    }

    public function destroy($id)
    {
        $response = Http::delete($this->apiUrl . '/computers/' . $id);

        if ($response->successful()) {
            return redirect()->route('computers.index')->with('success', 'Equipo de cómputo eliminado correctamente.');
        }

        return back()->withErrors(['api_error' => 'No se pudo eliminar el equipo en la API.']);
    }
}
