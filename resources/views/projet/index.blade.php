@extends('layouts.app')

@section('content')

<div class="container mt-5">

    <h2 class="mb-4">
        Mes Projets
    </h2>

    @if($projets->count() > 0)

        @foreach($projets as $projet)

            <div class="card mb-4 shadow-sm">

                <div class="card-body">

                    <h4>{{ $projet->titre }}</h4>

                    <p>
                        {{ $projet->description }}
                    </p>

                    <p>
                        <strong>Domaine :</strong>
                        {{ $projet->domaine_scientifique }}
                    </p>

                    <p>
                        <strong>Statut :</strong>

                        <span class="badge bg-warning text-dark">
                            {{ $projet->statut_projet }}
                        </span>
                    </p>

                    <a href="#" class="btn btn-primary">
                        Modifier
                    </a>

                    <form action="{{ route('demande.envoyer', $projet->id_projet) }}" method="POST" class="d-inline">
    @csrf

                                <button type="submit" class="btn btn-success">
                                 Envoyer la demande
                                </button>
                                  </form>

                </div>
                <form action="{{ route('projet.destroy', $projet->id_projet) }}"
      method="POST"
      style="display:inline;"
      onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce projet ?');">

    @csrf
    @method('DELETE')

    <button type="submit" class="btn btn-danger btn-sm">
        <i class="bi bi-trash"></i>
        Supprimer
    </button>

</form>

            </div>

        @endforeach

    @else

        <div class="alert alert-info">

            Vous n'avez encore créé aucun projet.

        </div>

    @endif

</div>

@endsection