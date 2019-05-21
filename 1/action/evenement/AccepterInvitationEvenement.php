<?php
  require 'RequeteEvenement.php';
  if($_POST['invitationEvenement']){
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
      suppInvitationEvenement($_SESSION['invitationEvenement']);
      header('Location: ../groupe/invitation?noMembre=0');
    }
  }
?>
