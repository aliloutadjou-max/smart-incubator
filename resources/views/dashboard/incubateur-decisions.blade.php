@extends('layouts.app')

@section('content')
<x-back-button />
<div class="hero-dashboard">

    <div class="glass-card">

        <div class="section-title d-flex justify-content-between align-items-center">

            <div>

                <h3>Décisions rendues</h3>

                <p>Liste des décisions finales des projets</p>

            </div>

            <span class="status-badge status-success">

                {{ $demandes->total() }} décision(s)

            </span>

        </div>

        <div class="row mt-4 mb-4">

            <div class="col-md-7">

                <input
                    type="text"
                    id="searchDecision"
                    class="form-control"
                    placeholder="Rechercher un projet ou un étudiant...">

            </div>

            <div class="col-md-3">

                <select
                    id="filterDecision"
                    class="form-select">

                    <option value="">Toutes les décisions</option>

                    <option value="Accepté">Accepté</option>

                    <option value="Refusé">Refusé</option>

                </select>

            </div>

        </div>

        <div class="table-responsive">

            <table class="table table-hover align-middle">

                <thead class="table-light">

                    <tr>

                        <th>Projet</th>

                        <th>Étudiant</th>

                        <th>Décision</th>

                        <th>Motif</th>

                        <th>Document</th>

                    </tr>

                </thead>

                <tbody>

                @forelse($demandes as $demande)

                    @php
                        $decision = $demande->projet->avis->decision;
                    @endphp

                    <tr
                        class="decision-row"
                        data-decision="{{ $decision->type_decision }}">

                        <td class="projet">

                            <strong>

                                {{ $demande->projet->titre }}

                            </strong>

                        </td>

                        <td class="etudiant">

                            {{ $demande->etudiant->nom }}

                        </td>

                        <td>

                            @if($decision->type_decision == 'Accepté')

                                <span class="badge bg-success">

                                    Accepté

                                </span>

                            @else

                                <span class="badge bg-danger">

                                    Refusé

                                </span>

                            @endif

                        </td>

                        <td>

                            {{ $decision->commentaire }}

                        </td>

                        <td>

                            <a
                                href="{{ route('document.decision', $demande->projet->id_projet) }}"
                                class="btn btn-sm btn-primary">

                                <i class="bi bi-eye-fill"></i>

                                Voir

                            </a>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="5" class="text-center text-muted py-5">

                            Aucune décision disponible.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

        <div class="mt-4">

            {{ $demandes->links() }}

        </div>

    </div>

</div>

<script>

document.addEventListener('DOMContentLoaded', function () {

    const search = document.getElementById('searchDecision');

    const filter = document.getElementById('filterDecision');

    function filtrer() {

        const texte = search.value.toLowerCase();

        const statut = filter.value;

        document.querySelectorAll('.decision-row').forEach(function(row){

            const projet =
                row.querySelector('.projet').textContent.toLowerCase();

            const etudiant =
                row.querySelector('.etudiant').textContent.toLowerCase();

            const decision =
                row.dataset.decision;

            const okRecherche =
                projet.includes(texte) ||
                etudiant.includes(texte);

            const okDecision =
                statut === '' ||
                decision === statut;

            row.style.display =
                (okRecherche && okDecision)
                ? ''
                : 'none';

        });

    }

    search.addEventListener('keyup', filtrer);

    filter.addEventListener('change', filtrer);

});

</script>

@endsection