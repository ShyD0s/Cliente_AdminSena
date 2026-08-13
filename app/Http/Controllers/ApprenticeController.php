<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApprenticeController extends Controller
{
    private $apiUrl;

    public function __construct()
    {
        $this->apiUrl = rtrim(env('API_BASE_URL', 'http://api.adminsena.test/api/v1'), '/');
    }

    public function index()
    {
        $response = Http::get($this->apiUrl . '/apprentices');
        $apprentices = $response->successful() ? $response->json() : [];
        return view('apprentices.index', compact('apprentices'));
    }

    public function create()
    {
        $coursesResponse = Http::get($this->apiUrl . '/courses');
        $computersResponse = Http::get($this->apiUrl . '/computers');

        $courses = $coursesResponse->successful() ? $coursesResponse->json() : [];
        $computers = $computersResponse->successful() ? $computersResponse->json() : [];

        return view('apprentices.create', compact('courses', 'computers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'cell_number' => 'required|string|max:255',
            'course_id' => 'required|integer',
            'computer_id' => 'nullable|integer',
        ]);

        $data = $request->all();
        if (empty($data['computer_id'])) {
            $data['computer_id'] = null;
        }

        $response = Http::post($this->apiUrl . '/apprentices', $data);

        if ($response->successful()) {
            return redirect()->route('apprentices.index')->with('success', 'Aprendiz registrado correctamente.');
        }

        return back()->withErrors(['api_error' => 'No se pudo registrar el aprendiz en la API (verifique si el email o computador ya están asignados).'])->withInput();
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'cell_number' => 'required|string|max:255',
            'course_id' => 'required|integer',
            'computer_id' => 'nullable|integer',
        ]);

        $data = $request->all();
        if (empty($data['computer_id'])) {
            $data['computer_id'] = null;
        }

        $response = Http::put($this->apiUrl . '/apprentices/' . $id, $data);

        if ($response->successful()) {
            return redirect()->route('apprentices.index')->with('success', 'Aprendiz actualizado correctamente.');
        }

        return back()->withErrors(['api_error' => 'No se pudo actualizar el aprendiz en la API (verifique si el email o computador ya están asignados).'])->withInput();
    }

    public function destroy($id)
    {
        $response = Http::delete($this->apiUrl . '/apprentices/' . $id);

        if ($response->successful()) {
            return redirect()->route('apprentices.index')->with('success', 'Aprendiz eliminado correctamente.');
        }

        return back()->withErrors(['api_error' => 'No se pudo eliminar el aprendiz en la API.']);
    }
}
