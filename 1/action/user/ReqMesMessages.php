<?php
  require 'RequeteUser.php';

  if(recMessage($_SESSION['idUser'])){
    $messages = recMessage($_SESSION['idUser']);
    $_SESSION['nbMesMessages'] = sizeof($messages);

    for ($i=0; $i<$_SESSION['nbMesMessages']; $i++){
      $ms=$messages;

      $nomExpi[$i] = recNomExpi($ms[$i]['expediteur']);
      $sujet[$i]= $ms[$i]['sujet'];
      $mesMessages[$i]= $ms[$i]['message'];
    }
    $_SESSION['mesNoms'] = $nomExpi;
    $_SESSION['mesSujets'] = $sujet;
    $_SESSION['mesMessages'] = $mesMessages;

    header('Location: ../groupe/info.php');
  }
  else{
    $_SESSION['mesNoms'] = null;
    $_SESSION['mesSujets'] = null;
    $_SESSION['mesMessages'] = null;
    header('Location: ../groupe/info.php');
  }
?>
