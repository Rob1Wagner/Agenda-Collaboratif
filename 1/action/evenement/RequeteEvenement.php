<?php
require '../../src/date/bootstrap.php';
session_start();

function SuppEvenementEntreDeux($id){
  $bdd= bdd();

  $sql ="DELETE FROM evenement WHERE id = $id";
  $statements = $bdd->query($sql);


  $sql ="DELETE FROM userevenement WHERE idEvenement = $id";
  $statements = $bdd->query($sql);

  $sql ="DELETE FROM evenementgroupe WHERE idEvenement = $id";
  $statements = $bdd->query($sql);


  /*var_dump($bdd->errorInfo());
		exit;*/
  return $statements;
}



function AssocieUserEvenement($evenement,$user,$importance){
  $bdd= bdd();
  $sql="INSERT INTO  invitationevenement (`idUser`,`idEvenement`,`importance`)   VALUES (?,?,?)";
  $statements= $bdd->prepare($sql);
  $result = $statements->execute([$evenement,
                                  $user,
                                  $importance
                                ]);
  return $result;
}

function suppEvenementResponsable($id){
  $bdd= bdd();
  $sql ="DELETE FROM evenement WHERE id = $id";
  $statements = $bdd->query($sql);
  /*var_dump($bdd->errorInfo());
		exit;*/
  return $statements;
}

function suppInvitationEvenement($id){
  $bdd= bdd();
  $sql ="DELETE FROM invitationevenement WHERE idEvenement = $id";
  $statements = $bdd->query($sql);

  /*var_dump($bdd->errorInfo());
		exit;*/
  return $statements;
}

function inserMembreUserEvenement($user,$evenement,$importance){
  $bdd= bdd();
  $sql="INSERT INTO  userevenement (`idEvenement`,`idUser`,`importance`)   VALUES (?,?,?)";
  $statements= $bdd->prepare($sql);
  $result = $statements->execute([$evenement,
                                  $user,
                                  $importance
                                ]);
  return $result;
}
/*function ReqUserEvenement($id){
  $bdd= bdd();
  $sql= "SELECT idEvenement FROM userevenement WHERE idUser = $id ";
  $statements = $bdd->query($sql);
  $resultats = $statements->fetch();

  return $resultats;
}*/

function reqNomUser($id){
  $bdd= bdd();
  $sql= "SELECT nom FROM user WHERE id = $id ";
  $statements = $bdd->query($sql);
  $resultats = $statements->fetch();

  return $resultats;
}
?>
