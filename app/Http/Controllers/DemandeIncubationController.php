<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DemandeIncubation;
use App\Models\Projet;
use App\Models\AvisTechnique;

use App\Models\Decision;
class DemandeIncubationController extends Controller
{
    public function envoyer($id)
    
    {
        $projet = Projet::findOrFail($id);

        $demandeExiste = $projet->demande;

        if ($demandeExiste) {
            return back()->with('error', 'Cette demande existe déjà.');
        }

        DemandeIncubation::create([
    'date_creation' => date('Y-m-d'),
    'statut_actuel' => 'En attente',
    'pieces_jointes' => null,
    'id_projet' => $projet->id_projet,
    'id_etudiant' => session('user_id'),
    'id_incubateur' => null,
]);

        $projet->statut_projet = 'En attente';
        $projet->save();

        return redirect()->route('projet.index')
            ->with('success', 'Votre demande a été envoyée avec succès.');
    }
    public function show($id)
{
    $demande = DemandeIncubation::with('projet')->findOrFail($id);

    return view('incubateur.show', compact('demande'));
}
public function envoyerAuCati($id)
{
    $demande = DemandeIncubation::findOrFail($id);

    // مؤقتًا نربط الطلب بأول CATI
    $demande->id_incubateur = 1;

    $demande->statut_actuel = 'Envoyé au CATI';

    $demande->save();

    return redirect()->route('dashboard.incubateur')
        ->with('success', 'La demande a été envoyée au CATI.');
}
public function showCati($id)
{
    $demande = DemandeIncubation::with('projet')->findOrFail($id);

    return view('cati.show', compact('demande'));
}
public function enregistrerAvis(Request $request, $id)
{
    $request->validate([
        'resultat_evaluation' => 'required',
        'recommandation' => 'required'
    ]);

    $demande = DemandeIncubation::findOrFail($id);

    AvisTechnique::create([

        'resultat_evaluation' => $request->resultat_evaluation,

        'recommandation' => $request->recommandation,

        'date_avis' => now()->toDateString(),

        // مؤقتًا حتى نربطها بالمستخدم المسجل لاحقًا
        'id_cati' => 1,

        'id_projet' => $demande->id_projet
    ]);

    $demande->statut_actuel = 'Avis disponible';

    $demande->save();

    return redirect('/dashboard/cati')
        ->with('success', 'Avis enregistré avec succès.');
}
public function decisionForm($id)
{
    $demande = DemandeIncubation::with('projet')->findOrFail($id);

    $avis = AvisTechnique::where('id_projet', $demande->id_projet)->first();

    if (!$avis) {
        return redirect('/dashboard/incubateur')
            ->with('error', 'Aucun avis technique trouvé.');
    }

    return view('incubateur.decision', compact('demande', 'avis'));
}
public function enregistrerDecision(Request $request, $id)
{
    $request->validate([
        'type_decision' => 'required',
        'commentaire' => 'nullable'
    ]);

    $demande = DemandeIncubation::findOrFail($id);

    $avis = AvisTechnique::where('id_projet', $demande->id_projet)->firstOrFail();

    Decision::create([
        'type_decision' => $request->type_decision,
        'commentaire' => $request->commentaire,
        'date_decision' => now()->toDateString(),
        'id_avis' => $avis->id_avis,

        // مؤقتًا حتى نربطه بالمستخدم المتصل لاحقًا
        'id_incubateur' => 1,

        'id_demande' => $demande->id_demande,
    ]);

    // تحديث حالة الطلب
    $demande->statut_actuel = $request->type_decision;
    $demande->save();

    return redirect('/dashboard/incubateur')
        ->with('success', 'Décision enregistrée avec succès.');
}
public function mesDemandes()
{
    $projet = Projet::where(
        'id_etudiant',
        session('user_id')
    )->first();

    $demande = null;

    if($projet){

        $demande = DemandeIncubation::where(
            'id_projet',
            $projet->id_projet
        )->first();

    }

    return view(
        'etudiant.demandes',
        compact('projet','demande')
    );
}
public function decision($id)
{
    $demande = DemandeIncubation::with([
        'projet',
        'etudiant',
        'projet.avis',
        'projet.avis.decision'
    ])->findOrFail($id);

    $decision = optional($demande->projet->avis)->decision;

    return view(
        'incubateur.decision',
        compact('demande','decision')
    );
}
public function storeDecision(Request $request,$id)
{
    $request->validate([

        'type_decision'=>'required',

        'commentaire'=>'nullable'

    ]);

    $demande = DemandeIncubation::findOrFail($id);

    Decision::create([

        'id_avis'=>$demande->projet->avis->id_avis,

        'type_decision'=>$request->type_decision,

        'commentaire'=>$request->commentaire,

        'date_decision'=>now()

    ]);

    $demande->statut_actuel = $request->type_decision;

    $demande->save();

  return redirect()
    ->route('dashboard.incubateur')
    ->with('success', 'La décision finale a été enregistrée avec succès.');
}
}
