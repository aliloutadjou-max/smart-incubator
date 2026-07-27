<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un projet</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background:#eef7ff;
            font-family:Arial, Helvetica, sans-serif;
        }

        .card-project{
            max-width:900px;
            margin:40px auto;
            border:none;
            border-radius:18px;
            box-shadow:0 10px 30px rgba(0,0,0,.12);
        }

        .header{
            background:linear-gradient(135deg,#4FC3F7,#1976D2);
            color:white;
            padding:25px;
            border-radius:18px 18px 0 0;
        }

        .header h2{
            margin:0;
            font-weight:bold;
        }

        .body-card{
            padding:35px;
        }

        textarea{
            resize:none;
        }

        .btn-save{
            background:#2196F3;
            color:white;
            padding:10px 35px;
            border:none;
            border-radius:10px;
            font-weight:bold;
        }

        .btn-save:hover{
            background:#1976D2;
        }
    </style>

</head>

<body>

<div class="card card-project">

    <div class="header">
        <h2>Créer un projet d'innovation</h2>
        <small>Complétez les informations de votre projet.</small>
    </div>

    <div class="body-card">

        <form action="{{ route('projet.store') }}" method="POST">

            @csrf

            <div class="mb-3">
                <label class="form-label">Titre du projet</label>

                <input
                    type="text"
                    class="form-control"
                    name="titre">
            </div>

            <div class="mb-3">

                <label class="form-label">
                    Domaine scientifique
                </label>

                <input
                    type="text"
                    class="form-control"
                    name="domaine_scientifique">

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Description
                </label>

                <textarea
                    class="form-control"
                    rows="4"
                    name="description"></textarea>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Objectifs
                </label>

                <textarea
                    class="form-control"
                    rows="4"
                    name="objectifs"></textarea>

            </div>

            <div class="mb-4">

                <label class="form-label">
                    Degré d'innovation
                </label>

                <select
                    class="form-select"
                    name="degre_innovation">

                    <option>Faible</option>
                    <option>Moyen</option>
                    <option>Élevé</option>

                </select>

            </div>

            <button class="btn-save">
                Enregistrer le projet
            </button>

        </form>

    </div>

</div>

</body>
</html>