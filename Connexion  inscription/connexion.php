<?php
	include_once "RequeteUser.php";
	session_start();

	$res=selectAllUsers();
	while (	$row=mysqli_fetch_assoc($res)){
		if( $_POST['mail']==$row['mail'] && $_POST['mdp']==$row['mdp'] ){
			/* stockage des informations de l'utilisateur dans la variable de session */
			$_SESSION['connecte']=True;
			$_SESSION['idUser']=$row['iduser'];
			$_SESSION['prenom']=$row['prenom'];
			$_SESSION['nom']=$row['nom'];
			$_SESSION['mdp']=$row['mdp'];
			$_SESSION['mail']=$row['mail'];
			$_SESSION['role']=$row['admin'];
		}
	}
	header("Location: vrai_index.php");

?>
