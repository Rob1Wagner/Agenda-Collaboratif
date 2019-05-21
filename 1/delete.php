<?php
require 'src/date/bootstrap.php';
require 'views/header.php';
require 'src/date/EventValidator.php';
require 'src/date/Event.php';
require 'src/date/Events.php';
$bdd = bdd();



  $events =new App\date\Events($bdd);
  $id =$_POST['id'];

  $id2=$_SESSION['idUser'];


  $events->delete2($id,$id2);
  $events->delete($id);

  header('Location: /1/agenda?successSup=1');

?>
