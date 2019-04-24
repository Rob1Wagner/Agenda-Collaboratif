<?php

require 'src/date/Events.php';
require 'src/date/bootstrap.php';


$bdd= bdd();



$events = new App\date\Events($bdd);
if (!isset($_GET['id']))
{
  header('location:404.php');
}

try
{
    $event = $events-> find($_GET['id']);
}
catch(\Exception $e)
{
  require '404.php';
  exit();
}
require 'views/header.php';

?>

<h1> <?= h($event['nom']); ?> </h1>

<ul>
  <li>Date de début   :     <?= (new DateTime($event['debut']))->format('d/m/Y'); ?></li>
  <li>Heure de début  :     <?= (new DateTime($event['debut']))->format('H:i'); ?></li><br>
  <li>Date de fin     :     <?= (new DateTime($event['fin']))->format('d/m/Y'); ?></li>
  <li>Heure de fin    :     <?= (new DateTime($event['fin']))->format('H:i'); ?></li><br>
  <li>Description     :<br> <?= h($event['description']); ?> </li>

</ul>

<form action="delete.php" method="post" class="form">
  <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
  <input type="submit" value="supprimer l'evenement">
</form>
<?php

require 'views/footer.php';
?>
