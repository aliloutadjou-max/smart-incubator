@extends('layouts.app')

@section('title','Statistiques')

@section('content')

<div class="container-fluid py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold">Statistiques</h2>

            <p class="text-muted">
                Vue globale des demandes d'incubation
            </p>

        </div>

    </div>

    <div class="row g-4">

        <div class="col-lg-3 col-md-6">
            <div class="stat-card stat-total">
                <i class="bi bi-folder2-open"></i>
                <h3>{{ $stats['total'] }}</h3>
                <p>Total demandes</p>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="stat-card stat-pending">
                <i class="bi bi-hourglass-split"></i>
                <h3>{{ $stats['attente'] }}</h3>
                <p>En attente</p>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="stat-card stat-cati">
                <i class="bi bi-send-check-fill"></i>
                <h3>{{ $stats['cati'] }}</h3>
                <p>Envoyées au CATI</p>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="stat-card stat-success">
                <i class="bi bi-check-circle-fill"></i>
                <h3>{{ $stats['accepte'] }}</h3>
                <p>Acceptées</p>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="stat-card">
                <i class="bi bi-x-circle-fill text-danger"></i>
                <h3>{{ $stats['refuse'] }}</h3>
                <p>Refusées</p>
            </div>
        </div>

    </div>

</div>

@endsection