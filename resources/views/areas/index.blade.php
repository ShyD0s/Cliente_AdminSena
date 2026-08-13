@extends('layouts.app')

@section('title', 'Áreas - AdminSena')

@section('content')
<div class="row align-items-center mb-4">
    <div class="col-md-6">
        <h1 class="h3 fw-bold mb-1 text-dark">
            <i class="bi bi-diagram-3 text-success me-2"></i> Áreas Académicas
        </h1>
        <p class="text-muted small mb-0">Gestión de áreas de formación institucional</p>
    </div>
    <div class="col-md-6 text-md-end mt-3 mt-md-0">
        <a href="{{ route('areas.create') }}" class="btn-gradient">
            <i class="bi bi-plus-lg"></i> Crear Nueva Área
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
                        <th class="py-3">Nombre del Área</th>
                        <th class="py-3 text-end pe-4" style="width: 180px;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($areas as $area)
                        <tr>
                            <td class="ps-4 fw-bold text-secondary">#{{ $area['id'] }}</td>
                            <td>
                                <form action="{{ route('areas.update', $area['id']) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="text" name="name" value="{{ $area['name'] }}" class="form-control">
                                    <button type="submit" class="btn btn-sm btn-outline-secondary rounded-3 border-0 me-1" title="Actualizar">Actualizar Área</button>
                                </form>
                            </td>
                            <td class="text-end pe-4">
                                <form action="{{ route('areas.destroy', $area['id']) }}" method="POST" class="d-inline">
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
                            <td colspan="3" class="text-center py-5 text-muted">
                                <i class="bi bi-folder-x display-4 text-secondary mb-3 d-block"></i>
                                No se encontraron áreas académicas registradas.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
