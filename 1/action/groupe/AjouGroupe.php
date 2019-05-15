<?php
  require 'RequeteGroupe.php';
  $nomGroupe = $_POST["nameGroupeAjou"];
  $_SESSION['admin'] = $_POST["choixAdmin"];
  $_SESSION['nomAdmin'] = recNomMembre($_SESSION['admin']);
  creerGroupe($nomGroupe);
  header('Location: ../user/chat.php?successAjouGroupe=1');
?>
