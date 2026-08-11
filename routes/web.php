<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DemandeIncubationController;
use App\Http\Controllers\DocumentController;
Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/dashboard/etudiant', [DashboardController::class, 'etudiant'])
    ->middleware('role:etudiant')
    ->name('dashboard.etudiant');

Route::get('/dashboard/incubateur', [DashboardController::class, 'incubateur'])
    ->middleware('role:incubateur')
    ->name('dashboard.incubateur');
Route::get('/dashboard/cati',
    [DashboardController::class, 'cati'])
    ->middleware('role:cati')
    ->name('dashboard.cati');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');

Route::post('/register', [AuthController::class, 'register'])->name('register.store');
use App\Http\Controllers\ProjetController;

Route::get('/projet/create', [ProjetController::class, 'create'])
    ->name('projet.create');

Route::post('/projet/store', [ProjetController::class, 'store'])
    ->name('projet.store');
    Route::get('/mes-projets', [ProjetController::class, 'index'])
    ->name('projet.index');
    Route::post(
    '/demande/envoyer/{id}',
    [DemandeIncubationController::class, 'envoyer']
)->name('demande.envoyer');
Route::get('/incubateur/demande/{id}',
    [DemandeIncubationController::class, 'show'])
    ->name('incubateur.demande.show');
    Route::post('/incubateur/demande/{id}/envoyer-cati',
    [DemandeIncubationController::class, 'envoyerAuCati'])
    ->name('incubateur.demande.envoyerCati');
    Route::get('/cati/demande/{id}', [DemandeIncubationController::class, 'showCati'])
    ->middleware('role:cati')
    ->name('cati.demande.show');
    Route::post('/cati/demande/{id}/avis',
    [DemandeIncubationController::class, 'enregistrerAvis'])
    ->middleware('role:cati')
    ->name('cati.avis');
  Route::get(
    '/incubateur/decision/{id}',
    [DemandeIncubationController::class, 'decisionForm']
)
->middleware('role:incubateur')
->name('incubateur.decision');


    Route::get('/mes-demandes',
    [DemandeIncubationController::class,'mesDemandes'])
    ->middleware('role:etudiant')
    ->name('demandes.index');
    Route::get('/mon-profil',
    [AuthController::class,'profil'])
    ->middleware('role:etudiant')
    ->name('profil');
    Route::delete('/projet/{id}', [ProjetController::class, 'destroy'])
    ->name('projet.destroy');
    Route::get('/incubateur/demandes',
    [DashboardController::class, 'demandes'])
    ->name('incubateur.demandes');
   Route::get('/cati/avis',
    [DashboardController::class,'avisCati'])
    ->middleware('role:cati')
    ->name('cati.avis.index');
    Route::get('/cati/dossiers',
    [DashboardController::class,'dossiersCati'])
    ->middleware('role:cati')
    ->name('cati.dossiers');
    Route::get('/incubateur/demande/{id}/decision',
    [DemandeIncubationController::class,'decision'])
    ->middleware('role:incubateur')
    ->name('incubateur.decision');

Route::post('/incubateur/demande/{id}/decision',
    [DemandeIncubationController::class,'storeDecision'])
    ->middleware('role:incubateur')
    ->name('decision.store');
   

Route::get('/documents/avis/{id}', [DocumentController::class,'avis'])
    ->name('documents.avis');

Route::get('/documents/decision/{id}', [DocumentController::class,'decision'])
    ->name('documents.decision');

Route::get('/documents/attestation/{id}', [DocumentController::class,'attestation'])
    ->name('documents.attestation');
    
    Route::get('/documents/decision/{id}', [DocumentController::class, 'decision'])
    ->name('documents.decision');
    Route::get('/documents/attestation/{id}', [DocumentController::class, 'attestation'])
    ->name('documents.attestation');


Route::get('/incubateur/decisions', [DashboardController::class, 'decisions'])
    ->name('incubateur.decisions');
    Route::get(
    '/document/decision/{id}',
    [DocumentController::class, 'decision']
)->name('document.decision');
use Illuminate\Support\Facades\Session;

Route::get('/lang/{locale}', function ($locale) {

    if (in_array($locale, ['fr', 'ar'])) {

        Session::put('locale', $locale);

    }

    return back();

})->name('lang.switch');


