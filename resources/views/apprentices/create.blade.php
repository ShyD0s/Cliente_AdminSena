@extends('layouts.app')

@section('title', 'Registrar Aprendiz - AdminSena')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="mb-4">
            <a href="{{ route('apprentices.index') }}" class="text-decoration-none text-secondary small d-inline-flex align-items-center gap-1">
                <i class="bi bi-arrow-left"></i> Volver a la lista
            </a>
            <h1 class="h3 fw-bold mt-2 text-dark">
                <i class="bi bi-plus-circle text-success me-2"></i> Registrar Nuevo Aprendiz
            </h1>
            <p class="text-muted small mb-0">Registre la información académica de un nuevo aprendiz y su equipo de cómputo asignado.</p>
        </div>

        <div class="card card-glass border-0" style="border-left: 5px solid var(--sena-green) !important;">
            <div class="card-body p-4 p-md-5">
                <form action="{{ route('apprentices.store') }}" method="POST">
                    @csrf
                    
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label for="name" class="form-label fw-bold text-secondary">Nombre Completo</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 text-muted" style="border-radius: 10px 0 0 10px;">
                                    <i class="bi bi-person-fill"></i>
                                </span>
                                <input type="text" class="form-control border-start-0 ps-0 @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="Ej. Ana María Restrepo" required style="border-radius: 0 10px 10px 0; padding: 0.6rem 0.75rem;">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <label for="email" class="form-label fw-bold text-secondary">Correo Electrónico</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 text-muted" style="border-radius: 10px 0 0 10px;">
                                    <i class="bi bi-envelope"></i>
                                </span>
                                <input type="email" class="form-control border-start-0 ps-0 @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="Ej. amrestrepo@sena.edu.co" required style="border-radius: 0 10px 10px 0; padding: 0.6rem 0.75rem;">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label for="cell_number" class="form-label fw-bold text-secondary">Número Celular</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 text-muted" style="border-radius: 10px 0 0 10px;">
                                    <i class="bi bi-telephone"></i>
                                </span>
                                <input type="text" class="form-control border-start-0 ps-0 @error('cell_number') is-invalid @enderror" id="cell_number" name="cell_number" value="{{ old('cell_number') }}" placeholder="Ej. 3127654321" required style="border-radius: 0 10px 10px 0; padding: 0.6rem 0.75rem;">
                                @error('cell_number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <label for="course_id" class="form-label fw-bold text-secondary">Ficha de Curso</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 text-muted" style="border-radius: 10px 0 0 10px;">
                                    <i class="bi bi-journal-bookmark"></i>
                                </span>
                                <select class="form-select border-start-0 ps-0 @error('course_id') is-invalid @enderror" id="course_id" name="course_id" required style="border-radius: 0 10px 10px 0; padding: 0.6rem 0.75rem;">
                                    <option value="" disabled selected>Seleccione ficha...</option>
                                    @foreach($courses as $course)
                                        <option value="{{ $course['id'] }}" {{ old('course_id') == $course['id'] ? 'selected' : '' }}>Ficha {{ $course['course_number'] }} ({{ $course['day'] }})</option>
                                    @endforeach
                                </select>
                                @error('course_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <label for="computer_id" class="form-label fw-bold text-secondary">Equipo de Cómputo Asignado <span class="text-muted fw-normal">(Opcional)</span></label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 text-muted" style="border-radius: 10px 0 0 10px;">
                                    <i class="bi bi-pc-display"></i>
                                </span>
                                <select class="form-select border-start-0 ps-0 @error('computer_id') is-invalid @enderror" id="computer_id" name="computer_id" style="border-radius: 0 10px 10px 0; padding: 0.6rem 0.75rem;">
                                    <option value="" selected>Sin equipo (Dejar libre)</option>
                                    @foreach($computers as $computer)
                                        <option value="{{ $computer['id'] }}" {{ old('computer_id') == $computer['id'] ? 'selected' : '' }}>{{ $computer['brand'] }} [{{ $computer['number'] }}]</option>
                                    @endforeach
                                </select>
                                @error('computer_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-text small text-muted">Nota: Cada equipo solo se puede asignar a un único aprendiz.</div>
                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-end gap-2 mt-5">
                        <a href="{{ route('apprentices.index') }}" class="btn btn-light fw-bold px-4 py-2" style="border-radius: 10px;">Cancelar</a>
                        <button type="submit" class="btn-gradient">
                            <i class="bi bi-cloud-arrow-up-fill"></i> Registrar Aprendiz
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
