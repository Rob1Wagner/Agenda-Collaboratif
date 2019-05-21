

<?php
require '../../src/date/bootstrap.php';


function changerEtatMessage($idMessage){
 	$bdd= bdd();
 	$bdd->query("UPDATE `message` SET `lu` = NULL WHERE `message`.`id` = $idMessage;" ); 

 }

 	$idMessagePost = $_POST["messageID"];
 	changerEtatMessage($idMessagePost);

 	header('Location: ../user/ReqMesMessages.php');



  ?>