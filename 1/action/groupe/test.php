<?php
require 'RequeteGroupe.php';



$idGroupe = recGroupe($_SESSION['idUser']);
var_dump($idGroupe);



if(ReqUserEvenement($_SESSION['idUser'])){
  $evenements = ReqUserEvenement($_SESSION['idUser']);

  $_SESSION['EvenementAssocie']=$evenements;
  $_SESSION['affichage']=$_SESSION['EvenementAssocie'];
  var_dump($_SESSION['affichage']);


}else{
  $_SESSION['EvenementAssocie'] = null;
}

if(ReqInvitaionEvenement($_SESSION['idUser'])){
  $invitationEvenement = ReqInvitaionEvenement($_SESSION['idUser']) ;
  $_SESSION['invitationEvenement'] = $invitationEvenement['idEvenement'];
  $_SESSION['CIEvenement']= $invitationEvenement['importance'];
  $_SESSION['invitationUser']= $invitationEvenement['idUser'];




  $nom=recNomEvenement($invitationEvenement['idEvenement']);
  $_SESSION['nomEvnemenemt']=$nom['nom'];


}

if($idGroupe!=null){
  $_SESSION['nbEG'] = sizeof(recEvenementDansGroupeEvenement($idGroupe[0][0]));
}
if(recInvitation($_SESSION['idUser'])){
  $invitation = recInvitation($_SESSION['idUser']);
  $_SESSION['invitation'] = $invitation['idUser'];
  $_SESSION['CI']= $invitation['responsable'];
  $_SESSION['idGroupe']= $invitation['idGroupe'];

  $nom=recNomGroupe($invitation['idGroupe']);
  $_SESSION['CGNom']=$nom['nom'];
  $idEven=array();
  for($i=0; $i<$_SESSION['nbEG'];$i++){
    $idEvenement = recEvenementDansGroupeEvenement($idGroupe[0][0]);
    array_push($idEven, $idEvenement[$i]['idEvenement']);
  }
  $_SESSION['EG'] = $idEven;


  if($_SESSION['EvenementAssocie']!=null){
    header('Location: info?deux');
  }else{
    header('Location: info?successAjouMembreGroupe');
  }
}
else{

  $invitation = recInvitation($_SESSION['idUser']);

  $_SESSION['invitation'] = $invitation['idUser'];
  $idEven=array();
  for($i=0; $i<$_SESSION['nbEG'];$i++){
    $idEvenement = recEvenementDansGroupeEvenement($idGroupe[0][0]);
    array_push($idEven, $idEvenement[$i]['idEvenement']);

  }
  $_SESSION['EG'] = $idEven;


  if($_SESSION['EvenementAssocie']!=null){

    header('Location: info?successAjoutMembrEven');
  }else{
    header('Location: info.php');
  }
}


?>
