<?php
require "RequeteEvenement.php" ;


$evenement = $_POST['find'];
$_SESSION['find'] = $_POST['find'];
if(ReqEvent($evenement)){
  $idEvent = ReqEvent($evenement);
  $idEvent = $idEvent['id'];
  header('Location: ../../event.php?id='.$idEvent);
}else{
  header('Location: ../../agenda?eventNotFound');
}
 ?>
