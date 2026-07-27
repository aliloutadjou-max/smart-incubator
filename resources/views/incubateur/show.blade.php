<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détails du projet</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header">

            <h3><i class="bi bi-folder2-open"></i> Détails du projet</h3>

<p class="mb-0 mt-2 text-white-50">
Consultez les informations complètes avant l'envoi au CATI.
</p>

        </div>

        <div class="card-body">

    <p><strong>Titre :</strong> {{ $demande->projet->titre }}</p>

            <p><strong>Description :</strong> {{ $demande->projet->description }}</p>

            <p><strong>Domaine :</strong> {{ $demande->projet->domaine_scientifique }}</p>

            <p><strong>Objectifs :</strong> {{ $demande->projet->objectifs }}</p>

            <p><strong>Innovation :</strong> {{ $demande->projet->degre_innovation }}</p>

            <p>
<strong>Statut :</strong>

@if($demande->statut_actuel=='Accepté')

<span class="badge bg-success">{{ $demande->statut_actuel }}</span>

@elseif($demande->statut_actuel=='Refusé')

<span class="badge bg-danger">{{ $demande->statut_actuel }}</span>

@elseif($demande->statut_actuel=='Envoyé au CATI')

<span class="badge bg-warning text-dark">{{ $demande->statut_actuel }}</span>

@else

<span class="badge bg-primary">{{ $demande->statut_actuel }}</span>

@endif

</p>

            <hr>
<hr class="my-4">
<div class="d-flex justify-content-end gap-2 mt-4">

@if($demande->statut_actuel != 'Envoyé au CATI' && !$demande->projet->avis)

<form action="{{ route('incubateur.demande.envoyerCati',$demande->id_demande) }}" method="POST">

@csrf

<button type="submit" class="btn btn-warning">

<i class="bi bi-send-fill"></i>

Envoyer au CATI

</button>

</form>

@endif
<a href="javascript:history.back()" class="btn btn-outline-secondary mb-3">

<i class="bi bi-arrow-left"></i>

Retour

</a>

</div>

</div>
<style>

body{
    background:#f4f7fb;
}

.card{
    border:none;
    border-radius:18px;
    overflow:hidden;
    box-shadow:0 15px 35px rgba(0,0,0,.08);
}

.card-header{
    background:linear-gradient(135deg,#2563eb,#1d4ed8);
    color:white;
    padding:20px;
}

.card-body p{
    background:white;
    padding:15px;
    border-radius:12px;
    border-left:5px solid #2563eb;
    margin-bottom:15px;
    box-shadow:0 3px 8px rgba(0,0,0,.05);
}

.btn{
    border-radius:12px;
    padding:10px 18px;
    font-weight:600;
}

.btn-warning{
    margin-right:10px;
}
@if(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif
</style>
</body>
</html>