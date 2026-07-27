@extends('layouts.app')

@section('title','Dossiers reçus')

@section('content')

<div class="dashboard-page">
<x-back-button />
    <div class="page-header">

        <div>

            <span class="breadcrumb-custom">

                Accueil / CATI / Dossiers reçus

            </span>

            <h2>Dossiers reçus</h2>

            <p>

                Tous les dossiers transmis par l'incubateur.

            </p>

        </div>

    </div>

    <div class="content-card">

        <div class="card-header-custom d-flex justify-content-between align-items-center">

            <h4>

                Liste des dossiers

            </h4>

            <form method="GET" class="d-flex" style="gap:10px;">

                <input
                    type="text"
                    name="search"
                    class="form-control"
                    placeholder="Rechercher un projet ou un étudiant..."
                    value="{{ request('search') }}">

                <button
                    class="btn btn-primary"
                    type="submit">

                    <i class="bi bi-search"></i>

                </button>

            </form>

        </div>

        <div class="table-responsive">

            <table class="table align-middle">

                <thead>

                    <tr>

                        <th>ID</th>

                        <th>Projet</th>

                        <th>Étudiant</th>

                        <th>Domaine</th>

                        <th>Date</th>

                        <th>Statut</th>

                        <th>Action</th>

                    </tr>

                </thead>

                <tbody>

                @forelse($demandes as $demande)

                    <tr>

                        <td>

                            #{{ $demande->id_demande }}

                        </td>

                        <td>

                            <strong>

                                {{ $demande->projet->titre }}

                            </strong>

                        </td>

                        <td>

                            {{ $demande->etudiant->nom }}

                        </td>

                        <td>

                            {{ $demande->projet->domaine_scientifique }}

                        </td>

                        <td>

                            {{ optional($demande->date_creation)->format('d/m/Y') ?? $demande->date_creation }}

                        </td>

                        <td>

                            <span class="badge bg-primary">

                                {{ $demande->statut_actuel }}

                            </span>

                        </td>

                        <td>
                            <a href="{{ route('cati.demande.show',$demande->id_demande) }}"
   class="btn btn-primary btn-sm">

    <i class="bi bi-eye-fill"></i>

    Consulter

</a>

</td>

</tr>

@empty

<tr>

<td colspan="7" class="text-center py-5">

    <i class="bi bi-folder2-open fs-1 text-muted"></i>

    <br><br>

    Aucun dossier reçu.

</td>

</tr>

@endforelse

</tbody>

</table>

</div>

@if(method_exists($demandes,'links'))

<div class="mt-4 d-flex justify-content-center">

    {{ $demandes->links() }}

</div>

@endif

</div>

</div>

@endsection