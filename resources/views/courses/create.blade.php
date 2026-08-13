@extends('layouts.app')

@section('title', 'Crear Curso - AdminSena')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="mb-4">
            <a href="{{ route('courses.index') }}" class="text-decoration-none text-secondary small d-inline-flex align-items-center gap-1">
                <i class="bi bi-arrow-left"></i> Volver a la lista
            </a>
            <h1 class="h3 fw-bold mt-2 text-dark">
                <i class="bi bi-plus-circle text-success me-2"></i> Crear Nuevo Curso
            </h1>
            <p class="text-muted small mb-0">Registre un nuevo curso asociándolo con un área y centro de formación.</p>
        </div>

        <div class="card card-glass border-0" style="border-left: 5px solid var(--sena-green) !important;">
            <div class="card-body p-4 p-md-5">
                <form action="{{ route('courses.store') }}" method="POST">
                    @csrf
                    
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label for="course_number" class="form-label fw-bold text-secondary">Número de Ficha / Curso</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 text-muted" style="border-radius: 10px 0 0 10px;">
                                    <i class="bi bi-hash"></i>
                                </span>
                                <input type="text" class="form-control border-start-0 ps-0 @error('course_number') is-invalid @enderror" id="course_number" name="course_number" value="{{ old('course_number') }}" placeholder="Ej. 2670142" required style="border-radius: 0 10px 10px 0; padding: 0.6rem 0.75rem;">
                                @error('course_number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <label for="day" class="form-label fw-bold text-secondary">Día de Formación</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 text-muted" style="border-radius: 10px 0 0 10px;">
                                    <i class="bi bi-calendar-event"></i>
                                </span>
                                <select class="form-select border-start-0 ps-0 @error('day') is-invalid @enderror" id="day" name="day" required style="border-radius: 0 10px 10px 0; padding: 0.6rem 0.75rem;">
                                    <option value="" disabled selected>Seleccione un día...</option>
                                    <option value="Lunes" {{ old('day') == 'Lunes' ? 'selected' : '' }}>Lunes</option>
                                    <option value="Martes" {{ old('day') == 'Martes' ? 'selected' : '' }}>Martes</option>
                                    <option value="Miércoles" {{ old('day') == 'Miércoles' ? 'selected' : '' }}>Miércoles</option>
                                    <option value="Jueves" {{ old('day') == 'Jueves' ? 'selected' : '' }}>Jueves</option>
                                    <option value="Viernes" {{ old('day') == 'Viernes' ? 'selected' : '' }}>Viernes</option>
                                    <option value="Sábado" {{ old('day') == 'Sábado' ? 'selected' : '' }}>Sábado</option>
                                </select>
                                @error('day')
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
                                    <option value="" disabled selected>Seleccione área...</option>
                                    @foreach($areas as $area)
                                        <option value="{{ $area['id'] }}" {{ old('area_id') == $area['id'] ? 'selected' : '' }}>{{ $area['name'] }}</option>
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
                                    <option value="" disabled selected>Seleccione centro...</option>
                                    @foreach($training_centers as $center)
                                        <option value="{{ $center['id'] }}" {{ old('training_center_id') == $center['id'] ? 'selected' : '' }}>{{ $center['name'] }} ({{ $center['location'] }})</option>
                                    @endforeach
                                </select>
                                @error('training_center_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-end gap-2 mt-5">
                        <a href="{{ route('courses.index') }}" class="btn btn-light fw-bold px-4 py-2" style="border-radius: 10px;">Cancelar</a>
                        <button type="submit" class="btn-gradient">
                            <i class="bi bi-cloud-arrow-up-fill"></i> Guardar Curso
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
