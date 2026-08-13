@extends('layouts.app')

@section('title', 'Editar Área - AdminSena')

@section('content')
<div class="row mb-4">
    <div class="col-md-12">
        <h1 class="h3 fw-bold mb-1 text-dark">
            <i class="bi bi-pencil-square text-success me-2"></i> Editar Área
        </h1>
        <p class="text-muted small mb-0">Modificar los datos del área</p>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="mb-4">
            <a href="{{ route('areas.index') }}" class="text-decoration-none text-secondary small d-inline-flex align-items-center gap-1">
                <i class="bi bi-arrow-left"></i> Volver a la lista
            </a>
        </div>

        <div class="card card-glass border-0" style="border-left: 5px solid var(--sena-green) !important;">
            <div class="card-body p-4 p-md-5">
                <form action="{{ route('areas.update', $area['id']) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-4">
                        <label for="name" class="form-label fw-bold text-secondary">Nombre del Área</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0 text-muted" style="border-radius: 10px 0 0 10px;">
                                <i class="bi bi-building"></i>
                            </span>
                            <input type="text" class="form-control border-start-0 ps-0 @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $area['name']) }}" required style="border-radius: 0 10px 10px 0; padding: 0.6rem 0.75rem;">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-text small text-muted">Nombre del espacio físico o zona (ej. Sala de Cómputo A).</div>
                    </div>

                    <div class="mb-4">
                        <label for="number" class="form-label fw-bold text-secondary">Número o Código</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0 text-muted" style="border-radius: 10px 0 0 10px;">
                                <i class="bi bi-hash"></i>
                            </span>
                            <input type="text" class="form-control border-start-0 ps-0 @error('number') is-invalid @enderror" id="number" name="number" value="{{ old('number', $area['number']) }}" placeholder="Ej. A101, SC-03" required style="border-radius: 0 10px 10px 0; padding: 0.6rem 0.75rem;">
                            @error('number')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-text small text-muted">Código identificador del área.</div>
                    </div>

                    <div class="mb-4">
                        <label for="equipment_limit" class="form-label fw-bold text-secondary">Límite de Equipos</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0 text-muted" style="border-radius: 10px 0 0 10px;">
                                <i class="bi bi-pc-display-horizontal"></i>
                            </span>
                            <input type="number" class="form-control border-start-0 ps-0 @error('equipment_limit') is-invalid @enderror" id="equipment_limit" name="equipment_limit" value="{{ old('equipment_limit', $area['equipment_limit']) }}" min="0" required style="border-radius: 0 10px 10px 0; padding: 0.6rem 0.75rem;">
                            @error('equipment_limit')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-text small text-muted">Cantidad máxima de equipos que puede albergar.</div>
                    </div>

                    <div class="mb-4">
                        <label for="description" class="form-label fw-bold text-secondary">Descripción</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" style="border-radius: 10px; padding: 0.75rem;" placeholder="Descripción breve del área...">{{ old('description', $area['description']) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex align-items-center justify-content-end gap-2 mt-5">
                        <a href="{{ route('areas.index') }}" class="btn btn-light fw-bold px-4 py-2" style="border-radius: 10px;">Cancelar</a>
                        <button type="submit" class="btn-gradient">
                            <i class="bi bi-floppy-fill"></i> Guardar Cambios
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection