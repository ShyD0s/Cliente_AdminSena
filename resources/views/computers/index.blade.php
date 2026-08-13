@extends('layouts.app')

@section('title', 'Equipos de Cómputo - AdminSena')

@section('content')
<div class="row align-items-center mb-4">
    <div class="col-md-6">
        <h1 class="h3 fw-bold mb-1 text-dark">
            <i class="bi bi-pc-display-horizontal text-success me-2"></i> Equipos de Cómputo
        </h1>
        <p class="text-muted small mb-0">Gestión de recursos tecnológicos de la institución</p>
    </div>
    <div class="col-md-6 text-md-end mt-3 mt-md-0">
        <a href="{{ route('computers.create') }}" class="btn-gradient">
            <i class="bi bi-plus-lg"></i> Registrar Nuevo Equipo
        </a>
    </div>
</div>

<div class="card card-glass border-0">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-custom table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th class="ps-4 py-3" style="width: 100px;">ID</th>
                        <th class="py-3">Número de Inventario</th>
                        <th class="py-3">Marca del Equipo</th>
                        <th class="py-3 text-end pe-4" style="width: 180px;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($computers as $computer)
                        <tr>
                            <td class="ps-4 fw-bold text-secondary">#{{ $computer['id'] }}</td>
                            <td>
                                <span class="badge bg-success bg-opacity-10 text-success fw-bold px-3 py-2 rounded-3 fs-6">
                                    <i class="bi bi-hash"></i> {{ $computer['number'] }}
                                </span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="rounded-circle bg-dark bg-opacity-5 text-dark p-2 me-3 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                        <i class="bi bi-cpu-fill text-secondary"></i>
                                    </div>
                                    <div>
                                        <span class="fw-semibold text-dark">{{ $computer['brand'] }}</span>
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-4">
                                <button class="btn btn-sm btn-outline-secondary rounded-3 border-0 me-1" title="Editar (Próximamente)" disabled>
                                    <i class="bi bi-pencil-fill"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger rounded-3 border-0" title="Eliminar (Próximamente)" disabled>
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-5 text-muted">
                                <i class="bi bi-laptop display-4 text-secondary mb-3 d-block"></i>
                                No se encontraron equipos de cómputo registrados.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
