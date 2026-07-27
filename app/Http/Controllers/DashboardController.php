<?php

namespace App\Http\Controllers;
use App\Models\Decision;
use App\Models\AvisTechnique;
use App\Models\Projet;
use Illuminate\Http\Request;
use App\Models\DemandeIncubation;
class DashboardController extends Controller

{
   public function decisionForm($id)
{
    $demande = DemandeIncubation::with('projet')->findOrFail($id);

    $avis = AvisTechnique::where('id_projet', $demande->id_projet)->first();

    if (!$avis) {
        return redirect()->back()->with(
            'error',
            'Aucun avis technique disponible pour cette demande.'
        );
    }

    return view('incubateur.decision', compact('demande', 'avis'));
}
    public function etudiant()
{
    $projet = Projet::where('id_etudiant', session('user_id'))->first();

    $demande = null;
    $avis = null;
    $decision = null;

    if ($projet) {

        $demande = DemandeIncubation::where('id_projet', $projet->id_projet)->first();

        $avis = AvisTechnique::where('id_projet', $projet->id_projet)->first();

        if ($avis) {

            $decision = Decision::where('id_avis', $avis->id_avis)->first();

        }

    }

    return view('dashboard.etudiant', compact(
        'projet',
        'demande',
        'avis',
        'decision'
    ));
}
public function incubateur()
{
    $demandes = DemandeIncubation::with([
    'etudiant',
    'projet',
    'projet.avis',
    'projet.avis.decision'
])
->latest('date_creation')
->take(10)
->get();

    $stats = [
    'total' => $demandes->count(),

    'en_attente' => $demandes->where('statut_actuel', 'En attente')->count(),

    'en_verification' => $demandes->where('statut_actuel', 'En vérification')->count(),

    'chez_cati' => $demandes->where('statut_actuel', 'Envoyé au CATI')->count(),

    'acceptees' => $demandes->where('statut_actuel', 'Accepté')->count(),

    'refusees' => $demandes->where('statut_actuel', 'Refusé')->count(),
];
$messageAssistant = null;

if ($stats['en_attente'] > 0) {

    $messageAssistant = "Il y a {$stats['en_attente']} demande(s) en attente de vérification.";

} elseif ($stats['chez_cati'] > 0) {

    $messageAssistant = "{$stats['chez_cati']} demande(s) sont actuellement chez le CATI.";

} elseif ($stats['total'] == 0) {

    $messageAssistant = "Aucune demande n'a été enregistrée pour le moment.";

} else {

    $messageAssistant = "Toutes les demandes sont traitées.";
}
  return view(
    'dashboard.incubateur',
    compact('demandes', 'stats', 'messageAssistant')
);
}
public function decisions()
{
    $demandes = DemandeIncubation::with([
        'etudiant',
        'projet.avis.decision'
    ])
    ->whereHas('projet.avis.decision')
    ->latest('id_demande')
    ->paginate(10);

    return view(
        'dashboard.incubateur-decisions',
        compact('demandes')
    );
}
public function demandes(Request $request)
{$query = DemandeIncubation::with([
    'etudiant',
    'projet',
    'projet.avis',
    'projet.avis.decision'
]);

    // البحث
    if ($request->filled('search')) {

    $search = $request->search;

    $query->where(function ($q) use ($search) {

        $q->whereHas('projet', function ($qq) use ($search) {

            $qq->where('titre', 'like', "%{$search}%");

        })->orWhereHas('etudiant', function ($qq) use ($search) {

            $qq->where('nom', 'like', "%{$search}%");

        });

    });

}

    // الفلترة
    if ($request->filled('statut')) {
if ($request->statut == 'avis_disponible') {

    $query->whereHas('projet.avis');

}
        $query->where('statut_actuel', $request->statut);

    }

    $demandes = $query
        ->latest('id_demande')
        ->paginate(10)
        ->withQueryString();
$stats = [
    'total' => DemandeIncubation::count(),

    'en_attente' => DemandeIncubation::where(
        'statut_actuel',
        'En attente'
    )->count(),

    'chez_cati' => DemandeIncubation::where(
        'statut_actuel',
        'Envoyé au CATI'
    )->count(),

    'acceptees' => DemandeIncubation::where(
        'statut_actuel',
        'Accepté'
    )->count(),
];
    return view(
    'dashboard.incubateur-demandes',
    compact('demandes', 'stats')
);

}
public function cati()
{
    $demandes = DemandeIncubation::with('projet')
        ->where('statut_actuel', 'Envoyé au CATI')
        ->latest('id_demande')
        ->get();

    return view('dashboard.cati', compact('demandes'));
}
public function avisCati(Request $request)
{
    $query = DemandeIncubation::with([
    'etudiant',
    'projet.avis'
])->whereHas('projet.avis');

    if ($request->filled('search')) {

        $search = $request->search;

        $query->whereHas('projet', function ($q) use ($search) {

            $q->where('titre','like',"%$search%");

        })->orWhereHas('etudiant', function ($q) use ($search) {

            $q->where('nom','like',"%$search%");

        });
    }

    $demandes = $query->orderByDesc('date_creation')->get();

    return view('cati.avis', compact('demandes'));
}
public function dossiersCati(Request $request)
{
    $query = DemandeIncubation::with([
        'etudiant',
        'projet'
    ])
    ->where('statut_actuel', 'Envoyé au CATI');

    if ($request->filled('search')) {

        $search = $request->search;

        $query->where(function ($q) use ($search) {

            $q->whereHas('projet', function ($qq) use ($search) {

                $qq->where('titre', 'like', "%{$search}%");

            })->orWhereHas('etudiant', function ($qq) use ($search) {

                $qq->where('nom', 'like', "%{$search}%");

            });

        });

    }

    $demandes = $query
        ->orderByDesc('date_creation')
        ->paginate(10)
        ->withQueryString();

    return view(
        'cati.dossiers',
        compact('demandes')
    );
}
}