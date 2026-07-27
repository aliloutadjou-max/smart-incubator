<!DOCTYPE html>
<html lang="fr">
<head>

<meta charset="UTF-8">

<title>Avis Technique CATI</title>

<style>

@page{
    margin:30px;
}

body{

    font-family:"Times New Roman",serif;

    color:#222;

    font-size:13px;

    line-height:1.55;

}

.header{

    width:100%;

    margin-bottom:25px;

}

.header table{

    width:100%;

}

.header td{

    border:none;

    vertical-align:middle;

}

.logo{

    width:90px;

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

hr{

    border:none;

    border-top:2px solid #0d6efd;

    margin:15px 0 25px;

}

.title{

    text-align:center;

    font-size:20px;

    font-weight:bold;

    letter-spacing:1px;

}

.number{

    text-align:center;

    color:#666;

    margin-top:5px;

    margin-bottom:25px;

}

.info{

    width:100%;

    border-collapse:collapse;

    margin-bottom:25px;

}

.info td{

    border:1px solid #999;

    padding:10px;

}

.label{

    width:35%;

    background:#f4f4f4;

    font-weight:bold;

}

.section{

    font-size:16px;

    font-weight:bold;

    margin:25px 0 10px;

}

.box{

    border:1px solid #999;

    min-height:120px;

    padding:12px;

}

.signature{

    width:100%;

    margin-top:70px;

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
    <img src="{{ public_path('images/logo.png') }}"
         style="height:80px;">
</td>



<td class="center">

<h3>République Algérienne Démocratique et Populaire</h3>

<p>Ministère de l'Enseignement Supérieur et de la Recherche Scientifique</p>

<p>Université de Tissemsilt</p>

<p><strong>Centre d'Appui à la Technologie et à l'Innovation (CATI)</strong></p>

</td>

<td width="20%" align="right">
    <img src="{{ public_path('images/logo.png') }}"
         style="height:80px;">
</td>

</tr>

</table>

</div>

<hr>

<div class="title">

AVIS TECHNIQUE CATI

</div>

<div class="number">

N° : CATI-{{ date('Y') }}-0001

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

<td class="label">Avis</td>

<td>{{ $avis->resultat_evaluation ?? 'En attente' }}</td>

</tr>

</table>

<div class="section">

Observations

</div>

<div class="box">

{{ $avis->recommandation ?? '' }}

</div>

<table class="signature">

<tr>

<td>

Responsable CATI

<br><br><br>

_____________________

</td>

</tr>

</table>

<div class="footer">

Université de Tissemsilt • Centre CATI • Page 1/1

</div>

</body>

</html>