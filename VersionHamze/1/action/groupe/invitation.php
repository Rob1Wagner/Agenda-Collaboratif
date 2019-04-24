<?php
require 'RequeteGroupe.php';

if(recInvitation($_SESSION['idUser'])){
$invitation = recInvitation($_SESSION['idUser']);

$_SESSION['invitation'] = $invitation['idUser'];
$_SESSION['CI']= $invitation['responsable'];
$_SESSION['idGroupe']= $invitation['idGroupe'];


$nom=recNomGroupe($invitation['idGroupe']);
$_SESSION['CGNom']=$nom['nom'];

$idGroupe = recGroupe($_SESSION['idUser']);
$_SESSION['nbEG'] = sizeof($idGroupe);
for($i=0; $i<$_SESSION['nbEG'];$i++){
  $idGroupe = $idGroupe[$i][0];
  $idEvenement[$i] = recEvenementDansGroupeEvenement($idGroupe);
  $idEven = $idEvenement[$i][0];
}

$_SESSION['EG'] = $idEven;



header('Location: info?successAjouMembreGroupe');
}
else{
$invitation = recInvitation($_SESSION['idUser']);

$_SESSION['invitation'] = $invitation['idUser'];

$idGroupe = recGroupe($_SESSION['idUser']);
$_SESSION['nbEG'] = sizeof($idGroupe);
for($i=0; $i<$_SESSION['nbEG'];$i++){
  $idGroupe = $idGroupe[$i][0];
  $idEvenement[$i] = recEvenementDansGroupeEvenement($idGroupe);
  $idEven = $idEvenement[$i][0];
}

$_SESSION['EG'] = $idEven;





header('Location: info.php');
}
 ?>
