<?php
require 'RequeteEvenement.php';
$id = $_POST['EvenementChoisi'];

SuppEvenementEntreDeux($id);
header('Location: ../groupe/invitation?successEvenSupp');

?>
