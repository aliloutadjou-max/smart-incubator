<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projet;
use App\Models\DemandeIncubation;

class ProjetController extends Controller
{
    /**
     * Afficher la page de création d'un projet
     */
    public function create()
{
    return view('projet.create');
}

    /**
     * Enregistrer un nouveau projet
     */
    
    
    

    public function store(Request $request)

{
    $request->validate([
        'titre' => 'required|max:200',
        'description' => 'required',
        'domaine_scientifique' => 'required|max:100',
        'objectifs' => 'required',
        'degre_innovation' => 'required'
    ]);
    
    $projet = new Projet();

$projet->titre = $request->titre;
$projet->description = $request->description;
$projet->domaine_scientifique = $request->domaine_scientifique;
$projet->objectifs = $request->objectifs;
$projet->degre_innovation = $request->degre_innovation;
$projet->statut_projet = 'Brouillon';
$projet->id_etudiant = session('user_id');
$projet->id_cati = null;


$projet->save();


    return redirect('/dashboard/etudiant')
            ->with('success', 'Projet créé avec succès.');
}
public function index()
{
    $projets = Projet::where(
        'id_etudiant',
        session('user_id')
    )->get();

    return view(
        'projet.index',
        compact('projets')
    );
}
public function destroy($id)
{
    $projet = Projet::findOrFail($id);

    $demande = DemandeIncubation::where('id_projet', $id)->first();

    // إذا كان الطلب في مرحلة متقدمة لا نسمح بالحذف
    if ($demande && $demande->statut_actuel != 'En attente') {

        return back()->with(
            'error',
            'Impossible de supprimer un projet déjà traité.'
        );
    }

    // إذا كان يوجد طلب في انتظار نحذفه أولاً
    if ($demande) {
        $demande->delete();
    }
if ($projet->avis)  {

    return back()->with(
        'error',
        'Impossible de supprimer ce projet car il possède déjà un avis technique.'
    );

}
    $projet->delete();

    return back()->with(
        'success',
        'Projet supprimé avec succès.'
    );
}
}