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


?>
