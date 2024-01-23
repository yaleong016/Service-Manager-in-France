<h2>Generer Une Liste de periodes d'essai</h2>

<?php if(isset($nomComm)) { ?>
	<p> Le nombre de communes <?= $nomComm ?></p>
<?php } ?>
<?php if(isset($dur)) { ?>
	<p> La duree <?= $dur ?> mois</p>
<?php } ?>
<?php if(isset($selectedServices)) { ?>
	<p> Les services selected entre 3-5 sont:   <?= $selectedServices?></p>
<?php } ?>

<form method="post" action="#">
	<label for="dep">Departement </label>
	<input type="text" name="dep" id="dep" placeholder="some dep"/>
	<br/><br/>
    <label for="mois">Mois maximum: </label>
    <input type="number" name="mois" id="mois" placeholder="maximum"/>
    <br/><br/>

    <label for="kilo">Le nombre de kilo: </label>
    <input type="number" name="kilo" id="kilo" placeholder="numkilo"/>
    <br/><br/>

    <input type="submit" name="Generer" value="Generer"/>
</form>



<?php if(isset($message)) { ?>
	<p style="background-color: yellow;"><?= $message ?></p>
<?php } ?>

<?php if(isset($realList)) { ?>
	<h2>Liste de Periode D'essai:</h2>
    <ul>
    <?php foreach($realList as $comm) { ?>
    	<li> Le Commune: <?= $comm['Idc'] ?>      Le services: <?=$selectedServices?>  La duree: <?=$dur?> mois </li>
    <?php } ?>
    </ul>
<?php } ?>

