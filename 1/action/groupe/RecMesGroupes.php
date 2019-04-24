<?php
  require 'RequeteGroupe.php';
if(recGroupe($_SESSION['idUser'])){
  $groupes = recGroupe($_SESSION['idUser']);
  $_SESSION['nbMesGroupes'] = sizeof($groupes);

  
  for ($i=0; $i<$_SESSION['nbMesGroupes']; $i++){
    $gr=$groupes[$i][0];
    $nom[$i] = recNomGroupe($gr);

    for ($j=0; $j<sizeof(recMembreDansGroupe($gr)); $j++){
      $idmembres = recMembreDansGroupe($gr);

      $id = $idmembres[$j][0];
      $membres[$i][$j] = recNomMembre($id);
    }
    for ($m=0; $m<sizeof(recEvenementDansGroupeEvenement($gr)); $m++){
      $idevenement = recEvenementDansGroupeEvenement($gr);
      $id = $idevenement[$m][0];
      $evenements[$i][$m] = recNomEvenement($id);
    }
  }

  $_SESSION['mesGroupes'] = $nom;
  $_SESSION['mesEvenements'] = $evenements;
  $_SESSION['mesMembres'] = $membres;

  header('Location: info.php');
}
else{
  header('Location: info.php');
}
 ?>
