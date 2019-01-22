<?php
	include"header.php";
?>
<section>
	<h1>Inscrivez vous ici:</h1>
	<form method= "post" action = "action/inscription.php">
	<label for "nom">Votre nom ?</label>
	<input type = "text" name = "nom"/><br/>
	<label for "prenom">Votre prenom ?</label>
	<input type = "text" name = "prenom"/><br/>
	<label for "email">Votre adresse mail ?</label>
	<input type = "mail" name = "email"/><br/>
	<label for "mdp1">Votre mot de passe ?</label>
	<input type = "password" name = "mdp1"/><br/>
	<label for "mdp2">Vérifiez votre mot de passe:</label>
	<input type = "password" name = "mdp2"/><br/>
</section>
<?php
	include"footer.php";
?>