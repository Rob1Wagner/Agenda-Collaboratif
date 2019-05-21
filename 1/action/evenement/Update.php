<?php

require 'RequeteEvenement.php';

  $id =$_POST['id'];
  $nom = $_POST['name'];
  $debut = (DateTime::createFromFormat ('Y-m-d H:i', $_POST['dd'] . ' ' . $_POST['start'])->format('Y-m-d H:i:s'));
  $fin = (DateTime::createFromFormat ('Y-m-d H:i', $_POST['df'] . ' ' . $_POST['end'])->format('Y-m-d H:i:s'));
  $description = $_POST['description'];

  update($id,$nom,$description,$debut,$fin);


  header('Location: /1/agenda?successUpdate=1');


 ?>
