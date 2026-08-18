<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CourseController extends Controller
{
    private $apiUrl;

    public function __construct()
    {
        $this->apiUrl = rtrim(env('API_BASE_URL', 'http://api.adminsena.test/api/v1'), '/');
    }

    public function index()
    {
        $response = Http::get($this->apiUrl . '/courses');
        $courses = $response->successful() ? $response->json() : [];
        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        $areasResponse = Http::get($this->apiUrl . '/areas');
        $centersResponse = Http::get($this->apiUrl . '/training_centers');

        $areas = $areasResponse->successful() ? $areasResponse->json() : [];
        $training_centers = $centersResponse->successful() ? $centersResponse->json() : [];

        return view('courses.create', compact('areas', 'training_centers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_number' => 'required|string|max:255',
            'day' => 'required|string|max:255',
            'area_id' => 'required|integer',
            'training_center_id' => 'required|integer',
        ]);

        $response = Http::post($this->apiUrl . '/courses', $request->all());

        if ($response->successful()) {
            return redirect()->route('courses.index')->with('success', 'Curso formativo creado correctamente.');
        }

        return back()->withErrors(['api_error' => 'No se pudo crear el curso en la API.'])->withInput();
    }

    public function edit($id)
    {
        $courseResponse = Http::get($this->apiUrl . '/courses/' . $id);
        $areasResponse = Http::get($this->apiUrl . '/areas');
        $centersResponse = Http::get($this->apiUrl . '/training_centers');

        if (!$courseResponse->successful()) {
            return redirect()->route('courses.index')->withErrors(['api_error' => 'No se pudo obtener el curso de la API.']);
        }

        $course = $courseResponse->json();
        $areas = $areasResponse->successful() ? $areasResponse->json() : [];
        $training_centers = $centersResponse->successful() ? $centersResponse->json() : [];

        return view('courses.edit', compact('course', 'areas', 'training_centers'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'course_number' => 'required|string|max:255',
            'day' => 'required|string|max:255',
            'area_id' => 'required|integer',
            'training_center_id' => 'required|integer',
        ]);

        $response = Http::put($this->apiUrl . '/courses/' . $id, $request->all());

        if ($response->successful()) {
            return redirect()->route('courses.index')->with('success', 'Curso formativo actualizado correctamente.');
        }

        return back()->withErrors(['api_error' => 'No se pudo actualizar el curso en la API.'])->withInput();
    }

    public function destroy($id)
    {
        $response = Http::delete($this->apiUrl . '/courses/' . $id);

        if ($response->successful()) {
            return redirect()->route('courses.index')->with('success', 'Curso formativo eliminado correctamente.');
        }

        return back()->withErrors(['api_error' => 'No se pudo eliminar el curso en la API.']);
    }
}
