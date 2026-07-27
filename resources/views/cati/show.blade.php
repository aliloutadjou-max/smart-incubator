@extends('layouts.app')

@section('title','Analyse CATI')

@section('content')

<div class="dashboard-page">
<x-back-button />
    <div class="page-header">

        <div>

            <span class="breadcrumb-custom">

                Accueil / CATI / Analyse

            </span>

            <h2>Analyse technique du projet</h2>

            <p>

                Consultez le dossier puis rédigez votre avis technique.

            </p>

        </div>

        <a href="{{ route('dashboard.cati') }}"
           class="btn btn-outline-secondary">

            <i class="bi bi-arrow-left"></i>

            Retour

        </a>

    </div>


    <div class="content-card">

        <div class="card-header-custom">

            <div>

                <h4>{{ $demande->projet->titre }}</h4>

                <span class="badge bg-primary">

                    {{ $demande->statut_actuel }}

                </span>

            </div>

        </div>

        <div class="card-body-custom">

            <div class="row">

   <div class="row g-4 mb-4">

    <div class="col-md-3">
        <div class="mini-info-card">
            <i class="bi bi-book-half"></i>
            <span>Domaine</span>
            <strong>{{ $demande->projet->domaine_scientifique }}</strong>
        </div>
    </div>

    <div class="col-md-3">
        <div class="mini-info-card">
            <i class="bi bi-lightbulb-fill"></i>
            <span>Innovation</span>
            <strong>{{ $demande->projet->degre_innovation }}</strong>
        </div>
    </div>

    <div class="col-md-3">
        <div class="mini-info-card">
            <i class="bi bi-person-fill"></i>
            <span>Étudiant</span>
            <strong>{{ $demande->etudiant->nom }}</strong>
        </div>
    </div>

    <div class="col-md-3">
        <div class="mini-info-card">
            <i class="bi bi-calendar-event-fill"></i>
            <span>Date</span>
            <strong>{{ optional($demande->created_at)->format('d/m/Y') ?? '-' }}</strong>
        </div>
    </div>

</div>

<div class="content-card mb-4">

    <div class="card-header-custom">

        <h4>
            <i class="bi bi-file-earmark-text-fill"></i>
            Description du projet
        </h4>

    </div>

    <div class="info-box">

        {{ $demande->projet->description }}

    </div>

</div>

<div class="content-card mb-4">

    <div class="card-header-custom">

        <h4>
            <i class="bi bi-bullseye"></i>
            Objectifs
        </h4>

    </div>

    <div class="info-box">

        {{ $demande->projet->objectifs }}

    </div>

</div>

    </div>


    <div class="content-card mt-4">

        <div class="card-header-custom">

            <h4>

                Avis technique

            </h4>

        </div>

        <div class="card-body-custom">

            <form action="{{ route('cati.avis', $demande->id_demande) }}" method="POST">

                @csrf

                <div class="mb-4">

                    <label class="form-label fw-bold">

                        Résultat d'évaluation

                    </label>

                    <select
                        name="resultat_evaluation"
                        class="form-select"
                        required>

                        <option value="">Sélectionner...</option>

                        <option value="Favorable">

                            Favorable

                        </option>

                        <option value="Défavorable">

                            Défavorable

                        </option>

                    </select>

                </div>

                <div class="mb-4">

                    <label class="form-label fw-bold">

                        Recommandation technique

                    </label>

                    <textarea

                        name="recommandation"

                        rows="7"

                        class="form-control"

                        placeholder="Rédiger votre avis technique..."

                        required

                    ></textarea>

                </div>

                <div class="d-flex justify-content-end gap-3">

                    <a href="{{ route('dashboard.cati') }}"

                       class="btn btn-outline-secondary">

                        Annuler

                    </a>

                    <button

                        type="submit"

                        class="btn btn-success">

                        <i class="bi bi-check-circle-fill"></i>

                        Enregistrer l'avis

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection