<?php
require 'RequeteEvenement.php';
$choixUser = $_POST['choixUser'];
$choixEvenement = $_POST['choixEvenement'];
$importance = $_POST['choixImportance'];

AssocieUserEvenement($choixUser,$choixEvenement,$importance);

$choixUser= reqNomUser($choixUser);

$_SESSION['user'] = $choixUser['nom'];


header('Location: ../user/chat?AssocieUserEvenement=1');
?>
