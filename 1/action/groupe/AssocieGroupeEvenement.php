<?php
  require 'RequeteGroupe.php';

  $_SESSION['CG']= $_POST['choixGroupe'];
  $_SESSION['CE']=$_POST['choixEvenement'];

  inserEvenementGroupe($_SESSION['CE'],$_SESSION['CG']);
  header('Location: /1/agenda.php');
?>
