<?php
  include_once "db.php";

  function insererUtilisateur($prenomUtilisateur, $nomUtilisateur, $mdpUtilisateur , $mailUtilisateur){
  global $c;

  $r= "INSERT INTO  `user` (`prenom` ,`nom` ,`mdp` ,`mail` ,`admin`)

                  VALUES ('$prenomUtilisateur',  '$nomUtilisateur',  '$mdpUtilisateur',  '$mailUtilisateur', 0 );"; 
                  /* 0 -> user et 1 -> admin donc admin=0 par défaut */
  return mysqli_query($c, $r);
 }


 function selectAllUsers(){
  global $c;
  $r="SELECT `idUser`, `prenom`, `nom`, `mdp`, `mail`, `admin` FROM `user` ";
  return mysqli_query($c, $r) ;
 }


?>
