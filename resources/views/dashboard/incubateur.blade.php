@extends('layouts.app')

@section('title', 'Tableau de bord | Smart Incubator')

@section('content')
<div class="platform-indicators">

    <div class="indicator-card">

        <i class="bi bi-building"></i>

        <h3>Incubateur</h3>

        <span>Gestion des demandes</span>

    </div>

    <div class="indicator-card">

        <i class="bi bi-people-fill"></i>

        <h3>Étudiants</h3>

        <span>Porteurs de projets</span>

    </div>

    <div class="indicator-card">

        <i class="bi bi-cpu-fill"></i>

        <h3>CATI</h3>

        <span>Évaluation technique</span>

    </div>

    <div class="indicator-card">

        <i class="bi bi-patch-check-fill"></i>

        <h3>Décision</h3>

        <span>Validation finale</span>

    </div>

</div>
<div class="page-header">

    <div>

        <h2>Tableau de bord</h2>

        <small>Accueil / Responsable Incubateur</small>

    </div>

    <div class="page-tools">

        <span class="today-date">

            <i class="bi bi-calendar-event"></i>

            {{ now()->format('d/m/Y') }}

        </span>

    </div>

</div>
<div class="hero-section">

    <div class="hero-content">

        <span class="hero-badge">

            <i class="bi bi-buildings-fill"></i>

            Smart Incubator

        </span>

        <h1>

            Bonjour, {{ session('user_name') }}

        </h1>

        <p>

            Gérez les demandes de pré-incubation, analysez les dossiers,
            suivez leur évolution et transmettez les projets vers le CATI
            pour l'évaluation technique.

        </p>

        <div class="hero-stats">

            <div class="hero-stat">

                <strong>{{ $stats['total'] }}</strong>

                <span>Demandes</span>

            </div>

            <div class="hero-stat">

                <strong>{{ $stats['en_verification'] }}</strong>

                <span>En vérification</span>

            </div>

            <div class="hero-stat">

                <strong>{{ $stats['chez_cati'] }}</strong>

                <span>CATI</span>

            </div>

        </div>

    </div>

    <div class="hero-illustration">

        <i class="bi bi-building-check"></i>

    </div>

</div>
<div class="stats-grid">

    <div class="stat-card">

        <div class="stat-icon">

            <i class="bi bi-folder-fill"></i>

        </div>

        <div class="stat-info">

            <h3>{{ $stats['total'] }}</h3>

            <span>Total des demandes</span>

        </div>

    </div>

    <div class="stat-card">

        <div class="stat-icon">

            <i class="bi bi-search"></i>

        </div>

        <div class="stat-info">

            <h3>{{ $stats['en_verification'] }}</h3>

            <span>En vérification</span>

        </div>

    </div>

    <div class="stat-card">

        <div class="stat-icon">

            <i class="bi bi-cpu-fill"></i>

        </div>

        <div class="stat-info">

            <h3>{{ $stats['chez_cati'] }}</h3>

            <span>Envoyées au CATI</span>

        </div>

    </div>

    <div class="stat-card">

        <div class="stat-icon">

            <i class="bi bi-check-circle-fill"></i>

        </div>

        <div class="stat-info">

            <h3>{{ $stats['acceptees'] }}</h3>

            <span>Acceptées</span>

        </div>

    </div>

    <div class="stat-card">

        <div class="stat-icon">

            <i class="bi bi-x-circle-fill"></i>

        </div>

        <div class="stat-info">

            <h3>{{ $stats['refusees'] }}</h3>

            <span>Refusées</span>

        </div>

    </div>

</div>
<div class="glass-card mt-4">

    <div class="section-title">

        <div>

            <h3>Assistant Intelligent</h3>

            <p>Analyse automatique de la plateforme</p>

        </div>

    </div>

    <div class="assistant-box">

        <div class="assistant-icon">

            <i class="bi bi-robot"></i>

        </div>

        <div class="assistant-text">

            <h5>Analyse du jour</h5>

            <p>

                {{ $messageAssistant }}

            </p>

        </div>

    </div>

</div>

