<?php
include 'header.php';
?>

<h1>Bienvenue sur  l'agenda collaboratif 2.0</h1>

<!-- Affichage du statut de connexion -->
<?php
	echo "<section>";
	if (empty($_SESSION['connecte'])) {
		$_SESSION['connecte']= false;
	}


	if (!$_SESSION['connecte']){
		echo "Vous n'êtes pas connecté. ";
	}
	else {
		echo "Vous êtes connecté en tant que : ".$_SESSION['prenom']." ".$_SESSION['nom'].".";
		echo " <br /> <a href='deconnexion.php'>Se déconnecter</a>";
	}
	echo "</section>";
?>



<!--Formulaire de connexion -->
<section>
	<form method="post" action="connexion.php">
		<h2>Connexion</h2>

		<label for="mail">Adresse mail :</label>
		<input type="email" name="mail" />
		<br />

		<label for="mdp">Mot de passe :</label>
		<input type="password" name="mdp" />
		<br />

		<input type="submit" name="action" value="Se connecter"/>
	</form>
</section>

<br />
<br />
<br />




<!--Formulaire d'inscription -->
<section>
	<form method="post" action="inscription.php">
		<h2>Inscription</h2>

		<label for="prenom">Prénom :</label>
		<input type="text" name="prenom" />
		<br />

		<label for="nom">Nom :</label>
		<input type="text" name="nom" />
		<br />

		<label for="mail">Adresse mail :</label>
		<input type="email" name="mail" />
		<br />

		<label for="mdp">Mot de passe :</label>
		<input type="password" name="mdp" />
		<br />

		<label for="rmdp">Répéter le mot de passe :</label>
		<input type="password" name="rmdp" />
		<br />

		<input type="submit" name="action" value="Inscription"/>
	</form>
</section>


<?php
include 'footer.php';
?>

