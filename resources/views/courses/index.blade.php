@extends('layouts.app')

@section('title', 'Cursos - AdminSena')

@section('content')
<div class="row align-items-center mb-4">
    <div class="col-md-6">
        <h1 class="h3 fw-bold mb-1 text-dark">
            <i class="bi bi-journal-bookmark text-success me-2"></i> Cursos Formativos
        </h1>
        <p class="text-muted small mb-0">Gestión de programas de formación y fichas</p>
    </div>
    <div class="col-md-6 text-md-end mt-3 mt-md-0">
        <a href="{{ route('courses.create') }}" class="btn-gradient">
            <i class="bi bi-plus-lg"></i> Crear Nuevo Curso
        </a>
    </div>
</div>

<div class="card card-glass border-0">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-custom table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th class="ps-4 py-3" style="width: 100px;">Ficha</th>
                        <th class="py-3">Día de Formación</th>
                        <th class="py-3">Área de Formación</th>
                        <th class="py-3">Centro de Formación</th>
                        <th class="py-3 text-end pe-4" style="width: 180px;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($courses as $course)
                        <tr>
                            <td class="ps-4">
                                <span class="badge bg-success bg-opacity-10 text-success fw-bold px-3 py-2 rounded-3 fs-6">
                                    {{ $course['course_number'] }}
                                </span>
                            </td>
                            <td>
                                <span class="fw-semibold text-secondary">
                                    <i class="bi bi-calendar-event me-1"></i> {{ $course['day'] }}
                                </span>
                            </td>
                            <td>
                                <span class="fw-semibold text-dark">
                                    {{ $course['area']['name'] ?? 'N/A' }}
                                </span>
                            </td>
                            <td>
                                <span class="text-secondary small">
                                    <i class="bi bi-building-fill me-1"></i> {{ $course['training_center']['name'] ?? 'N/A' }}
                                    @if(isset($course['training_center']['location']))
                                        <span class="text-muted">({{ $course['training_center']['location'] }})</span>
                                    @endif
                                </span>
                            </td>
                            <td class="text-end pe-4">
                                <a href="{{ route('courses.edit', $course['id']) }}" class="btn btn-sm btn-outline-secondary rounded-3 border-0 me-1" title="Editar">
                                    <i class="bi bi-pencil-fill"></i>
                                </a>
                                <form action="{{ route('courses.destroy', $course['id']) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Está seguro de eliminar este curso?')">
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
                            <td colspan="5" class="text-center py-5 text-muted">
                                <i class="bi bi-journal-x display-4 text-secondary mb-3 d-block"></i>
                                No se encontraron cursos formativos registrados.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
