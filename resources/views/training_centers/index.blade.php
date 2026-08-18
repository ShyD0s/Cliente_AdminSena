@extends('layouts.app')

@section('title', 'Centros de Formación - AdminSena')

@section('content')
<div class="row align-items-center mb-4">
    <div class="col-md-6">
        <h1 class="h3 fw-bold mb-1 text-dark">
            <i class="bi bi-building text-success me-2"></i> Centros de Formación
        </h1>
        <p class="text-muted small mb-0">Gestión de sedes y centros académicos</p>
    </div>
    <div class="col-md-6 text-md-end mt-3 mt-md-0">
        <a href="{{ route('training_centers.create') }}" class="btn-gradient">
            <i class="bi bi-plus-lg"></i> Registrar Nuevo Centro
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
                        <th class="py-3">Nombre del Centro</th>
                        <th class="py-3">Ubicación / Ciudad</th>
                        <th class="py-3 text-end pe-4" style="width: 180px;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($training_centers as $center)
                        <tr>
                            <td class="ps-4 fw-bold text-secondary">#{{ $center['id'] }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="rounded-circle bg-success bg-opacity-10 text-success p-2 me-3 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                        <i class="bi bi-building-fill"></i>
                                    </div>
                                    <div>
                                        <span class="fw-semibold text-dark">{{ $center['name'] }}</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="text-secondary">
                                    <i class="bi bi-geo-alt-fill text-danger me-1"></i> {{ $center['location'] }}
                                </span>
                            </td>
                            <td class="text-end pe-4">
                                <a href="{{ route('training_centers.edit', $center['id']) }}" class="btn btn-sm btn-outline-secondary rounded-3 border-0 me-1" title="Editar">
                                    <i class="bi bi-pencil-fill"></i>
                                </a>
                                <form action="{{ route('training_centers.destroy', $center['id']) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Está seguro de eliminar este centro de formación?')">
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
                            <td colspan="4" class="text-center py-5 text-muted">
                                <i class="bi bi-geo display-4 text-secondary mb-3 d-block"></i>
                                No se encontraron centros de formación registrados.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
