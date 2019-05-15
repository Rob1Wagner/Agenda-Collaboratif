<?php
  require 'RequeteUser.php';
  $id = $_POST["messages"];

  suppMessage($id);

  header('Location: ReqMesMessages.php');
?>