<div class="glass-card mt-4">

    <div class="section-title">

        <div>

            <h3>Demandes de pré-incubation</h3>

            <p>Liste des projets reçus</p>

        </div>

    </div>

    <div class="table-responsive">

        <table class="table dashboard-table align-middle">

            <thead>

                <tr>

                    <th>#</th>

                    <th>Étudiant</th>

                    <th>Projet</th>

                    <th>Date</th>

                    <th>Statut</th>

                    <th>Action</th>

                </tr>

            </thead>

            <tbody>

            @forelse($demandes as $demande)

                <tr>

                    <td>{{ $demande->id_demande }}</td>

                    <td>

                        {{ optional($demande->etudiant)->nom ?? '--' }}

                    </td>

                    <td>

                        {{ optional($demande->projet)->titre ?? '--' }}

                    </td>

                    <td>

                        {{ $demande->date_creation }}

                    </td>

                    <td>

                        <span class="status-badge">

                            {{ $demande->statut_actuel }}

                        </span>

                    </td>

<td>

    <a href="{{ route('incubateur.demande.show', $demande->id_demande) }}"
       class="btn-table">

        <i class="bi bi-eye-fill"></i>

        Consulter

    </a>

</td>
                </tr>

            @empty

                <tr>

                    <td colspan="6" class="text-center py-5">

                        Aucune demande disponible.

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>
<div class="glass-card mt-4">

    <div class="section-title">

        <div>

            <h3>Actions rapides</h3>

            <p>Accès direct aux fonctionnalités principales</p>

        </div>

    </div>

    <div class="quick-actions">

      <a href="{{ route('incubateur.demandes') }}" class="action-card">

            <i class="bi bi-list-check"></i>

            <h5>Toutes les demandes</h5>

            <p>Consulter toutes les demandes.</p>

        </a>

       <a href="#" class="action-card">

    <i class="bi bi-search"></i>

    <h5>Recherche</h5>

    <p>Rechercher un dossier.</p>

</a>

<a href="{{ route('incubateur.decisions') }}" class="action-card">

    <i class="bi bi-file-earmark-check-fill"></i>

    <h5>Décisions</h5>

    <p>Consulter les décisions.</p>

</a>

    </div>
<!-- Modal Décisions -->

<div class="modal fade" id="decisionModal" tabindex="-1">

<div class="modal-dialog modal-xl">

<div class="modal-content">

<div class="modal-header">

<h5 class="modal-title">
Décisions rendues
</h5>

<button class="btn-close"
data-bs-dismiss="modal"></button>

</div>

<div class="modal-body">

<table class="table table-hover">

<thead>

<tr>

<th>Projet</th>

<th>Décision</th>

<th>Motif</th>

<th></th>

</tr>

</thead>

<tbody>

@foreach($demandes as $demande)

@if($demande->projet && $demande->projet->avis && $demande->projet->avis->decision)

<tr>

<td>

{{ $demande->projet->titre }}

</td>

<td>

<span class="badge bg-{{ $demande->projet->avis->decision->type_decision=='Accepté' ? 'success':'danger' }}">

{{ $demande->projet->avis->decision->type_decision }}

</span>

</td>

<td>

{{ $demande->projet->avis->decision->commentaire }}

</td>

<td>

<a href="{{ route('documents.decision',$demande->projet->id_projet) }}"
target="_blank"
class="btn btn-sm btn-primary">

Voir

</a>

</td>

</tr>

@endif

@endforeach

</tbody>

</table>

</div>

</div>

</div>

</div>
</div>

<div class="glass-card mt-4">

    <div class="section-title">

        <div>

            <h3>Workflow</h3>

            <p>Cycle de traitement des projets</p>

        </div>

    </div>

    <div class="workflow">

        <div class="workflow-step completed">

            <i class="bi bi-person-fill"></i>

            <h5>Étudiant</h5>

            <span>Projet envoyé</span>

        </div>

        <div class="workflow-line"></div>

        <div class="workflow-step active">

            <i class="bi bi-building"></i>

            <h5>Incubateur</h5>

            <span>Analyse</span>

        </div>

        <div class="workflow-line"></div>

        <div class="workflow-step">

            <i class="bi bi-cpu-fill"></i>

            <h5>CATI</h5>

            <span>Évaluation</span>

        </div>

        <div class="workflow-line"></div>

        <div class="workflow-step">

            <i class="bi bi-patch-check-fill"></i>

            <h5>Décision</h5>

            <span>Validation</span>

        </div>

    </div>

</div>
@endsection