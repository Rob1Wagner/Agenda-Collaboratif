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
<br>

<h2> Modifier un evenement </h2>
<form action="action/evenement/Update.php" method="post" class="form">
  <div class="row">
    <div class="col-sm-12">
      <div class="form-group">
        <lable for="name">Titre</lable>
        <input id="name" type="text" required class="form-control" name="name" value="<?= h($event['nom']); ?>">

      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-6">
      <div class="form-group">
        <lable for="dd">Date de départ</lable>
        <input id="dd" type="date" required class="form-control" name="dd" value= <?= $event['debut'] ; ?> >
      </div>
    </div>
    <div class="col-sm-6">
      <div class="form-group">
        <lable for="df">Date de fin</lable>
        <input id="df" type="date" required class="form-control" name="df" value= <?=$event['fin'];?> >
      </div>
    </div>
  </div>

 <div class="row">
    <div class="col-sm-6">
      <div class="form-group">
        <lable for="start">Début</lable>
        <input id="start" type="time" required class="form-control" name="start" placeholder="HH:MM" value="<?=(new DateTime($event['debut']))->format('H:i');?>">
      </div>
    </div>
    <div class="col-sm-6">
      <div class="form-group">
        <lable for="end">Fin</lable>
        <input id="end" type="time" required class="form-control" name="end" placeholder="HH:MM" value="<?=(new DateTime($event['fin']))->format('H:i');?>">
      </div>
    </div>
  </div>

    <div class ="form-group">
      <lable for="description">Description</lable>
      <textarea name="description" id="description" class="form-control"><?=$event['description'];?></textarea>
    </div>

  </div>

  <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
  <input type="submit" value="Modifier l'événement">
</form>
</div>
<?php

require 'views/footer.php';
?>
