<?php

/* une fonction qui aide à débuger*/
function dd(...$vars)
{
  foreach($vars as $var)
  {
    echo '<pre>';
    print_r($var);
    echo '</pre>';
  }
}

/* la connexion à la base de données*/
function bdd()
{
  return new \PDO('mysql:host=localhost;dbname=l2_gr3', 'root' , '');
}

/* pour éviter les modifications du style au niveau de la base de données (nom,description)*/
function h($value)
{
  return htmlentities($value);
}

?>
