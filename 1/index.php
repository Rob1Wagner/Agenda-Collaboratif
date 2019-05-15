<?php
include 'views/header.php';
?>

<h1 class="d-flex justify-content-center text-muted">Bienvenue sur  l'agenda collaboratif 2.0</h1>

<!-- Affichage du statut de connexion -->




<!--Formulaire de connexion -->

<section>

	<form method="post" action="action/user/connexion.php" class="form">
		<h2 class="text-danger">Connexion</h2>
		<div class="row">
			<div class="col-sm-3">
				<div class="form-group">
					<label for="mail" > <img src="image/mailConnexion.png"> </label>
						<input type="email"class="form-control " placeholder="Adresse mail" name="mail" />
				</div>
			</div>

		<div class="col-sm-3">
			<div class="form-group">
				<label for="mdp" ><img src="image/key.png"></label>
					<input type="password" class="form-control" placeholder="Mot de passe" name="mdp" />
			</div>
		</div>
	</div>

		<input type="submit" name="action" value="Se connecter"/>
	</form>
</section>

</br>
</br>
</br>



<!--Formulaire d'inscription -->
<section>
	<form method="post" action="action/user/inscription.php" class="form">
		<h2 class="text-danger">Inscription</h2>
		<div class="row">
      <div class="col-sm-3">
        <div class="form-group">
					<label for="prenom"> <img src="image/nom.png"> </label>
						<input type="text" class="form-control" placeholder="Prénom" name="prenom" />
				</div>
			</div>

			<div class="col-sm-3">
				<div class="form-group">
					<label for="nom"> <img src="image/prenom.png"> </label>
						<input type="text" class="form-control" placeholder="Nom" name="nom" />
				</div>
			</div>
		</div>

			<div class="row">
				<div class="col-sm-3">
					<div class="form-group">
						<label for="mail"> <img src="image/mail.png"> </label>
							<input type="email" class="form-control" placeholder="Adresse mail" name="mail" />
					</div>
				</div>

				<div class="col-sm-3">
					<div class="form-group">
						<label for="mdp"> <img src="image/password.png"> </label>
							<input type="password" class="form-control" placeholder="Mot de passe" name="mdp" />
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3">
					<div class="form-group">
						<label for="rmdp"> <img src="image/confirmation.png"> </label>
							<input type="password" class="form-control" placeholder="Confirmer le mot de passe" name="rmdp" />
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-3">
					<div class="form-group">
						<input type="submit" name="action"  value="Inscription"/>
					</div>
				</div>
			</div>
	</form>

</section>


<?php
include 'views/footer.php';
?>
