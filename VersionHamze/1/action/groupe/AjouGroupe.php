<?php
  require 'RequeteGroupe.php';
  $nomGroupe = $_POST["nameGroupeAjou"];
  creerGroupe($nomGroupe);
  header('Location: ReqGroupe?successAjouGroupe=1');
?>
