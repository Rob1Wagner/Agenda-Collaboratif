<?php

  require 'RequeteGroupe.php';
  $_SESSION['CG']= $_POST['choixGroupe'];
  $_SESSION['CU']=$_POST['choixUser'];
  $_SESSION['CI']=$_POST['choixImportance'];
  $nom=recNomGroupe($_SESSION['CG']);
  $_SESSION['CGNom']=$nom['nom'];

  if($_SESSION['idUser']!=$_SESSION['CU']){
    inserInvitation($_SESSION['CU'],$_SESSION['CG'],$_SESSION['CI']);
    $_SESSION['CUNom'] = recNomMembre($_SESSION['CU']); 
    header('Location: ../user/chat?successAjoutMembreGroupe=1');
  }
  else{
    inserMembreGroupe($_SESSION['CU'],$_SESSION['CG'],$_SESSION['CI']);
    header('Location: /1/agenda?successAjouMembreGroupe=1');
  }
?>
