<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Etudiant;
use App\Models\Incubateur;
use App\Models\Cati;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }
   public function login(Request $request)
{
    $email = $request->email;
    $password = $request->mot_de_passe;

    // البحث عن الطالب
    $etudiant = Etudiant::where('email', $email)->first();

    if ($etudiant && Hash::check($password, $etudiant->mot_de_passe)) {
        session([
    'user_id' => $etudiant->id_etudiant,
    'user_name' => $etudiant->nom . ' ' . $etudiant->prenom,
    'user_role' => 'etudiant'
]);

return redirect('/dashboard/etudiant');
    }

    // البحث عن مدير الحاضنة
    $incubateur = Incubateur::where('email', $email)->first();

    if ($incubateur && $incubateur->mot_de_passe == $password) {
        session([
    'user_id' => $incubateur->id_incubateur,
    'user_name' => $incubateur->responsable,
    'user_role' => 'incubateur'
]);

return redirect('/dashboard/incubateur');
    }

    // البحث عن CATI
    $cati = Cati::where('email', $email)->first();

    if ($cati && $cati->mot_de_passe == $password) {
        session([
    'user_id' => $cati->id_cati,
    'user_name' => $cati->responsable,
    'user_role' => 'cati'
]);

return redirect('/dashboard/cati');
    }

    return back()->with('error', 'Email ou mot de passe incorrect');
}
public function logout()
{
    session()->flush();

    return redirect('/login');
}
public function showRegister()
{
    return view('auth.register');
}

public function register(Request $request)
{
    $request->validate([
        'nom' => 'required|max:50',
        'prenom' => 'required|max:50',
        'email' => 'required|email|unique:etudiant,email',
        'mot_de_passe' => 'required|min:6|confirmed',
        'num_etudiant' => 'required|unique:etudiant,num_etudiant',
        'faculte_departement' => 'required',
        'telephone' => 'required'
    ]);

    Etudiant::create([
        'nom' => $request->nom,
        'prenom' => $request->prenom,
        'email' => $request->email,
        'mot_de_passe' => Hash::make($request->mot_de_passe),
        'num_etudiant' => $request->num_etudiant,
        'faculte_departement' => $request->faculte_departement,
        'telephone' => $request->telephone,
    ]);

    return redirect()->route('login')
        ->with('success', 'Votre compte a été créé avec succès.');
}
public function profil()
{
    $etudiant = Etudiant::find(session('user_id'));

    return view(
        'etudiant.profil',
        compact('etudiant')
    );
}

}
