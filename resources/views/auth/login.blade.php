<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Connexion</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>

<div class="auth-card login">

    <img src="{{ asset('images/logo.png') }}" class="logo">

    <h2>Plateforme d'Incubation</h2>

    <p class="subtitle">
        Université de Tissemsilt
    </p>

    <form method="POST" action="/login">

        @csrf

        <div class="input-group-custom">

            <i class="bi bi-envelope-fill"></i>

            <input
                type="email"
                name="email"
                placeholder="Adresse e-mail"
                required>

        </div>

        <div class="input-group-custom">

            <i class="bi bi-lock-fill"></i>

            <input
                type="password"
                name="mot_de_passe"
                placeholder="Mot de passe"
                required>

        </div>

        <button class="login-btn">

            Se connecter

        </button>
<div class="register-link">

    <p>Vous n'avez pas de compte ?</p>

    <a href="{{ route('register') }}">
        Créer un compte Étudiant
    </a>

</div>
    </form>

</div>

</body>

</html>