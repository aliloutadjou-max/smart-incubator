<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Décision d'Incubation</title>

<style>

@page{
    margin:30px;
}

body{
    font-family:"Times New Roman",serif;
    color:#222;
    font-size:13px;
    line-height:1.6;
}

.header{
    width:100%;
    margin-bottom:20px;
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

.center h3{
    margin:2px;
    font-size:18px;
}

.center p{
    margin:2px;
    font-size:13px;
}

.line{
    border-top:2px solid #0d6efd;
    margin:15px 0 25px;
}

.title{
    text-align:center;
    font-size:22px;
    font-weight:bold;
    margin-bottom:5px;
}

.number{
    text-align:center;
    color:#666;
    margin-bottom:25px;
}

table.info{
    width:100%;
    border-collapse:collapse;
    margin-bottom:25px;
}

table.info td{
    border:1px solid #999;
    padding:10px;
}

.label{
    width:35%;
    background:#f5f5f5;
    font-weight:bold;
}

.section{
    font-size:16px;
    font-weight:bold;
    margin:20px 0 10px;
}

.box{
    border:1px solid #999;
    padding:15px;
    min-height:130px;
}

.signature{
    width:100%;
    margin-top:60px;
}

.signature td{
    border:none;
    text-align:center;
    padding-top:45px;
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

DÉCISION D'INCUBATION

</div>

<div class="number">

N° DEC-{{ date('Y') }}-{{ $decision->id_decision ?? '0001' }}

</div>

<table class="info">

<tr>

<td class="label">Étudiant</td>

<td>{{ session('user_name') }}</td>

</tr>

<tr>

<td class="label">Projet</td>

<td>{{ $projet->titre }}</td>

</tr>

<tr>

<td class="label">Date</td>

<td>{{ now()->format('d/m/Y') }}</td>

</tr>

<tr>

<td class="label">Décision</td>

<td>{{ $decision->type_decision ?? 'En attente' }}</td>

</tr>

</table>

<div class="section">

Décision officielle

</div>

<div class="box">

Après étude du dossier présenté par le porteur du projet,
et conformément à l'avis technique émis par le comité CATI,

<br><br>

la décision suivante est retenue :

<br><br>

<h3 style="text-align:center">

{{ $decision->type_decision ?? 'En attente' }}

</h3>

<br>

Cette décision est délivrée à titre officiel dans le cadre
du parcours de pré-incubation de l'Université de Tissemsilt.

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