@extends('layouts.app')

@section('title', 'Docentes - AdminSena')

@section('content')
<div class="row align-items-center mb-4">
    <div class="col-md-6">
        <h1 class="h3 fw-bold mb-1 text-dark">
            <i class="bi bi-people text-success me-2"></i> Docentes / Instructores
        </h1>
        <p class="text-muted small mb-0">Gestión de personal docente e instructores de la institución</p>
    </div>
    <div class="col-md-6 text-md-end mt-3 mt-md-0">
        <a href="{{ route('teachers.create') }}" class="btn-gradient">
            <i class="bi bi-plus-lg"></i> Registrar Nuevo Docente
        </a>
    </div>
</div>

<div class="card card-glass border-0">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-custom table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th class="ps-4 py-3">Nombre</th>
                        <th class="py-3">Correo Electrónico</th>
                        <th class="py-3">Área</th>
                        <th class="py-3">Centro</th>
                        <th class="py-3">Cursos Asociados</th>
                        <th class="py-3 text-end pe-4" style="width: 180px;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($teachers as $teacher)
                        <tr>
                            <td class="ps-4">
                                <div class="d-flex align-items-center">
                                    <div class="rounded-circle bg-success bg-opacity-10 text-success p-2 me-3 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                        <i class="bi bi-person-fill"></i>
                                    </div>
                                    <div>
                                        <span class="fw-semibold text-dark">{{ $teacher['name'] }}</span>
                                        <span class="d-block text-muted small">ID: #{{ $teacher['id'] }}</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="text-secondary small">
                                    <i class="bi bi-envelope me-1"></i> {{ $teacher['email'] }}
                                </span>
                            </td>
                            <td>
                                <span class="fw-semibold text-dark small">
                                    {{ $teacher['area']['name'] ?? 'N/A' }}
                                </span>
                            </td>
                            <td>
                                <span class="text-secondary small">
                                    {{ $teacher['training_center']['name'] ?? 'N/A' }}
                                </span>
                            </td>
                            <td>
                                @if(!empty($teacher['courses']))
                                    @foreach($teacher['courses'] as $course)
                                        <span class="badge bg-secondary bg-opacity-10 text-secondary fw-bold px-2 py-1 rounded-2 mb-1" style="font-size: 0.75rem;">
                                            #{{ $course['course_number'] }}
                                        </span>
                                    @endforeach
                                @else
                                    <span class="text-muted small">Sin cursos</span>
                                @endif
                            </td>
                            <td class="text-end pe-4">
                                <a href="{{ route('teachers.edit', $teacher['id']) }}" class="btn btn-sm btn-outline-secondary rounded-3 border-0 me-1" title="Editar">
                                    <i class="bi bi-pencil-fill"></i>
                                </a>
                                <form action="{{ route('teachers.destroy', $teacher['id']) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Está seguro de eliminar este docente?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger rounded-3 border-0" title="Eliminar" type="submit">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted">
                                <i class="bi bi-people display-4 text-secondary mb-3 d-block"></i>
                                No se encontraron docentes registrados.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
