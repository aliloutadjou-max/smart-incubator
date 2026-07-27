@extends('layouts.app')

@section('content')

<div class="hero-section">

    <div class="hero-left">

        <span class="hero-tag">

            📄 Mes demandes

        </span>

        <h1>

            Suivi de ma demande

        </h1>

        <p>

            Consultez l'état de votre demande d'incubation et suivez
            toutes les étapes de validation.

        </p>

    </div>

</div>

@if($demande)

<div class="card-modern">

    <h3 class="mb-4">

        Informations de la demande

    </h3>

    <div class="row">

        <div class="col-md-6 mb-3">

            <strong>Projet</strong>

            <p>

                {{ $projet->titre }}

            </p>

        </div>

        <div class="col-md-6 mb-3">

            <strong>Statut</strong>

            <p>

                {{ $demande->statut_actuel }}

            </p>

        </div>

    </div>

</div>

@else

<div class="card-modern text-center py-5">

    <i class="bi bi-inbox display-1 text-primary"></i>

    <h3 class="mt-4">

        Aucune demande

    </h3>

    <p class="text-muted">

        Vous n'avez pas encore envoyé une demande d'incubation.

    </p>

    @if($projet)

    <form action="{{ route('demande.envoyer',$projet->id_projet) }}" method="POST">

        @csrf

        <button class="btn-modern">

            <i class="bi bi-send-fill"></i>

            Envoyer la demande

        </button>

    </form>

    @endif

</div>

@endif

@endsection