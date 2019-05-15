<?php
require 'src/date/bootstrap.php';
require 'views/header.php';
require 'src/date/EventValidator.php';
require 'src/date/Event.php';
require 'src/date/Events.php';
$bdd = bdd();
$data = [];


  $events =new App\date\Events($bdd);
  $id =$_POST['id'];
  dd($id);
  $events->delete($id);


  header('Location: /1/agenda?successSup=1');
  exit();

?>


<?php require 'views/footer.php';?>
