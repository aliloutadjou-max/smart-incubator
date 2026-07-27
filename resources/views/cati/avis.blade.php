@extends('layouts.app')

@section('title','Avis techniques')

@section('content')

<div class="dashboard-page">
<x-back-button />
    <div class="page-header">

        <div>

            <span class="breadcrumb-custom">

                Accueil / CATI / Avis techniques

            </span>

            <h2>Avis techniques</h2>

            <p>

                Liste des dossiers déjà évalués par le CATI.

            </p>

        </div>

    </div>

    <div class="content-card">

        <div class="card-header-custom d-flex justify-content-between align-items-center">

            <h4>

                Avis enregistrés

            </h4>

            <form method="GET" class="d-flex" style="gap:10px;">

                <input

                    type="text"

                    name="search"

                    value="{{ request('search') }}"

                    class="form-control"

                    placeholder="Rechercher..."

                >

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

                        <th>Statut</th>

                        <th>Date</th>

                        <th>Actions</th>

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

<span class="badge bg-success">

{{ $demande->projet->avis->resultat_evaluation }}

</span>

</td>

<td>

{{ optional($demande->created_at)->format('d/m/Y') }}

</td>

<td>
    <a href="{{ route('cati.demande.show',$demande->id_demande) }}"
   class="btn btn-primary btn-sm">

    <i class="bi bi-eye"></i>

    Consulter

</a>

<a href="{{ route('cati.demande.show',$demande->id_demande) }}"
   class="btn btn-warning btn-sm">

    <i class="bi bi-pencil-square"></i>

    Modifier

</a>

</td>

</tr>

@empty

<tr>

<td colspan="6" class="text-center py-5">

    <i class="bi bi-folder-x fs-1 text-muted"></i>

    <br><br>

    Aucun avis technique disponible.

</td>

</tr>

@endforelse

</tbody>

</table>

</div>

</div>

</div>

@endsection