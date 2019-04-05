<?php
  require 'RequeteGroupe.php';
if(recGroupe($_SESSION['idUser'])){
  $groupes = recGroupe($_SESSION['idUser']);

  $_SESSION['nbMesGroupes'] = sizeof($groupes);
  for ($i=0; $i<$_SESSION['nbMesGroupes']; $i++){
    $gr=$groupes[$i][0];
    $nom[$i] = recNomGroupe($gr);
  }
  $_SESSION['mesGroupes'] = $nom;


  header('Location: info.php');
}
else{
  header('Location: info.php');
}
 ?>
