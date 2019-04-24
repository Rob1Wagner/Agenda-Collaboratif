<?php
  require 'RequeteGroupe.php';
  $nomGroupe = $_POST["groupes"];
  suppGroupe($nomGroupe);


  header('Location: ReqGroupe?successSuppGroupe=1');
?>
