@extends('layouts.app')

@section('title', 'Editar Equipo de Cómputo - AdminSena')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="mb-4">
            <a href="{{ route('computers.index') }}" class="text-decoration-none text-secondary small d-inline-flex align-items-center gap-1">
                <i class="bi bi-arrow-left"></i> Volver a la lista
            </a>
            <h1 class="h3 fw-bold mt-2 text-dark">
                <i class="bi bi-pencil-square text-success me-2"></i> Editar Equipo de Cómputo
            </h1>
            <p class="text-muted small mb-0">Modifique los datos técnicos del equipo de cómputo.</p>
        </div>

        <div class="card card-glass border-0" style="border-left: 5px solid var(--sena-green) !important;">
            <div class="card-body p-4 p-md-5">
                <form action="{{ route('computers.update', $computer['id']) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label for="number" class="form-label fw-bold text-secondary">Número de Inventario</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 text-muted" style="border-radius: 10px 0 0 10px;">
                                    <i class="bi bi-hash"></i>
                                </span>
                                <input type="text" class="form-control border-start-0 ps-0 @error('number') is-invalid @enderror" id="number" name="number" value="{{ old('number', $computer['number']) }}" placeholder="Ej. INVENTARIO-1002" required style="border-radius: 0 10px 10px 0; padding: 0.6rem 0.75rem;">
                                @error('number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <label for="brand" class="form-label fw-bold text-secondary">Marca del Equipo</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 text-muted" style="border-radius: 10px 0 0 10px;">
                                    <i class="bi bi-cpu"></i>
                                </span>
                                <input type="text" class="form-control border-start-0 ps-0 @error('brand') is-invalid @enderror" id="brand" name="brand" value="{{ old('brand', $computer['brand']) }}" placeholder="Ej. HP ProBook" required style="border-radius: 0 10px 10px 0; padding: 0.6rem 0.75rem;">
                                @error('brand')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-end gap-2 mt-5">
                        <a href="{{ route('computers.index') }}" class="btn btn-light fw-bold px-4 py-2" style="border-radius: 10px;">Cancelar</a>
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
