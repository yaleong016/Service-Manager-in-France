<h2>Ajouter un service a votre commune :</h2>

<form action="#" method="post">
  <label for="service">Choisissez un service :</label>
  <select id="service" name="service">
    <option value="0">Service de restauration scolaire</option>
    <option value="1">Service scolaire</option>
    <option value="2">Service de signalement</option>
	<option value="3">Service d'élection </option>
	<option value="4">Service de d'union civil</option>
	<option value="5">Service d'état civil</option>
  </select><br><br>
  <label for="description">Entrez une description :</label>
  <textarea id="description" name="description" placeholder="Saisissez ici"></textarea><br><br>
  <label for="dated">Sélectionnez une date de debut :</label>
  <input type="date" id="dated" name="dated"><br><br>
  <label for="datef">Sélectionnez une date de fin :  </label>
  <input type="date" id="datef" name="datef"><br><br>
  <label>
    <input type="radio" name="choix" value="Gratuit"> Gratuit
  </label>
  <label>
    <input type="radio" name="choix" value="Payant"> Payant
  </label>
  <br><br>
  <label for="idc">Choisissez une commune :</label>
<select id="idc" name="idc">
<?php
        foreach ($res as $row) {
            echo "<option value='" . $row["idc"] . "'>" . $row["nomC"] . "</option>";
        }
?>
</select>
<br><br>
<label for="codeInsee">Choisissez un code Insee :</label>
<select id="codeInsee" name="codeInsee">
<?php
        foreach ($res as $row) {
            echo "<option value='" . $row["Code_INSEE"] . "'>" . $row["Code_INSEE"] . "</option>";
        }
?>
</select>
  <br><br>
  <input type="submit" value="Valider">
