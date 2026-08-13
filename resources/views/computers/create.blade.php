@extends('layouts.app')

@section('title', 'Registrar Equipo - AdminSena')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="mb-4">
            <a href="{{ route('computers.index') }}" class="text-decoration-none text-secondary small d-inline-flex align-items-center gap-1">
                <i class="bi bi-arrow-left"></i> Volver a la lista
            </a>
            <h1 class="h3 fw-bold mt-2 text-dark">
                <i class="bi bi-plus-circle text-success me-2"></i> Registrar Nuevo Equipo
            </h1>
            <p class="text-muted small mb-0">Complete la información para registrar un equipo tecnológico.</p>
        </div>

        <div class="card card-glass border-0" style="border-left: 5px solid var(--sena-green) !important;">
            <div class="card-body p-4 p-md-5">
                <form action="{{ route('computers.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-4">
                        <label for="number" class="form-label fw-bold text-secondary">Número de Inventario</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0 text-muted" style="border-radius: 10px 0 0 10px;">
                                <i class="bi bi-hash"></i>
                            </span>
                            <input type="text" class="form-control border-start-0 ps-0 @error('number') is-invalid @enderror" id="number" name="number" value="{{ old('number') }}" placeholder="Ej. SENA-EQ-903" required style="border-radius: 0 10px 10px 0; padding: 0.6rem 0.75rem;">
                            @error('number')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-text small text-muted">Use la placa física o serial de inventario del equipo.</div>
                    </div>

                    <div class="mb-4">
                        <label for="brand" class="form-label fw-bold text-secondary">Marca del Equipo</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0 text-muted" style="border-radius: 10px 0 0 10px;">
                                <i class="bi bi-cpu-fill"></i>
                            </span>
                            <input type="text" class="form-control border-start-0 ps-0 @error('brand') is-invalid @enderror" id="brand" name="brand" value="{{ old('brand') }}" placeholder="Ej. Lenovo, Dell, HP" required style="border-radius: 0 10px 10px 0; padding: 0.6rem 0.75rem;">
                            @error('brand')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-end gap-2 mt-5">
                        <a href="{{ route('computers.index') }}" class="btn btn-light fw-bold px-4 py-2" style="border-radius: 10px;">Cancelar</a>
                        <button type="submit" class="btn-gradient">
                            <i class="bi bi-cloud-arrow-up-fill"></i> Guardar Equipo
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
