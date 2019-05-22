<?php
require 'RequeteGroupe.php';

$m=0;
$idGroupe = recGroupe($_SESSION['idUser']);


/* récupérer les evenements liés à l'utilisateur connécté */
if(ReqUserEvenement($_SESSION['idUser'])){
  $evenements = ReqUserEvenement($_SESSION['idUser']);

  $_SESSION['EvenementAssocie']=$evenements;
  $_SESSION['affichage']=$_SESSION['EvenementAssocie'];
}


/* récupérer les invitations liées à l'utilisateur connécté */
if(ReqInvitaionEvenement($_SESSION['idUser'])){
  $invitationEvenement = ReqInvitaionEvenement($_SESSION['idUser']) ;
  $_SESSION['invitationEvenement'] = $invitationEvenement['idEvenement'];
  $_SESSION['CIEvenement']= $invitationEvenement['importance'];
  $_SESSION['invitationUser']= $invitationEvenement['idUser'];

  $nom=recNomEvenement($invitationEvenement['idEvenement']);
  $_SESSION['nomEvnemenemt']=$nom['nom'];
}else{
  $_SESSION['invitationEvenement'] = null;  
}

if (!(ReqInvitaionEvenement($_SESSION['idUser'])) && !(ReqUserEvenement($_SESSION['idUser']))){
  $_SESSION['EvenementAssocie'] = null;
}


if(recInvitation($_SESSION['idUser'])){
  $invitation = recInvitation($_SESSION['idUser']);
  $_SESSION['invitation'] = $invitation['idUser'];
  $_SESSION['CI']= $invitation['responsable'];
  $_SESSION['idGroupe']= $invitation['idGroupe'];

  $nom=recNomGroupe($invitation['idGroupe']);
  $_SESSION['CGNom']=$nom['nom'];
  $idEven=array();
  if($idGroupe!=null){
    for($m;$m<sizeof($idGroupe);$m++){
      $_SESSION['nbEG'] = sizeof(recEvenementDansGroupeEvenement($idGroupe[$m][0]));
      for($i=0; $i<$_SESSION['nbEG'];$i++){
        $idEvenement = recEvenementDansGroupeEvenement($idGroupe[$m][0]);
        array_push($idEven, $idEvenement[$i]['idEvenement']);
      }
    }
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
  if($idGroupe!=null){
    for($m;$m<sizeof($idGroupe);$m++){
      $_SESSION['nbEG'] = sizeof(recEvenementDansGroupeEvenement($idGroupe[$m][0]));
      for($i=0; $i<$_SESSION['nbEG'];$i++){
        $idEvenement = recEvenementDansGroupeEvenement($idGroupe[$m][0]);
        array_push($idEven, $idEvenement[$i]['idEvenement']);
      }
    }
  }
  $_SESSION['EG'] = $idEven;


  if (ReqInvitaionEvenement($_SESSION['idUser'])){
    header('Location: info?successAjoutMembrEven');
  }else{
    header('Location: info.php');
  }
}


?>
