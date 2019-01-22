<?php
	include"header.php";
?>
<section>
	<h1>Inscrivez vous ici:</h1>
	<form method= "post" action = "inscription.php">
	<label for "nom">Votre nom ?</label>
	<input type = "text" name = "nom"/>
	<label for "prenom">Votre prenom ?</label>
	<input type = "text" name = "prenom"/>
	<label for "email">Votre adresse mail ?</label>
	<input type = "mail" name = "email"/>
	<label for "mdp1">Votre mot de passe ?</label>
	<input type = "password" name = "mdp1"/>
	<label for "mdp2">Vérifiez votre mot de passe:</label>
	<input type = "password" name = "mdp2"/>
</section>
<?php
	include"footer.php";
?>