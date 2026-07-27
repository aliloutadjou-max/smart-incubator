<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Attestation d'Admission</title>

<style>

@page{
    margin:30px;
}

body{
    font-family:"Times New Roman",serif;
    color:#222;
    font-size:13px;
    line-height:1.7;
}

.header table{
    width:100%;
}

.header td{
    border:none;
    vertical-align:middle;
}

.logo{
    height:80px;
}

.center{
    text-align:center;
}

.line{
    border-top:2px solid #0d6efd;
    margin:18px 0 25px;
}

.title{
    text-align:center;
    font-size:24px;
    font-weight:bold;
    margin-bottom:8px;
}

.subtitle{
    text-align:center;
    color:#666;
    margin-bottom:25px;
}

.content{
    border:1px solid #999;
    padding:20px;
    text-align:justify;
    min-height:250px;
}

.signature{
    width:100%;
    margin-top:60px;
}

.signature td{
    border:none;
    text-align:center;
    padding-top:40px;
}

.footer{
    position:fixed;
    bottom:0;
    left:0;
    right:0;
    text-align:center;
    font-size:11px;
    color:#777;
}

</style>

</head>

<body>

<div class="header">

<table>

<tr>

<td width="20%">
<img src="{{ public_path('images/logo.png') }}" class="logo">
</td>

<td class="center">

<h3>République Algérienne Démocratique et Populaire</h3>

<p>Ministère de l'Enseignement Supérieur et de la Recherche Scientifique</p>

<p>Université de Tissemsilt</p>

<p><strong>Centre d'Appui à la Technologie et à l'Innovation (CATI)</strong></p>

</td>

<td width="20%" align="right">
<img src="{{ public_path('images/logo.png') }}" class="logo">
</td>

</tr>

</table>

</div>

<div class="line"></div>

<div class="title">

ATTESTATION D'ADMISSION

</div>

<div class="subtitle">

Pré-incubation

</div>

<div class="content">

Je soussigné(e), Directeur de l'Incubateur de l'Université de Tissemsilt,

atteste que :

<br><br>

<b>Nom :</b> {{ session('user_name') }}

<br><br>

<b>Projet :</b> {{ $projet->titre }}

<br><br>

a été admis officiellement au parcours de pré-incubation,

suite à la décision favorable du comité d'évaluation.

<br><br>

Cette attestation est délivrée à l'intéressé(e)

pour servir et valoir ce que de droit.

<br><br>

Fait à Tissemsilt,

Le {{ now()->format('d/m/Y') }}

</div>

<table class="signature">

<tr>

<td>

Le Directeur de l'Incubateur

<br><br><br>

______________________

</td>

</tr>

</table>

<div class="footer">

Université de Tissemsilt • Centre CATI • Page 1 / 1

</div>

</body>
</html>