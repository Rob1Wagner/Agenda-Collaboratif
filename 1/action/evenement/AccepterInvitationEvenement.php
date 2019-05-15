<?php
  require 'RequeteEvenement.php';
  if($_POST['invitationEvenement']){


    var_dump($_SESSION['invitationUser']);
    var_dump($_SESSION['invitationEvenement']);
    var_dump($_SESSION['CIEvenement']);


    if(inserMembreUserEvenement($_SESSION['invitationUser'],$_SESSION['invitationEvenement'],$_SESSION['CIEvenement'])){
      suppInvitationEvenement($_SESSION['invitationUser']);
      $_SESSION['affichage'] = $_SESSION['EvenementAssocie'];

      header('Location: ../groupe/info?okMembre=1');
    }

  }
  else{
    if($_SESSION['CIEvenement']){
      suppInvitationEvenement($_SESSION['invitationUser']);
      suppEvenementResponsable($_SESSION['invitationEvenement']);


      header('Location: ../groupe/info?noMembre=0');
    }
    else{
      suppInvitationEvenement($_SESSION['idUser']);

      header('Location: ../groupe/info?noMembre=0');
    }
  }
   ?>
