@extends('layouts.app')
@section('title', 'Publicar Viaje')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0 text-success fw-bold"><i class="fas fa-route me-2"></i>Publicar Nuevo Viaje</h5>
            </div>
            <div class="card-body p-4">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('rides.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-4">
                        <label class="form-label fw-bold">¿Qué vehículo usarás?</label>
                        <select name="vehicle_id" class="form-select form-select-lg" required>
                            @foreach($vehicles as $vehicle)
                                <option value="{{ $vehicle->id }}">
                                    {{ $vehicle->marca }} {{ $vehicle->modelo }} ({{ $vehicle->placa }}) - Capacidad: {{ $vehicle->capacity }}
                                </option>
                            @endforeach
                        </select>
                        <div class="form-text">Solo aparecen tus vehículos registrados.</div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label small text-muted">Origen</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="fas fa-map-marker-alt"></i></span>
                                <input type="text" name="origin" class="form-control" placeholder="Ej: San José" value="{{ old('origin') }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small text-muted">Destino</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="fas fa-flag-checkered"></i></span>
                                <input type="text" name="destination" class="form-control" placeholder="Ej: Cartago" value="{{ old('destination') }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-4">
                            <label class="form-label small text-muted">Fecha y Hora</label>
                            <input type="datetime-local" name="departure_time" class="form-control" value="{{ old('departure_time') }}" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small text-muted">Costo (₡)</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light">₡</span>
                                <input type="number" name="cost" class="form-control" placeholder="Ej: 2000" min="0" value="{{ old('cost') }}" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small text-muted">Asientos Disponibles</label>
                            <input type="number" name="seats_available" class="form-control" placeholder="Ej: 3" min="1" value="{{ old('seats_available') }}" required>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('dashboard') }}" class="btn btn-light text-muted">Cancelar</a>
                        <button type="submit" class="btn btn-success px-4 fw-bold">
                            <i class="fas fa-paper-plane me-2"></i> Publicar Viaje
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection