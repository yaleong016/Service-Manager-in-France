
<h2>Liste des enfant et de leur école :</h2>
<ul>
<?php foreach($enfant as $enfant) { ?>
	<li><?= $enfant['Nom'] ?> <?= $enfant['Prénom'] ?> / <?= $enfant['NomL'] ?></li>
<?php } ?>
</ul>

<h2>Nombre d'instance des Tables enfant ,commune et ecole  :</h2>
<ul>
	<li>il y a <?= $t1 ?> enfant(s) </li>
	<li>il y a <?= $t2 ?> communes(s) </li>
	<li>il y a <?= $t3 ?> ecole(s) </li>
</ul>

<h2>Liste des enfants avec le nom de la cantine où ils mangeront le 01/01/2024  :</h2>
<ul>
<?php foreach($cantine as $cantine) { ?>
	<li><?= $cantine['Nom']?> <?= $cantine['Prénom']?> <?= $cantine['Idl'] ?></li>
<?php } ?>
</ul>


<h2>Paires d’enfants ayant les mêmes nom et prénom, mais inscrits dans des écoles différentes :</h2>
<ul>
<?php foreach($paireenfant as $paireenfant) { ?>
	<li><?= $paireenfant['Nom_1']?> <?= $paireenfant['Prénom_1']?> <?= $paireenfant['Idl_1'] ?></li>
<?php } ?>
</ul>

<h2>Top 3 des départements ayant le plus de communes:</h2>
<ul>
<?php foreach($Top3commune as $Top3commune) { ?>
	<li><?= $Top3commune['Nom_Departement']?> <?= $Top3commune['Nombre_de_Communes']?></li>
<?php } ?>
</ul>

