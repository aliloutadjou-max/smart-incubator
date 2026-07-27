@extends('layouts.app')

@section('content')

<div class="hero-section">

    <div class="hero-left">

        <span class="hero-tag">

            👤 Mon Profil

        </span>

        <h1>

            {{ $etudiant->nom }} {{ $etudiant->prenom }}

        </h1>

        <p>

            Consultez vos informations personnelles enregistrées
            dans la plateforme.

        </p>

    </div>

</div>

<div class="card-modern">

    <h3 class="mb-4">

        Informations personnelles

    </h3>

    <div class="row">

        <div class="col-md-6 mb-4">

            <label class="form-label">

                Nom

            </label>

            <input
                type="text"
                class="form-control"
                value="{{ $etudiant->nom }}"
                readonly>

        </div>

        <div class="col-md-6 mb-4">

            <label class="form-label">

                Prénom

            </label>

            <input
                type="text"
                class="form-control"
                value="{{ $etudiant->prenom }}"
                readonly>

        </div>

        <div class="col-md-6 mb-4">

            <label class="form-label">

                Email

            </label>

            <input
                type="email"
                class="form-control"
                value="{{ $etudiant->email }}"
                readonly>

        </div>

        <div class="col-md-6 mb-4">

            <label class="form-label">

                Téléphone

            </label>

            <input
                type="text"
                class="form-control"
                value="{{ $etudiant->telephone }}"
                readonly>

        </div>

      <div class="col-md-6">

    <label class="form-label">

        Numéro étudiant

    </label>

    <input
        type="text"
        class="form-control"
        value="{{ $etudiant->num_etudiant }}"
        readonly>

</div>

<div class="col-md-6">

    <label class="form-label">

        Faculté / Département

    </label>

    <input
        type="text"
        class="form-control"
        value="{{ $etudiant->faculte_departement }}"
        readonly>

</div>

        

    </div>

</div>

@endsection