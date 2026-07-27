@extends('layouts.app')

@section('title','Toutes les demandes')

@section('content')

<div class="container-fluid py-4">

<div class="d-flex justify-content-between align-items-center mb-4">

<div>

<h2 class="fw-bold text-primary mb-1">

<i class="bi bi-folder2-open"></i>

Toutes les demandes

</h2>

<p class="text-muted mb-0">

Gestion complète des dossiers d'incubation

</p>

</div>

</div>

<div class="card shadow-sm border-0 rounded-4 mb-4">

<div class="card-body">

<div class="row g-3">

<div class="col-lg-8">

<form action="{{ route('incubateur.demandes') }}" method="GET">

<div class="input-group">

<input

type="text"

class="form-control"

name="search"

value="{{ request('search') }}"

placeholder="Rechercher un étudiant ou un projet...">

<button class="btn btn-primary">

<i class="bi bi-search"></i>

</button>

</div>

</form>

</div>

<div class="col-lg-4">

<form action="{{ route('incubateur.demandes') }}" method="GET">

<select

name="statut"

class="form-select"

onchange="this.form.submit()">

<option value="">Tous les statuts</option>

<option value="En attente"

{{ request('statut')=='En attente'?'selected':'' }}>

En attente

</option>

<option value="Envoyé au CATI"

{{ request('statut')=='Envoyé au CATI'?'selected':'' }}>

Envoyé au CATI

</option>




<option value="Accepté"
{{ request('statut')=='Accepté' ? 'selected' : '' }}>

Accepté

</option>

<option value="Refusé"
{{ request('statut')=='Refusé' ? 'selected' : '' }}>

Refusé

</option>

</select>

</form>

</div>

</div>

</div>

</div>

<div class="card border-0 shadow rounded-4">

<div class="card-body p-0">

<div class="table-responsive">

<table class="table table-hover align-middle mb-0">

<thead class="table-light">

<tr>

<th>#</th>

<th>Étudiant</th>

<th>Projet</th>

<th>Date</th>

<th>Statut</th>

<th class="text-end">Actions</th>

</tr>

</thead>

<tbody>

@forelse($demandes as $demande)

<tr>

<td>

{{ $demande->id_demande }}

</td>

<td>

<div class="fw-semibold">

{{ $demande->etudiant->nom }}

</div>

</td>

<td>

{{ $demande->projet->titre }}

</td>

<td>

{{ $demande->date_creation }}

</td>

<td>

@if($demande->statut_actuel=='En attente')

<span class="badge bg-warning text-dark">

En attente

</span>

@elseif($demande->statut_actuel=='Envoyé au CATI')

<span class="badge bg-info">

CATI

</span>

@elseif($demande->statut_actuel=='Accepté')

<span class="badge bg-success">

Accepté

</span>

@elseif($demande->statut_actuel=='Refusé')

<span class="badge bg-danger">

Refusé

</span>

@else

<span class="badge bg-secondary">

{{ $demande->statut_actuel }}

</span>

@endif

</td>

<td class="text-end">
  @if(in_array($demande->statut_actuel,['Accepté','Refusé']))

<a href="{{ route('incubateur.decision',$demande->id_demande) }}"
class="btn btn-sm btn-outline-secondary">

<i class="bi bi-eye"></i>

Voir décision

</a>

@elseif($demande->projet && $demande->projet->avis)

<a href="{{ route('incubateur.decision',$demande->id_demande) }}"
class="btn btn-sm btn-success">

<i class="bi bi-check2-square"></i>

Décision

</a>

@else

<a href="{{ route('incubateur.demande.show',$demande->id_demande) }}"
class="btn btn-sm btn-outline-primary">

<i class="bi bi-eye-fill"></i>

Consulter

</a>

@endif
</td>

</tr>

@empty

<tr>

<td colspan="6" class="text-center py-5 text-muted">

<i class="bi bi-folder-x fs-1 d-block mb-3"></i>

Aucune demande trouvée.

</td>

</tr>

@endforelse

</tbody>

</table>

</div>

</div>

</div>

@if(method_exists($demandes,'links'))

<div class="mt-4 d-flex justify-content-center">

{{ $demandes->links() }}

</div>

@endif

</div>

<style>
/* ===== Pagination Modern ===== */

.pagination{

display:flex;

justify-content:center;

gap:10px;

margin-top:20px;

}

.pagination .page-item{

list-style:none;

}

.pagination .page-link{

border:none;

background:#eef4ff;

color:#2563eb;

padding:10px 18px;

border-radius:12px;

font-weight:600;

transition:.25s;

box-shadow:0 5px 15px rgba(0,0,0,.05);

}

.pagination .page-link:hover{

background:#2563eb;

color:white;

transform:translateY(-2px);

}

.pagination .active .page-link{

background:#2563eb;

color:#fff;

box-shadow:0 8px 20px rgba(37,99,235,.35);

}

.pagination .disabled .page-link{

background:#f3f4f6;

color:#9ca3af;

}
.small.text-muted{

font-size:14px;

margin-top:10px;

color:#6b7280!important;

font-weight:500;

}
.table{

font-size:15px;

}

.table thead th{

font-weight:700;

color:#1e3a8a;

padding:18px;

border-bottom:2px solid #eef2f7;

}

.table tbody td{

padding:18px;

}

.table tbody tr{

transition:.25s;

}

.table tbody tr:hover{

background:#f8fbff;

transform:scale(1.002);

}

.badge{

font-size:13px;

padding:8px 14px;

border-radius:30px;

font-weight:600;

}

.card{

border-radius:20px!important;

}
.input-group .form-control{

height:52px;

font-size:15px;

padding-left:18px;

}

border-radius:12px 0 0 12px;

}

.input-group .btn{

border-radius:0 12px 12px 0;

}

.form-select{

height:48px;

border-radius:12px;

}

.btn{

border-radius:10px;

padding:8px 14px;

font-weight:600;

transition:.2s;

}

.btn:hover{

transform:translateY(-2px);

box-shadow:0 8px 20px rgba(0,0,0,.08);

}

.table-responsive{

padding:10px;

}

</style>

@endsection