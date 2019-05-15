<?php
  require 'RequeteEvenement.php';
  if($_POST['invitationEvenement']){


    var_dump($_SESSION['invitationUser']);
    var_dump($_SESSION['invitationEvenement']);
    var_dump($_SESSION['CIEvenement']);


    if(inserMembreUserEvenement($_SESSION['invitationUser'],$_SESSION['invitationEvenement'],$_SESSION['CIEvenement'])){
      suppInvitationEvenement($_SESSION['invitationEvenement']);


      header('Location: ../groupe/invitation?okMembre=1');
    }

  }
  else{
    if($_SESSION['CIEvenement']){
      suppInvitationEvenement($_SESSION['invitationEvenement']);
      suppEvenementResponsable($_SESSION['invitationEvenement']);


      header('Location: ../groupe/invitation?noMembre=0');
    }
    else{
      suppInvitationEvenement($_SESSION['idUser']);

      header('Location: ../groupe/invitation?noMembre=0');
    }
  }
   ?>
