<?php
	include_once "RequeteUser.php";



	$res=selectAllUsers();

	while (	$row= $res->fetch()){

		/*dd($_POST['mail']);
		exit();*/

		if( $_POST['mail']==$row['mail'] && $_POST['mdp']==$row['mdp'] ){
			/* stockage des informations de l'utilisateur dans la variable de session */
			$_SESSION['connecte']=true;
			$_SESSION['idUser']=$row['id'];
			$_SESSION['prenom']=$row['prenom'];
			$_SESSION['nom']=$row['nom'];
			$_SESSION['mail']=$row['mail'];
			$_SESSION['mesGroupes'];
			$_SESSION['EG'];


		}
	}
	header("Location: ../groupe/invitation.php");

?>
