<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Créer un compte</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/login.css') }}">

</head>

<body>

<div class="auth-card register">

    <img src="{{ asset('images/logo.png') }}" class="logo">

    <h2>Créer un compte</h2>

    <p class="subtitle">
        Plateforme d'Incubation
    </p>

    <form action="{{ route('register.store') }}" method="POST">

        @csrf
        @if ($errors->any())

    <div class="alert alert-danger">

        <ul class="mb-0">

            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif

        <div class="row">

            <div class="col-md-6 mb-3">
                <input type="text" class="form-control" name="nom" placeholder="Nom">
            </div>

            <div class="col-md-6 mb-3">
                <input type="text" class="form-control" name="prenom" placeholder="Prénom">
            </div>

            <div class="col-md-6 mb-3">
                <input type="text" class="form-control" name="num_etudiant" placeholder="Numéro de la carte d'étudiant">
            </div>

            <div class="col-md-6 mb-3">
                <input type="text" class="form-control" name="faculte_departement" placeholder="Faculté / Département">
            </div>

            <div class="col-md-6 mb-3">
                <input type="text" class="form-control" name="telephone" placeholder="Téléphone">
            </div>

            <div class="col-md-6 mb-3">
                <input type="email" class="form-control" name="email" placeholder="Adresse e-mail">
            </div>

            <div class="col-md-6 mb-3">
    <input
        type="password"
        class="form-control"
        name="mot_de_passe"
        placeholder="Mot de passe">
</div>

<div class="col-md-6 mb-4">
    <input
        type="password"
        class="form-control"
        name="mot_de_passe_confirmation"
        placeholder="Confirmation du mot de passe">
</div>

        </div>

        <button class="login-btn">

            Créer un compte

        </button>

        <div class="register-link mt-4">

            <p>Vous avez déjà un compte ?</p>

            <a href="{{ route('login') }}">

                Se connecter

            </a>

        </div>

    </form>

</div>

</body>

</html>