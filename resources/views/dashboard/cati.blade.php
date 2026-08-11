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

            Bienvenue sur votre espace d'analyse technique des projets.
        </p>

        <div class="hero-stats">

            <div class="hero-stat">

               <strong>{{ $demandes->count() }}</strong>
<span>Dossiers reçus</span>

            </div>

            <div class="hero-stat">

              <strong>{{ $demandes->whereNull('avisTechnique')->count() }}</strong>
<span>En attente</span>


            </div>

            <div class="hero-stat">

             <strong>{{ $demandes->whereNotNull('avisTechnique')->count() }}</strong>
<span>Avis réalisés</span>

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


<h3>{{ $demandes->count() }}</h3>

<span>Dossiers reçus</span>

        </div>

    </div>

    <div class="stat-card">

        <div class="stat-icon">

            <i class="bi bi-hourglass-split"></i>

        </div>

        <div class="stat-info">

            

<h3>{{ $demandes->whereNull('avisTechnique')->count() }}</h3>

<span>En attente d'avis</span>

        </div>

    </div>

    <div class="stat-card">

        <div class="stat-icon">

              <i class="bi bi-check-circle-fill"></i>

        </div>

        <div class="stat-info">

    

<h3>{{ $demandes->whereNotNull('avisTechnique')->count() }}</h3>

<span>Avis réalisés</span>

        </div>

    </div>

</div>
<div class="glass-card mt-4">

    <div class="section-title">

        <div>

            <h3>Dossiers reçus</h3>

            <p>Liste des projets reçus</p>

        </div>

    </div>

    <div class="table-responsive">

        <table class="table dashboard-table align-middle">

            <thead>

                <tr>

                    <th>id</th>

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

    <a href="{{ route('cati.demande.show', $demande->id_demande) }}"
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

   <div class="actions-grid">

<a href="#" class="action-card">
    <i class="bi bi-folder2-open"></i>
    <h4>Dossiers reçus</h4>
    <p>Consulter toutes les demandes.</p>
</a>

<a href="#" class="action-card">
    <i class="bi bi-search"></i>
    <h4>Recherche</h4>
    <p>Rechercher un dossier.</p>
</a>

<a href="#" class="action-card">
    <i class="bi bi-download"></i>
    <h4>Exporter</h4>
    <p>Exporter les données.</p>
</a>

</div>

</div>



@endsection