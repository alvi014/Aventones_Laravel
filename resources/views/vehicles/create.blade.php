@extends('layouts.app')
@section('title', 'Registrar Vehículo')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0 text-primary fw-bold"><i class="fas fa-plus-circle me-2"></i>Registrar Nuevo Vehículo</h5>
            </div>
            <div class="card-body p-4">
                
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('vehicles.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label small text-muted">Placa</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="fas fa-barcode"></i></span>
                                <input type="text" name="placa" class="form-control" placeholder="Ej: ABC-123" value="{{ old('placa') }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small text-muted">Marca</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="fas fa-tag"></i></span>
                                <input type="text" name="marca" class="form-control" placeholder="Ej: Toyota" value="{{ old('marca') }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label small text-muted">Modelo</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="fas fa-car-side"></i></span>
                                <input type="text" name="modelo" class="form-control" placeholder="Ej: Yaris" value="{{ old('modelo') }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small text-muted">Año</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="fas fa-calendar"></i></span>
                                <input type="number" name="year" class="form-control" placeholder="Ej: 2018" value="{{ old('year') }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label small text-muted">Color</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="fas fa-palette"></i></span>
                                <input type="text" name="color" class="form-control" placeholder="Ej: Rojo" value="{{ old('color') }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small text-muted">Capacidad (Pasajeros)</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="fas fa-users"></i></span>
                                <input type="number" name="capacity" class="form-control" placeholder="Ej: 4" min="1" value="{{ old('capacity') }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label small text-muted">Foto del Vehículo (Opcional)</label>
                        <input type="file" name="photo" class="form-control" accept="image/*">
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('vehicles.index') }}" class="btn btn-light text-muted">Cancelar</a>
                        <button type="submit" class="btn btn-primary px-4 fw-bold">
                            <i class="fas fa-save me-2"></i> Guardar Vehículo
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection