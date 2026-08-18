@extends('layouts.app')

@section('title', 'Editar Docente - AdminSena')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="mb-4">
            <a href="{{ route('teachers.index') }}" class="text-decoration-none text-secondary small d-inline-flex align-items-center gap-1">
                <i class="bi bi-arrow-left"></i> Volver a la lista
            </a>
            <h1 class="h3 fw-bold mt-2 text-dark">
                <i class="bi bi-pencil-square text-success me-2"></i> Editar Docente
            </h1>
            <p class="text-muted small mb-0">Modifique la información personal y académica del docente.</p>
        </div>

        <div class="card card-glass border-0" style="border-left: 5px solid var(--sena-green) !important;">
            <div class="card-body p-4 p-md-5">
                <form action="{{ route('teachers.update', $teacher['id']) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label for="name" class="form-label fw-bold text-secondary">Nombre Completo</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 text-muted" style="border-radius: 10px 0 0 10px;">
                                    <i class="bi bi-person-fill"></i>
                                </span>
                                <input type="text" class="form-control border-start-0 ps-0 @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $teacher['name']) }}" placeholder="Ej. Carlos Mario Gómez" required style="border-radius: 0 10px 10px 0; padding: 0.6rem 0.75rem;">
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
                                <input type="email" class="form-control border-start-0 ps-0 @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $teacher['email']) }}" placeholder="Ej. cmgomez@sena.edu.co" required style="border-radius: 0 10px 10px 0; padding: 0.6rem 0.75rem;">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label for="area_id" class="form-label fw-bold text-secondary">Área Académica</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 text-muted" style="border-radius: 10px 0 0 10px;">
                                    <i class="bi bi-diagram-3"></i>
                                </span>
                                <select class="form-select border-start-0 ps-0 @error('area_id') is-invalid @enderror" id="area_id" name="area_id" required style="border-radius: 0 10px 10px 0; padding: 0.6rem 0.75rem;">
                                    <option value="" disabled>Seleccione área...</option>
                                    @foreach($areas as $area)
                                        <option value="{{ $area['id'] }}" {{ old('area_id', $teacher['area_id']) == $area['id'] ? 'selected' : '' }}>{{ $area['name'] }}</option>
                                    @endforeach
                                </select>
                                @error('area_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <label for="training_center_id" class="form-label fw-bold text-secondary">Centro de Formación</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 text-muted" style="border-radius: 10px 0 0 10px;">
                                    <i class="bi bi-building"></i>
                                </span>
                                <select class="form-select border-start-0 ps-0 @error('training_center_id') is-invalid @enderror" id="training_center_id" name="training_center_id" required style="border-radius: 0 10px 10px 0; padding: 0.6rem 0.75rem;">
                                    <option value="" disabled>Seleccione centro...</option>
                                    @foreach($training_centers as $center)
                                        <option value="{{ $center['id'] }}" {{ old('training_center_id', $teacher['training_center_id']) == $center['id'] ? 'selected' : '' }}>{{ $center['name'] }} ({{ $center['location'] }})</option>
                                    @endforeach
                                </select>
                                @error('training_center_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <label class="form-label fw-bold text-secondary">Cursos / Fichas Asociadas</label>
                            <div class="card p-3 border shadow-sm" style="border-radius: 10px; max-height: 220px; overflow-y: auto;">
                                @forelse($courses as $course)
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" name="course_ids[]" value="{{ $course['id'] }}" id="course_{{ $course['id'] }}" {{ in_array($course['id'], old('course_ids', $selectedCourseIds)) ? 'checked' : '' }}>
                                        <label class="form-check-label text-dark" for="course_{{ $course['id'] }}">
                                            Ficha <strong>{{ $course['course_number'] }}</strong> ({{ $course['day'] }}) - {{ $course['area']['name'] ?? 'Sin área' }}
                                        </label>
                                    </div>
                                @empty
                                    <span class="text-muted small">No hay cursos formativos disponibles en el sistema.</span>
                                @endforelse
                            </div>
                            <div class="form-text small text-muted mt-2">Seleccione los cursos/fichas que el docente tendrá a cargo.</div>
                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-end gap-2 mt-5">
                        <a href="{{ route('teachers.index') }}" class="btn btn-light fw-bold px-4 py-2" style="border-radius: 10px;">Cancelar</a>
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
