<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
					integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
		<link rel="stylesheet" href="css/style.css">
    <title> Agenda collaboratif </title>
	</head>
	<body>
		<nav class="navbar navbar-dark bg-dark mb-2">


		<?php

			session_start();
			if (empty($_SESSION['connecte'])) {
				$_SESSION['connecte']= 0;
			}
			if ($_SESSION['connecte']==1):?>
			<a href="../../../1/agenda.php" class="navbar-brand badge badge-secondary pr-4 pl-4 mb-3 mt-3 p-2"> Agenda </a>
			<a href="../../../1/action/groupe/ReqGroupe.php" class="navbar-brand badge badge-secondary mb-2 mt-2 p-2"> Gestion des Groupes</a>
			<a href="../../../1/action/groupe/info.php" class="navbar-brand badge badge-secondary mb-2 mt-2 p-2"> informations Pratiques</a>

		<?php endif;	?>


			<div class="navbar-brand badge badge-secondary mb-3 mt-3">
			<?php
				echo "<section>";

				if (empty($_SESSION['connecte'])) {
					$_SESSION['connecte']= 0;
				}


				if ($_SESSION['connecte']==0){
					echo "Vous n'êtes pas connecté,"?><a href="index.php"> connectez-vous!</a>
				<?php
				}
				else {
					echo "Vous êtes connecté en tant que : ".$_SESSION['prenom']." ".$_SESSION['nom'].".";
					echo " <br /> <a href='../../../1/action/user/deconnexion.php'>Se déconnecter</a>";
					echo"";
				}
				echo "</section>";
			?>
		</div>

		</nav>
