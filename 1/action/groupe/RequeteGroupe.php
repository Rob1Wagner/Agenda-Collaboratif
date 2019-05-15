<?php
require '../../src/date/bootstrap.php';
session_start();

function creerGroupe($nom){
  $bdd= bdd();
  $createur=$_SESSION['idUser'];
  $admin=$_SESSION['admin'];

  $sql='INSERT INTO  `groupe` (`nom`,`createur`,`admin`)    VALUES (?,?,?);';
  $statements= $bdd->prepare($sql);
  $result = $statements->execute([$nom,$createur,$admin]);
  return $result;
}

function suppGroupe($id){
  $bdd= bdd();
  $sql ="DELETE FROM evenementgroupe WHERE idGroupe = $id";
  $statements = $bdd->query($sql);

  $sql ="DELETE FROM invitationgroupe WHERE idGroupe = $id";
  $statements = $bdd->query($sql);

  $sql ="DELETE FROM usergroupe WHERE idGroupe = $id";
  $statements = $bdd->query($sql);

  $sql ="DELETE FROM groupe WHERE id = $id";
  $statements = $bdd->query($sql);

  /*var_dump($bdd->errorInfo());
		exit;*/
  return $statements;
}

function suppGroupeResponsable($id){
  $bdd= bdd();
  $sql ="DELETE FROM usergroupe WHERE idGroupe = '$id'";
  $statements = $bdd->query($sql);
  /*var_dump($bdd->errorInfo());
		exit;*/
  return $statements;
}

function inserMembreGroupe($user,$groupe,$importance){
  $bdd= bdd();
  $sql="INSERT INTO  usergroupe (`idUser`,`idGroupe`,`responsable`)   VALUES (?,?,?)";
  $statements= $bdd->prepare($sql);
  $result = $statements->execute([$user,
                                  $groupe,
                                  $importance
                                ]);
  return $result;
}

function recNomGroupe($id){
  $bdd= bdd();
  $sql= "SELECT nom FROM groupe WHERE id = $id ";
  $statements = $bdd->query($sql);
  $resultats = $statements->fetch();

  return $resultats;
}

function inserInvitation($user,$groupe,$importance){
  $bdd= bdd();
  $sql='INSERT INTO  `invitationgroupe` (`idUser`,`idGroupe`,`responsable`)   VALUES (?,?,?);';
  $statements= $bdd->prepare($sql);
  $result = $statements->execute([$user,
                                  $groupe,
                                  $importance
                                  ]);
  return $result;
}

function recInvitation($id){
  $bdd= bdd();
  $sql= "SELECT * FROM invitationgroupe WHERE idUser = $id ";
  $statements = $bdd->query($sql);
  $resultats = $statements->fetch();
  return $resultats;
}

function supInvitation($id){
  $bdd=bdd();
  $sql= "DELETE FROM invitationgroupe WHERE idGroupe= $id";
  $statements = $bdd->query($sql);
  return $statements;
}

function recGroupe($id){
  $bdd= bdd();
  $sql= "SELECT DISTINCT idGroupe FROM usergroupe WHERE idUser = $id ";
  $statements = $bdd->query($sql);
  $resultats = $statements->fetchALL();
  return $resultats;
}

function recMembreDansGroupe($id){
  $bdd= bdd();
  $sql= "SELECT DISTINCT idUser FROM usergroupe WHERE idGroupe = $id ";
  $statements = $bdd->query($sql);
  $resultats = $statements->fetchALL();
  return $resultats;
}

function recNomMembre($id){
  $bdd= bdd();
  $sql= "SELECT nom FROM user WHERE id = $id ";
  $statements = $bdd->query($sql);
  $resultats = $statements->fetch();
  return $resultats;
}

function inserEvenementGroupe($evenement,$groupe){
  $bdd= bdd();
  $sql='INSERT INTO  `evenementgroupe` (`idEvenement`,`idGroupe`)   VALUES (?,?);';
  $statements= $bdd->prepare($sql);
  $result = $statements->execute([$evenement,
                                  $groupe
                                  ]);
  return $result;
}

function recEvenementDansGroupeEvenement($id){
  $bdd= bdd();
  $sql= "SELECT idEvenement FROM evenementgroupe WHERE idGroupe = $id ";
  $statements = $bdd->query($sql);
  $resultats = $statements->fetchALL();
  return $resultats;
}

function recNomEvenement($id){
  $bdd= bdd();
  $sql= "SELECT nom FROM evenement WHERE id = $id ";
  $statements = $bdd->query($sql);
  $resultats = $statements->fetch();
  return $resultats;
}

function recIdGroupe($nom){
  $bdd= bdd();
  $sql= "SELECT id FROM groupe WHERE nom = '$nom' ";
  $statements = $bdd->query($sql);
  $resultats = $statements->fetch();
  return $resultats;
}

function recCreateurGroupe($id){
  $bdd= bdd();
  $sql= "SELECT createur FROM groupe WHERE id = $id ";
  $statements = $bdd->query($sql);
  $resultats = $statements->fetchALL();
  return $resultats;
}

function ReqUserEvenement($id){
  $bdd= bdd();
  $sql= "SELECT idEvenement FROM userevenement WHERE idUser = $id ";
  $statements = $bdd->query($sql);
  $resultats = $statements->fetchALL();

  return $resultats;
}

function ReqInvitaionEvenement($id){
  $bdd= bdd();
  $sql= "SELECT * FROM invitationevenement WHERE idUser = $id ";
  $statements = $bdd->query($sql);
  $resultats = $statements->fetch();

  return $resultats;
}

function SortirGroupe($id){
  $bdd=bdd();
  $sql= "DELETE FROM usergroupe WHERE idGroupe= $id";
  $statements = $bdd->query($sql);
  return $statements;
}
 ?>
