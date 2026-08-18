@extends('layouts.app')

@section('title', 'Aprendices - AdminSena')

@section('content')
<div class="row align-items-center mb-4">
    <div class="col-md-6">
        <h1 class="h3 fw-bold mb-1 text-dark">
            <i class="bi bi-mortarboard text-success me-2"></i> Aprendices Registrados
        </h1>
        <p class="text-muted small mb-0">Gestión de matrícula de aprendices y asignación de equipos</p>
    </div>
    <div class="col-md-6 text-md-end mt-3 mt-md-0">
        <a href="{{ route('apprentices.create') }}" class="btn-gradient">
            <i class="bi bi-plus-lg"></i> Registrar Nuevo Aprendiz
        </a>
    </div>
</div>

<div class="card card-glass border-0">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-custom table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th class="ps-4 py-3">Nombre Aprendiz</th>
                        <th class="py-3">Contacto</th>
                        <th class="py-3">Ficha de Curso</th>
                        <th class="py-3">Equipo de Cómputo</th>
                        <th class="py-3 text-end pe-4" style="width: 180px;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($apprentices as $apprentice)
                        <tr>
                            <td class="ps-4">
                                <div class="d-flex align-items-center">
                                    <div class="rounded-circle bg-success bg-opacity-10 text-success p-2 me-3 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                        <i class="bi bi-person-badge-fill"></i>
                                    </div>
                                    <div>
                                        <span class="fw-semibold text-dark">{{ $apprentice['name'] }}</span>
                                        <span class="d-block text-muted small">ID: #{{ $apprentice['id'] }}</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="d-block text-secondary small">
                                    <i class="bi bi-envelope me-1"></i> {{ $apprentice['email'] }}
                                </span>
                                <span class="d-block text-muted small mt-1">
                                    <i class="bi bi-telephone me-1"></i> {{ $apprentice['cell_number'] }}
                                </span>
                            </td>
                            <td>
                                <span class="badge bg-success bg-opacity-10 text-success fw-bold px-3 py-2 rounded-3 fs-6">
                                    {{ $apprentice['course']['course_number'] ?? 'N/A' }}
                                </span>
                            </td>
                            <td>
                                @if(!empty($apprentice['computer']))
                                    <span class="text-dark small fw-semibold">
                                        <i class="bi bi-pc-display text-success me-1"></i> {{ $apprentice['computer']['brand'] }}
                                        <span class="text-muted font-monospace">[{{ $apprentice['computer']['number'] }}]</span>
                                    </span>
                                @else
                                    <span class="badge bg-warning bg-opacity-10 text-warning px-3 py-2 rounded-3 fw-semibold">
                                        <i class="bi bi-exclamation-circle me-1"></i> Sin equipo asignado
                                    </span>
                                @endif
                            </td>
                            <td class="text-end pe-4">
                                <a href="{{ route('apprentices.edit', $apprentice['id']) }}" class="btn btn-sm btn-outline-secondary rounded-3 border-0 me-1" title="Editar">
                                    <i class="bi bi-pencil-fill"></i>
                                </a>
                                <form action="{{ route('apprentices.destroy', $apprentice['id']) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Está seguro de eliminar este aprendiz?')">
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
                                <i class="bi bi-person-x display-4 text-secondary mb-3 d-block"></i>
                                No se encontraron aprendices registrados.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
