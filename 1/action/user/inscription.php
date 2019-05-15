<?php
    include_once "RequeteUser.php";


    $prenomUtilisateur = $_POST["prenom"];
    $nomUtilisateur = $_POST["nom"];
    $mdpUtilisateur = $_POST["mdp"];
    $mailUtilisateur = $_POST["mail"];

    insererUtilisateur($prenomUtilisateur, $nomUtilisateur, $mdpUtilisateur , $mailUtilisateur);

    header("Location: ../../index.php");
?>
