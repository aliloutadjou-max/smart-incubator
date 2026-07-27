@extends('layouts.app')

@section('content')

<div class="hero-dashboard">

    <div class="hero-left">

        <span class="hero-badge">
            🚀 Plateforme de Pré-incubation
        </span>

        <h1>
            Bonjour {{ session('user_name') }} 👋
        </h1>

        <p>
            Bienvenue sur votre espace personnel.
            Gérez votre projet, suivez votre demande
            et consultez toutes les étapes de votre
            parcours de pré-incubation.
        </p>

        <div class="hero-buttons">

            <a href="{{ route('projet.create') }}" class="btn-primary-modern">

                <i class="bi bi-plus-circle-fill"></i>

                Nouveau projet

            </a>

            <a href="{{ route('projet.index') }}" class="btn-outline-modern">

                <i class="bi bi-folder2-open"></i>

                Mes projets

            </a>

        </div>

    </div>

    <div class="hero-right">

        <div class="hero-circle">

            <i class="bi bi-lightbulb-fill"></i>

        </div>

    </div>

</div>

<div class="dashboard-grid">

    <div class="glass-card stat-card">

        <div class="stat-icon bg-primary">

            <i class="bi bi-folder-fill"></i>

        </div>

        <div>

            <h2>{{ $projet ? 1 : 0 }}</h2>

            <p>Projet</p>

        </div>

    </div>

    <div class="glass-card stat-card">

        <div class="stat-icon bg-warning">

            <i class="bi bi-send-check-fill"></i>

        </div>

        <div>

            <h2>{{ $demande ? 1 : 0 }}</h2>

            <p>Demande</p>

        </div>

    </div>

    <div class="glass-card stat-card">

        <div class="stat-icon bg-success">

            <i class="bi bi-clipboard-check-fill"></i>

        </div>

        <div>

            <h2>{{ $avis ? 1 : 0 }}</h2>

            <p>Avis CATI</p>

        </div>

    </div>

    <div class="glass-card stat-card">

        <div class="stat-icon bg-danger">

            <i class="bi bi-award-fill"></i>

        </div>

        <div>

            <h2>{{ $decision ? 1 : 0 }}</h2>

            <p>Décision</p>

        </div>

    </div>

</div>
<div class="glass-card readiness-card mt-4">

    <div class="section-title">

        <div>

            <h3>Indice de préparation</h3>

            <p>Préparation de votre projet</p>

        </div>

        @php
            $progress = 0;

            if($projet) $progress = 25;
            if($demande) $progress = 50;
            if($avis) $progress = 75;
            if($decision) $progress = 100;
        @endphp

        <span class="status-badge status-success">

            {{ $progress }}%

        </span>

    </div>

    <div class="progress">

        <div class="progress-bar bg-primary"

             style="width: {{ $progress }}%">

            {{ $progress }}%

        </div>

    </div>

    <div class="mt-4">

        <small class="text-muted">

            Votre parcours progresse progressivement
            jusqu'à la décision finale.

        </small>

    </div>

</div>


<div class="timeline-card glass-card mt-4">

    <div class="section-title">

        <div>

            <h3>

                Parcours de Pré-incubation

            </h3>

            <p>

                Suivi de votre demande

            </p>

        </div>

    </div>

    <div class="timeline">

        <div class="timeline-item {{ $projet ? 'done' : '' }}">

            <div class="timeline-dot"></div>

            <span>Projet créé</span>

        </div>

        <div class="timeline-item {{ $demande ? 'done' : '' }}">

            <div class="timeline-dot"></div>

            <span>Demande envoyée</span>

        </div>

        <div class="timeline-item {{ $avis ? 'done' : '' }}">

            <div class="timeline-dot"></div>

            <span>Évaluation CATI</span>

        </div>

        <div class="timeline-item {{ $decision ? 'done' : '' }}">

            <div class="timeline-dot"></div>

            <span>Décision</span>

        </div>

    </div>

</div>
<div class="glass-card mt-4">

    <div class="section-title">

        <div>

            <h3>

                Actions rapides

            </h3>

            <p>

                Accès direct aux principales fonctionnalités.

            </p>

        </div>

    </div>

    <div class="quick-actions">

        @if($projet)

            <a href="{{ route('projet.index') }}" class="action-card text-decoration-none">

                <i class="bi bi-folder2-open"></i>

                <h5>Mon Projet</h5>

                <p>Consulter votre projet.</p>

            </a>

        @else

            <a href="{{ route('projet.create') }}" class="action-card text-decoration-none">

                <i class="bi bi-plus-circle-fill"></i>

                <h5>Nouveau Projet</h5>

                <p>Créer un nouveau projet.</p>

            </a>

        @endif

        <a href="{{ route('demandes.index') }}" class="action-card text-decoration-none">

            <i class="bi bi-send-check-fill"></i>

            <h5>Ma Demande</h5>

            <p>Suivre votre demande.</p>

        </a>

           <a href="#" class="action-card text-decoration-none"
               data-bs-toggle="modal"
               data-bs-target="#documentsModal">

                 <i class="bi bi-folder2-open"></i>

                     <h5>Mes documents</h5>

                 <p>Consulter vos documents officiels.</p>

            </a>
    </div>

</div>
<!-- Modal Documents -->

<div class="modal fade"
     id="documentsModal"
     tabindex="-1">

    <div class="modal-dialog modal-lg modal-dialog-centered">

        <div class="modal-content border-0 rounded-4 shadow-lg">

            <div class="modal-header">

                <h4 class="fw-bold">

                    📂 Mes documents

                </h4>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                </button>

            </div>

            <div class="modal-body">

                <div class="row g-4">

                    <!-- Avis -->

                    <div class="col-md-4">

                        <div class="document-card">

                            <i class="bi bi-file-earmark-pdf-fill"></i>

                            <h5>Avis Technique CATI</h5>

                            <small>Évaluation officielle</small>

                            <div class="mt-3">

                                <a target="_blank"
                                   href="{{ route('documents.avis',$projet->id_projet) }}"
                                   class="btn btn-sm btn-outline-primary">

                                    👁 Voir

                                </a>

                            </div>

                        </div>

                    </div>

                    <!-- Décision -->

                    <div class="col-md-4">

                        <div class="document-card">

                            <i class="bi bi-file-earmark-text-fill"></i>

                            <h5>Décision d'Incubation</h5>

                            <small>Décision officielle</small>
                                <a href="{{ route('documents.decision', $projet->id_projet) }}"
                                     target="_blank"
   class="btn btn-outline-primary w-100">

   

    Voir

</a>
                        </div>

                    </div>

                    <!-- Attestation -->

                    <div class="col-md-4">

                        <div class="document-card">

                            <i class="bi bi-award-fill"></i>

                            <h5>Attestation d'Admission</h5>

                            <small>Document officiel</small>
                            <a href="{{ route('documents.attestation', $projet->id_projet) }}"
   target="_blank"
   class="btn btn-outline-primary w-100">

  

    Voir

</a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>
@endsection