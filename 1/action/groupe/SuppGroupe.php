<?php
  require 'RequeteGroupe.php';
  $idGroupe = $_POST["groupes"];

  suppGroupe($idGroupe);


  header('Location: ReqGroupe?successSuppGroupe=1');
?>
