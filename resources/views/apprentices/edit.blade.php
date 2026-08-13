@extends('layouts.app')

@section('title', 'Editar Aprendiz - AdminSena')

@section('content')
<div class="row mb-4">
    <div class="col-md-12">
        <h1 class="h3 fw-bold mb-1 text-dark">
            <i class="bi bi-pencil-square text-success me-2"></i> Editar Aprendiz
        </h1>
        <p class="text-muted small mb-0">Modificar los datos del aprendiz</p>
    </div>
</div>
    <div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="mb-4">
            <a href="{{ route('apprentices.index') }}" class="text-decoration-none text-secondary small d-inline-flex align-items-center gap-1">
                <i class="bi bi-arrow-left"></i> Volver a la lista
            </a>
        </div>

        <div class="card card-glass border-0" style="border-left: 5px solid var(--sena-green) !important;">
            <div class="card-body p-4 p-md-5">
                <form action="{{ route('apprentices.update', $apprentice['id']) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-4">
                        <label for="name" class="form-label fw-bold text-secondary">Nombre Completo</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0 text-muted" style="border-radius: 10px 0 0 10px;">
                                <i class="bi bi-person-fill"></i>
                            </span>
                            <input type="text" class="form-control border-start-0 ps-0 @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $apprentice['name']) }}" required style="border-radius: 0 10px 10px 0; padding: 0.6rem 0.75rem;">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="document_type" class="form-label fw-bold text-secondary">Tipo de Documento</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0 text-muted" style="border-radius: 10px 0 0 10px;">
                                <i class="bi bi-id-card"></i>
                            </span>
                            <select class="form-select border-start-0 ps-0 @error('document_type') is-invalid @enderror" id="document_type" name="document_type" required style="border-radius: 0 10px 10px 0; padding: 0.6rem 0.75rem;">
                                <option value="" disabled selected>Seleccione...</option>
                                <option value="CC" {{ old('document_type', $apprentice['document_type']) == 'CC' ? 'selected' : '' }}>Cédula de Ciudadanía</option>
                                <option value="CE" {{ old('document_type', $apprentice['document_type']) == 'CE' ? 'selected' : '' }}>Cédula de Extranjería</option>
                                <option value="TI" {{ old('document_type', $apprentice['document_type']) == 'TI' ? 'selected' : '' }}>Tarjeta de Identidad</option>
                                <option value="PASSPORT" {{ old('document_type', $apprentice['document_type']) == 'PASSPORT' ? 'selected' : '' }}>Pasaporte</option>
                            </select>
                            @error('document_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="document_number" class="form-label fw-bold text-secondary">Número de Documento</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0 text-muted" style="border-radius: 10px 0 0 10px;">
                                <i class="bi bi-shield-lock"></i>
                            </span>
                            <input type="text" class="form-control border-start-0 ps-0 @error('document_number') is-invalid @enderror" id="document_number" name="document_number" value="{{ old('document_number', $apprentice['document_number']) }}" required style="border-radius: 0 10px 10px 0; padding: 0.6rem 0.75rem;">
                            @error('document_number')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="email" class="form-label fw-bold text-secondary">Correo Electrónico</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0 text-muted" style="border-radius: 10px 0 0 10px;">
                                <i class="bi bi-envelope"></i>
                            </span>
                            <input type="email" class="form-control border-start-0 ps-0 @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $apprentice['email']) }}" required style="border-radius: 0 10px 10px 0; padding: 0.6rem 0.75rem;">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="phone" class="form-label fw-bold text-secondary">Teléfono</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0 text-muted" style="border-radius: 10px 0 0 10px;">
                                <i class="bi bi-telephone"></i>
                            </span>
                            <input type="text" class="form-control border-start-0 ps-0 @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone', $apprentice['phone']) }}" required style="border-radius: 0 10px 10px 0; padding: 0.6rem 0.75rem;">
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="course_number" class="form-label fw-bold text-secondary">Número de Ficha / Curso</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0 text-muted" style="border-radius: 10px 0 0 10px;">
                                <i class="bi bi-hash"></i>
                            </span>
                            <select class="form-select border-start-0 ps-0 @error('course_number') is-invalid @enderror" id="course_number" name="course_number" required style="border-radius: 0 10px 10px 0; padding: 0.6rem 0.75rem;">
                                <option value="" disabled selected>Seleccione...</option>
                                @foreach($courses as $course)
                                    <option value="{{ $course['course_number'] }}" {{ old('course_number', $apprentice['course_number']) == $course['course_number'] ? 'selected' : '' }}>{{ $course['course_number'] }} ({{ $course['day'] }})</option>
                                @endforeach
                            </select>
                            @error('course_number')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-end gap-2 mt-5">
                        <a href="{{ route('apprentices.index') }}" class="btn btn-light fw-bold px-4 py-2" style="border-radius: 10px;">Cancelar</a>
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