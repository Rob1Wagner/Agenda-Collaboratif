<?php
require 'RequeteEvenement.php';
if(isset($_POST['modif'])){
header('Location: ../../event.php?id='.$_POST['EvenementChoisi']);
}else{
$id = $_POST['EvenementChoisi'];
SuppEvenementEntreDeux($id);
header('Location: ../groupe/invitation?successEvenSupp');
}
?>
