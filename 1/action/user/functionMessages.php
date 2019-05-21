

<?php


function messagesLu($id){
    $bdd= bdd();
    $sql = "SELECT COUNT(lu) AS MessLu FROM message WHERE lu = 1 AND destinataire = $id";
    $statements = $bdd->query($sql);
    $resultats = $statements->fetch();
    if ($resultats['MessLu']>0) {
    $_SESSION['messagesLu'] = $resultats['MessLu'];
    }
    else{
    	$_SESSION['messagesLu'] = NULL;
    }
    return $resultats['MessLu'];
  }

  ?>