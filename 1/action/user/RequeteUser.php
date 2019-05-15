<?php
require '../../src/date/bootstrap.php';
require '../../views/header.php';



$bdd= bdd();

  function insererUtilisateur($prenomUtilisateur, $nomUtilisateur, $mdpUtilisateur , $mailUtilisateur){

    $bdd= bdd();
  $sql='INSERT INTO  `user` (`prenom` ,`nom` ,`mdp` ,`mail`)

        VALUES (?,  ?,  ?,  ?);';
  $statements= $bdd->prepare($sql);

                  /* 0 -> user et 1 -> admin donc admin=0 par défaut */
  $result = $statements->execute([
                    $prenomUtilisateur,
                    $nomUtilisateur,
                    $mdpUtilisateur,
                    $mailUtilisateur,
                  ]);
  return $result;
 }


 function selectAllUsers(){
   $bdd= bdd();
  $sql="SELECT `id`, `prenom`, `nom`, `mdp`, `mail` FROM `user` ";

  $statements = $bdd->query($sql);
  return $statements ;
 }

function InserMessage($exp, $dest, $sujet, $message){
  $bdd= bdd();
  $sql='INSERT INTO  `message` (`expediteur`,`destinataire` ,`sujet` ,`message`) VALUES (?,  ?,  ?,  ?);';
  $statements= $bdd->prepare($sql);
  $result = $statements->execute([
                    $exp,
                    $dest,
                    $sujet,
                    $message,
                  ]);
  return $result;
}

function recMessage($id){
  $bdd= bdd();
  $sql= "SELECT DISTINCT * FROM message WHERE destinataire = $id ";
  $statements = $bdd->query($sql);
  $resultats = $statements->fetchALL();
  return $resultats;
}

function recNomExpi($id){
  $bdd= bdd();
  $sql= "SELECT DISTINCT nom FROM user WHERE id = $id ";
  $statements = $bdd->query($sql);
  $resultats = $statements->fetchALL();
  return $resultats;
}

function suppMessage($id){
  $bdd= bdd();
  $sql ="DELETE FROM message WHERE id = $id";
  $statements = $bdd->query($sql);
  return $statements;
}

?>
