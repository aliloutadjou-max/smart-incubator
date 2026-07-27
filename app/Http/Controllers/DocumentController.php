<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projet;
use App\Models\DemandeIncubation;
use App\Models\AvisTechnique;
use Barryvdh\DomPDF\Facade\Pdf;

class DocumentController extends Controller
{
public function avis($id)
{
    $projet = Projet::findOrFail($id);

    $demande = $projet->demande;

    $avis = $projet->avis;

    $pdf = Pdf::loadView(
        'pdf.avis-cati',
        compact('projet', 'demande', 'avis')
    );

    return $pdf->download('Avis_Technique_CATI.pdf');
}

    public function decision($id)
{
    $projet = Projet::findOrFail($id);

    $avis = $projet->avis;

    $decision = $avis ? $avis->decision : null;

    if (!$decision) {
        abort(404, 'Décision introuvable.');
    }

    $pdf = Pdf::loadView(
        'pdf.decision',
        compact('projet', 'avis', 'decision')
    );

    return $pdf->stream('Decision_Incubation.pdf');
}
    public function attestation($id)
{
    $projet = Projet::findOrFail($id);

    $avis = $projet->avis;

    $decision = $avis ? $avis->decision : null;

    if (!$decision) {
        abort(404, 'Attestation indisponible.');
    }

    $pdf = Pdf::loadView(
        'pdf.attestation',
        compact('projet', 'avis', 'decision')
    );

    return $pdf->stream('Attestation_Admission.pdf');
}
}