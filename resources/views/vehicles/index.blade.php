@extends('layouts.app')
@section('title', 'Mis Vehículos')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
        <h5 class="mb-0 text-primary fw-bold"><i class="fas fa-car me-2"></i>Mis Vehículos</h5>
        <a href="{{ route('vehicles.create') }}" class="btn btn-primary btn-sm rounded-pill">
            <i class="fas fa-plus me-1"></i> Nuevo Vehículo
        </a>
    </div>
    <div class="card-body">
        @if($vehicles->isEmpty())
            <div class="text-center py-5 text-muted">
                <i class="fas fa-car-crash fa-3x mb-3"></i>
                <p>No tienes vehículos registrados aún.</p>
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Foto</th>
                            <th>Vehículo</th>
                            <th>Placa</th>
                            <th>Capacidad</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($vehicles as $vehicle)
                        <tr>
                            <td>
                                @if($vehicle->photo_path)
                                    <img src="{{ asset('storage/' . $vehicle->photo_path) }}" class="rounded-circle" width="40" height="40" style="object-fit: cover;">
                                @else
                                    <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center text-white" style="width: 40px; height: 40px;">
                                        <i class="fas fa-car"></i>
                                    </div>
                                @endif
                            </td>
                            <td>
                                <strong>{{ $vehicle->marca }} {{ $vehicle->modelo }}</strong><br>
                                <small class="text-muted">{{ $vehicle->year }} - {{ $vehicle->color }}</small>
                            </td>
                            <td><span class="badge bg-light text-dark border">{{ $vehicle->placa }}</span></td>
                            <td>{{ $vehicle->capacity }} Pasajeros</td>
                            <td>
                                <form action="{{ route('vehicles.destroy', $vehicle) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar este vehículo?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger btn-sm border-0"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
@endsection