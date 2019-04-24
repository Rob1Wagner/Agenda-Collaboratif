<?php

  require 'RequeteGroupe.php';
  $_SESSION['CG']= $_POST['choixGroupe'];
  $_SESSION['CU']=$_POST['choixUser'];
  $_SESSION['CI']=$_POST['choixImportance'];
  $nom=recNomGroupe($_SESSION['CG']);
  $_SESSION['CGNom']=$nom['nom'];

  if($_SESSION['idUser']!=$_SESSION['CU']){
    inserInvitation($_SESSION['CU'],$_SESSION['CG'],$_SESSION['CI']);
    header('Location: /1/agenda.php');
  }
  else{
    inserMembreGroupe($_SESSION['CU'],$_SESSION['CG'],$_SESSION['CI']);
    header('Location: /1/agenda?successAjouMembreGroupe=1');
  }
?>
