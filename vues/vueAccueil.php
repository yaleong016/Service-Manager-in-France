<h2>Les Service Pour les enfants</h2>

<form method="post" action="#">
	<label for="boutonValider">Click here to Import the Communities: </label>
	<br/><br/>
	<input type="submit" name="boutonValider" value="Ajouter"/>
</form>

<p>Que faire sur ce site ?</p>
<ul>
	<li>Afficher les données de la base</li>
	<li>Ajouter une série</li>
	<li>Rechercher une série ou une actrice</li>
	<li>Générer un historique de votre activité sur le site</li>
</ul>

<div>
	<img src="img/school.jpg" />
</div>

<?php if(isset($message)) { ?>
	<p style="background-color: yellow;"><?= $message ?></p>
<?php } ?>



<?php if(isset($affiche)) { ?>
		<h2>Lists de nom_communes :</h2>
        <ul>
        <?php foreach($comm as $c) { ?>
        	<li><?= $c['nom_commune_complet'] ?></li>
        <?php } ?>
        </ul>
<?php } ?>





