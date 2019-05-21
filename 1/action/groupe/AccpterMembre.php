<?php
  require 'RequeteGroupe.php';
  if($_POST['invitation']){

    if(inserMembreGroupe($_SESSION['idUser'],$_SESSION['idGroupe'],$_SESSION['CI'])){
      supInvitation($_SESSION['idGroupe']);
    }
    if (!(recInvitation($_SESSION['idUser']))) {
      $_SESSION['invitation']=null;
    }

    header('Location: info?okMembre=1');
  }
  else{
    if($_SESSION['CI']){
      suppGroupeResponsable($_SESSION['idGroupe']);
      supInvitation($_SESSION['idUser']);

      if (!(recInvitation($_SESSION['idUser']))) {
        $_SESSION['invitation']=null;
      }

      header('Location: info?noMembre=0');
    }
    else{
      supInvitation($_SESSION['idUser']);

      if (!(recInvitation($_SESSION['idUser']))) {
        $_SESSION['invitation']=null;
      }

      header('Location: info?noMembre=0');
    }
  }
   ?>
