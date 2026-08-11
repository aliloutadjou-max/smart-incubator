@extends('layouts.app')

@section('title','Décision finale')

@section('content')

<div class="dashboard-page">
<x-back-button />
    <div class="page-header">

        <div>

            <span class="breadcrumb-custom">

                Accueil / Incubateur / Décision finale

            </span>

            <h2>Décision finale</h2>

            <p>

                Validation finale du dossier après l'avis technique du CATI.

            </p>

        </div>

    </div>

    <div class="content-card">

        <div class="card-header-custom">

            <h4>

                Informations du projet

            </h4>

        </div>

        <div class="row g-4 p-4">

            <div class="col-md-6">

                <div class="info-box">

                    <label>Titre du projet</label>

                    <p>{{ $demande->projet->titre }}</p>

                </div>

            </div>

            <div class="col-md-6">

                <div class="info-box">

                    <label>Étudiant</label>

                    <p>{{ $demande->etudiant->nom }}</p>

                </div>

            </div>

            <div class="col-md-6">

                <div class="info-box">

                    <label>Domaine</label>

                    <p>{{ $demande->projet->domaine_scientifique }}</p>

                </div>

            </div>

            <div class="col-md-6">

                <div class="info-box">

                    <label>Statut actuel</label>

                    @if($demande->statut_actuel=='Accepté')

<span class="badge bg-success">

<i class="bi bi-check-circle-fill"></i>

 Projet accepté

</span>

@elseif($demande->statut_actuel=='Refusé')

<span class="badge bg-danger">

<i class="bi bi-x-circle-fill"></i>

 Projet refusé

</span>

@elseif($demande->statut_actuel=='Envoyé au CATI')

<span class="badge bg-warning text-dark">

<i class="bi bi-hourglass-split"></i>

 En attente CATI

</span>

@else

<span class="badge bg-primary">

{{ $demande->statut_actuel }}

</span>

@endif

                </div>

            </div>

        </div>

    </div>

    <div class="content-card mt-4">

        <div class="card-header-custom">

            <h4>

                Avis technique du CATI

            </h4>

        </div>

        <div class="p-4">

            <div class="alert alert-info">

                <strong>Résultat :</strong>

                @if($avis)
    {{ $avis->resultat_evaluation }}
@else
    <span class="text-danger">Aucun avis technique disponible.</span>
@endif

            </div>

            <div class="mb-4">

                <label class="form-label fw-bold">

                    Recommandation

                </label>

                <div class="border rounded p-3 bg-light">
    @if($avis)
        {{ $avis->recommandation }}
    @else
        <span class="text-danger">Aucune recommandation disponible.</span>
    @endif
</div>

            </div>

            <form method="POST"

                  action="{{ route('decision.store',$demande->id_demande) }}">

                @csrf

                <div class="mb-4">

                    <label class="form-label fw-bold">

                        Décision finale

                    </label>

                    <select

                        name="type_decision"

                        class="form-select">

                        <option value="Accepté">

                            Accepté

                        </option>

                        <option value="Refusé">

                            Refusé

                        </option>

                    </select>

                </div>

                <div class="mb-4">

                    <label class="form-label fw-bold">

                        Commentaire

                    </label>

                    <textarea

                        name="commentaire"

                        rows="5"

                        class="form-control"

                        placeholder="Ajouter un commentaire..."></textarea>

                </div>

                <div class="d-flex justify-content-end gap-2">
                         

                    <button type="submit"
                            class="btn btn-success">

                        <i class="bi bi-check-circle-fill"></i>

                        Enregistrer la décision

                    </button>

                </div>

            </form>

        </div>

    </div>
    

</div>

@endsection

@push('styles')

<style>

.info-box{

    background:#f8fafc;

    border:1px solid #e2e8f0;

    border-radius:14px;

    padding:18px;

    height:100%;

    transition:.25s;

}

.info-box:hover{

    background:#ffffff;

    transform:translateY(-2px);

    box-shadow:0 10px 25px rgba(0,0,0,.06);

}

.info-box label{

    font-size:13px;

    color:#64748b;

    margin-bottom:8px;

    display:block;

    font-weight:600;

}

.info-box p{

    margin:0;

    font-size:16px;

    font-weight:700;

    color:#1e293b;

}

.form-select,

.form-control{

    border-radius:12px;

    padding:12px;

}

.alert-info{

    border-radius:12px;

    border:none;

}

.btn{

    border-radius:12px;

    padding:10px 20px;

    font-weight:600;

}

</style>

@endpush