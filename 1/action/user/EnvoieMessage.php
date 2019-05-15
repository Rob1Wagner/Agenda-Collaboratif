<?php
  require 'RequeteUser.php';

$exp = $_SESSION['idUser'];
$dest = $_POST['choixUser'];
$sujet = $_POST['sujet'];
$message = $_POST['message'];


InserMessage($exp, $dest, $sujet, $message);
header('Location: ../../agenda?okMessage=1');
 ?>
