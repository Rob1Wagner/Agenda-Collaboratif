<?php
  require 'RequeteGroupe.php';
  $nomGroupe = $_POST["groupes"];

  $idGroupe = recIdGroupe($nomGroupe);

  SortirGroupe($idGroupe['id']);

  header('Location: RecMesGroupes.php');
?>
