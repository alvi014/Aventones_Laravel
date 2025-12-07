@extends('layouts.app')
@section('title', 'Buscar Viajes')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary fw-bold"><i class="fas fa-search-location me-2"></i>Próximos Viajes Disponibles</h2>
    </div>

    @if($rides->isEmpty())
        <div class="alert alert-info text-center">
            <i class="fas fa-info-circle fa-2x mb-3 d-block"></i>
            No hay viajes programados próximamente. ¡Vuelve más tarde!
        </div>
    @else
        <div class="row">
            @foreach($rides as $ride)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 shadow-sm border-0 hover-card">
                        <div class="card-header bg-white border-0 pt-4 pb-0">
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="badge bg-primary rounded-pill px-3">₡ {{ number_format($ride->cost) }}</span>
                                <small class="text-muted"><i class="far fa-clock me-1"></i> {{ \Carbon\Carbon::parse($ride->departure_time)->format('d M, h:i A') }}</small>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-bold text-dark mb-3">{{ $ride->origin }} <i class="fas fa-arrow-right text-muted mx-2 small"></i> {{ $ride->destination }}</h5>
                            
                            <div class="d-flex align-items-center mb-3">
                                <div class="bg-light rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 40px; height: 40px;">
                                    <i class="fas fa-user text-secondary"></i>
                                </div>
                                <div>
                                    <small class="d-block text-muted" style="line-height: 1;">Chofer</small>
                                    <span class="fw-bold small">{{ $ride->user->name }} {{ $ride->user->lastname }}</span>
                                </div>
                            </div>

                            <div class="p-3 bg-light rounded mb-3">
                                <div class="d-flex justify-content-between mb-1">
                                    <small class="text-muted"><i class="fas fa-car me-1"></i> Vehículo</small>
                                    <small class="fw-bold">{{ $ride->vehicle->marca }} {{ $ride->vehicle->modelo }}</small>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <small class="text-muted"><i class="fas fa-chair me-1"></i> Asientos</small>
                                    <small class="fw-bold {{ $ride->seats_available > 0 ? 'text-success' : 'text-danger' }}">
                                        {{ $ride->seats_available }} Disponibles
                                    </small>
                                </div>
                            </div>

                            <div class="d-grid">
                                @if(Auth::user()->role == 'pasajero')
                                    <button class="btn btn-success fw-bold" disabled>
                                        <i class="fas fa-ticket-alt me-2"></i> Reservar (Pronto)
                                    </button>
                                @elseif(Auth::id() == $ride->user_id)
                                    <button class="btn btn-secondary" disabled>Es tu viaje</button>
                                @else
                                    <button class="btn btn-outline-primary" disabled>Solo pasajeros</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection