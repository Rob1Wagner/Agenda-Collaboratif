<?php
  require 'RequeteGroupe.php';
  if($_POST['invitation']){


    if(inserMembreGroupe($_SESSION['idUser'],$_SESSION['idGroupe'],$_SESSION['CI'])){
      supInvitation($_SESSION['idUser']);
    }
    header('Location: info?okMembre=1');
  }
  else{
    if($_SESSION['CI']){
      suppGroupeResponsable($_SESSION['idGroupe']);
      supInvitation($_SESSION['idGroupe']);
      header('Location: info?noMembre=0');
    }
    else{
      supInvitation($_SESSION['idGroupe']);
      header('Location: info?noMembre=0');
    }
  }
   ?>
