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
					<label for="mail" >Adresse mail :</label>
					<input type="email"class="form-control " name="mail" />
				</div>
			</div>

		<div class="col-sm-3">
			<div class="form-group">
				<label for="mdp" >Mot de passe :</label>
				<input type="password" class="form-control" name="mdp" />
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
					<label for="prenom">Prénom :</label>
					<input type="text" class="form-control" name="prenom" />
				</div>
			</div>

			<div class="col-sm-3">
				<div class="form-group">
					<label for="nom">Nom :</label>
					<input type="text" class="form-control" name="nom" />
				</div>
			</div>
		</div>

			<div class="row">
				<div class="col-sm-3">
					<div class="form-group">
						<label for="mail">Adresse mail :</label>
						<input type="email" class="form-control" name="mail" />
					</div>
				</div>

				<div class="col-sm-3">
					<div class="form-group">
						<label for="mdp">Mot de passe :</label>
						<input type="password" class="form-control" name="mdp" />
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3">
					<div class="form-group">
						<label for="rmdp">Répéter le mot de passe :</label>
						<input type="password" class="form-control" name="rmdp" />
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
