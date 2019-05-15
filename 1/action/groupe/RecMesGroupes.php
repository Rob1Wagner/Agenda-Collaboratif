<?php
  require 'RequeteGroupe.php';
if(recGroupe($_SESSION['idUser'])){
  $groupes = recGroupe($_SESSION['idUser']);
  $_SESSION['nbMesGroupes'] = sizeof($groupes);


  for ($i=0; $i<$_SESSION['nbMesGroupes']; $i++){
    $gr=$groupes[$i][0];
    $nom[$i] = recNomGroupe($gr);
    $idCreateurs[$i]=recCreateurGroupe($gr);

    $createurs[$i]=recNomMembre($idCreateurs[$i][0]['createur']);

    for ($j=0; $j<sizeof(recMembreDansGroupe($gr)); $j++){
      $idmembres = recMembreDansGroupe($gr);

      $id = $idmembres[$j][0];
      $membres[$i][$j] = recNomMembre($id);

    for ($m=0; $m<sizeof(recEvenementDansGroupeEvenement($gr)); $m++){
      $idevenement = recEvenementDansGroupeEvenement($gr);
      $id = $idevenement[$m][0];
      $evenements[$i][$m] = recNomEvenement($id);
    }
  }
}

  $_SESSION['mesGroupes'] = $nom;
  $_SESSION['mesEvenements'] = $evenements;
  $_SESSION['mesMembres'] = $membres;
  $_SESSION['createurs'] = $createurs;


  header('Location: info.php');
}
else{
  $_SESSION['mesGroupes'] = null;
  $_SESSION['mesEvenements'] = null;
  $_SESSION['mesMembres'] = null;
  $_SESSION['createurs'] = null;
  header('Location: info.php');
}
 ?>
