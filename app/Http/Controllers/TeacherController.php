<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TeacherController extends Controller
{
    private $apiUrl;

    public function __construct()
    {
        $this->apiUrl = rtrim(env('API_BASE_URL', 'http://api.adminsena.test/api/v1'), '/');
    }

    public function index()
    {
        $response = Http::get($this->apiUrl . '/teachers');
        $teachers = $response->successful() ? $response->json() : [];
        return view('teachers.index', compact('teachers'));
    }

    public function create()
    {
        $areasResponse = Http::get($this->apiUrl . '/areas');
        $centersResponse = Http::get($this->apiUrl . '/training_centers');

        $areas = $areasResponse->successful() ? $areasResponse->json() : [];
        $training_centers = $centersResponse->successful() ? $centersResponse->json() : [];

        return view('teachers.create', compact('areas', 'training_centers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'area_id' => 'required|integer',
            'training_center_id' => 'required|integer',
        ]);

        $response = Http::post($this->apiUrl . '/teachers', $request->all());

        if ($response->successful()) {
            return redirect()->route('teachers.index')->with('success', 'Docente creado correctamente.');
        }

        return back()->withErrors(['api_error' => 'No se pudo crear el docente en la API (verifique si el email ya existe).'])->withInput();
    }

    public function edit($id)
    {
        $teacherResponse = Http::get($this->apiUrl . '/teachers/' . $id);
        $areasResponse = Http::get($this->apiUrl . '/areas');
        $centersResponse = Http::get($this->apiUrl . '/training_centers');
        $coursesResponse = Http::get($this->apiUrl . '/courses');

        if (!$teacherResponse->successful()) {
            return redirect()->route('teachers.index')->withErrors(['api_error' => 'No se pudo obtener el docente de la API.']);
        }

        $teacher = $teacherResponse->json();
        $areas = $areasResponse->successful() ? $areasResponse->json() : [];
        $training_centers = $centersResponse->successful() ? $centersResponse->json() : [];
        $courses = $coursesResponse->successful() ? $coursesResponse->json() : [];

        $selectedCourseIds = [];
        if (!empty($teacher['courses'])) {
            $selectedCourseIds = array_column($teacher['courses'], 'id');
        }

        return view('teachers.edit', compact('teacher', 'areas', 'training_centers', 'courses', 'selectedCourseIds'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'area_id' => 'required|integer',
            'training_center_id' => 'required|integer',
            'course_ids' => 'nullable|array',
            'course_ids.*' => 'integer',
        ]);

        $response = Http::put($this->apiUrl . '/teachers/' . $id, $request->all());

        if ($response->successful()) {
            return redirect()->route('teachers.index')->with('success', 'Docente actualizado correctamente.');
        }

        return back()->withErrors(['api_error' => 'No se pudo actualizar el docente en la API (verifique si el email ya existe).'])->withInput();
    }

    public function destroy($id)
    {
        $response = Http::delete($this->apiUrl . '/teachers/' . $id);

        if ($response->successful()) {
            return redirect()->route('teachers.index')->with('success', 'Docente eliminado correctamente.');
        }

        return back()->withErrors(['api_error' => 'No se pudo eliminar el docente en la API.']);
    }
}
