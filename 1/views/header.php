<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
		<link rel="stylesheet" href="css/style.css">
		<script src = "https://code.jquery.com/jquery-3.3.1.slim.min.js" 
         integrity = "sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" 
         crossorigin = "anonymous">
      </script>
      
      <script src = "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" 
         integrity = "sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" 
         crossorigin = "anonymous">
      </script>
    
      
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
			<a href="../../../1/agenda.php"><img src="../../../1/css/image/agenda.png"class="d-inline-block align-top"></a>
			<a href="../../../1/agenda.php" class="navbar-brand badge badge-secondary pr-4 pl-4 mb-3 mt-3 p-2"> Agenda </a>
			<a href="../../../1/action/groupe/ReqGroupe.php" ><img src="../../../1/css/image/groupe.png"class="d-inline-block align-top"></a>
			<a href="../../../1/action/groupe/ReqGroupe.php" class="navbar-brand badge badge-secondary mb-2 mt-2 p-2"> Gestion des Groupes</a>
			<a href="../../../1/action/user/chat.php" ><img src="../../../1/css/image/messagerie.png"class="d-inline-block align-top"></a>
			
				<a href="../../../1/action/user/chat.php" class="navbar-brand badge badge-secondary mb-2 mt-2 p-2"> Envoyer un message</a>
			
			<a href="../../../1/action/groupe/info.php" ><img src="../../../1/css/image/info.png"class="d-inline-block align-top"></a>

			
				<a href="../../../1/action/groupe/info.php" class="navbar-brand badge badge-secondary mb-2 mt-2 p-2"> Informations Pratiques  <?php if((isset($_SESSION['invitationEvenement'])) || (isset($_SESSION['invitation'])) ): ?> <span class="badge badge-pill badge-danger">!</span><span class="badge badge-pill badge-warning"><?php endif; ?><?php if(isset($_SESSION['messagesLu'])):  ?><span class="badge badge-pill badge-warning"><?php echo ($_SESSION['messagesLu']) ?>	</span><?php endif; ?></a>
			

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
			<?php if ($_SESSION['connecte']==1): ?>

			<form class="form-inline" action ="../../../1/action/evenement/find.php" method="post">
				<input class="form-control mr-sm-2" name="find" type="search" placeholder="Trouver un evenement" aria-label="Search">
				<button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Search</button>
			</form>
		<?php endif; ?>
		</div>

		</nav>
