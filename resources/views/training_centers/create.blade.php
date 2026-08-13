@extends('layouts.app')

@section('title', 'Registrar Centro - AdminSena')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="mb-4">
            <a href="{{ route('training_centers.index') }}" class="text-decoration-none text-secondary small d-inline-flex align-items-center gap-1">
                <i class="bi bi-arrow-left"></i> Volver a la lista
            </a>
            <h1 class="h3 fw-bold mt-2 text-dark">
                <i class="bi bi-plus-circle text-success me-2"></i> Registrar Nuevo Centro
            </h1>
            <p class="text-muted small mb-0">Complete la información para registrar un centro de formación institucional.</p>
        </div>

        <div class="card card-glass border-0" style="border-left: 5px solid var(--sena-green) !important;">
            <div class="card-body p-4 p-md-5">
                <form action="{{ route('training_centers.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-4">
                        <label for="name" class="form-label fw-bold text-secondary">Nombre del Centro</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0 text-muted" style="border-radius: 10px 0 0 10px;">
                                <i class="bi bi-building-fill"></i>
                            </span>
                            <input type="text" class="form-control border-start-0 ps-0 @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="Ej. Centro de Diseño e Innovación Tecnológica" required style="border-radius: 0 10px 10px 0; padding: 0.6rem 0.75rem;">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-text small text-muted">Use el nombre oficial completo del centro formativo.</div>
                    </div>

                    <div class="mb-4">
                        <label for="location" class="form-label fw-bold text-secondary">Ubicación / Ciudad</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0 text-muted" style="border-radius: 10px 0 0 10px;">
                                <i class="bi bi-geo-alt-fill"></i>
                            </span>
                            <input type="text" class="form-control border-start-0 ps-0 @error('location') is-invalid @enderror" id="location" name="location" value="{{ old('location') }}" placeholder="Ej. Pereira, Risaralda" required style="border-radius: 0 10px 10px 0; padding: 0.6rem 0.75rem;">
                            @error('location')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-text small text-muted">Especifique la ciudad y departamento de la sede.</div>
                    </div>

                    <div class="d-flex align-items-center justify-content-end gap-2 mt-5">
                        <a href="{{ route('training_centers.index') }}" class="btn btn-light fw-bold px-4 py-2" style="border-radius: 10px;">Cancelar</a>
                        <button type="submit" class="btn-gradient">
                            <i class="bi bi-cloud-arrow-up-fill"></i> Guardar Centro
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
