<?php
require 'src/date/bootstrap.php';
require 'views/header.php';
require 'src/date/EventValidator.php';
require 'src/date/Event.php';
require 'src/date/Events.php';
$bdd = bdd();
$data = [];
if ($_SERVER['REQUEST_METHOD']==='POST'){
  $data =$_POST;
   $event = new App\date\Event();

   $event->setCreator($_SESSION['idUser']);
   $event->setName($data['name']);
   $event->setDescription($data['description']);
   $event->setStart(DateTime::createFromFormat ('Y-m-d H:i', $data['dd'] . ' ' . $data['start'])->format('Y-m-d H:i:s'));
   $event->setEnd(DateTime::createFromFormat   ('Y-m-d H:i', $data['df'] . ' ' . $data['end'])->format('Y-m-d H:i:s'));
   $event->setGroup($_POST['idGroupe']);

  $events =new App\date\Events($bdd);

  $events->create($event);


  header('Location: /1/agenda?success=1');


}
/*  $errors = [] ;
  $validator = new App\date\EventValidator();
  $errors = $validator->validates($_POST);
  if (empty($errors)){
    dd($errors);
  }
}
*/
?>

<div class="container">
  <h1>Ajouter un événement</h1>

  <form action="" method="post" class="form">
    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          <lable for="name">Titre</lable>
          <input id="name" type="text" required class="form-control" name="name" value="<?= isset($data['name']) ? h($data['name']) : '';?>">

        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <lable for="type">Type</lable>
        </br>

          <select name="type" class="col-sm-12">
            <option value="private">Private</option>
            <option value="public">Public</option>

           </select>
        </div>
      </div>
    </div>

   <div class="row">
    <?php /*  <div class="col-sm-6">
        <div class="form-group">
          <lable for="group">Groupe</lable>

        </br>

          <select name="idGroupe" class="col-sm-12">
            <?php
              $id = $_SESSION['idUser'];
              $sql="SELECT * FROM groupe WHERE createur = $id ";
              $statements = $bdd->query($sql);
              while($row= $statements->fetch()){
                echo '<option value="'.$row['id'].'">'.$row['nom'].'</option>';
              }
            ?>
           </select>
        </div>
      </div>*/ ?>

    </div>


    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          <lable for="start">Début</lable>
          <input id="start" type="time" required class="form-control" name="start" placeholder="HH:MM" value="<?= isset($data['start']) ? h($data['start']) : '';?>">
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <lable for="end">Fin</lable>
          <input id="end" type="time" required class="form-control" name="end" placeholder="HH:MM" value="<?= isset($data['end']) ? h($data['end']) : '';?>">
        </div>
      </div>
    </div>


    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          <lable for="dd">Date de départ</lable>
          <input id="dd" type="date" required class="form-control" name="dd" value="<?= isset($data['dd']) ? h($data['dd']) : '';?>">
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <lable for="df">Date de fin</lable>
          <input id="df" type="date" required class="form-control" name="df" value="<?= isset($data['df']) ? h($data['df']) : '';?>">
        </div>
      </div>
    </div>


      <div class ="form-group">
        <lable for="description">Description</lable>
        <textarea name="description" id="description" class="form-control"><?= isset($data['description']) ? h($data['description']) : '';?></textarea>
      </div>



      <div class="form-group">
        <button class="btn btn-outline-danger">Ajouter l'événement</button>
      </div>
    </div>
  </form>
</div>



<?php require 'views/footer.php';?>
