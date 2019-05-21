<?php
require '../../views/header.php';
require '../../src/date/bootstrap.php';
$bdd=bdd();
?>

<div class="calendar">

 <?php if(isset($_GET['successSuppGroupe'])): ?>
   <div class= "container">
     <div class="alert alert-danger">
       Le groupe a bien été supprimé
     </div>
   </div>
 <?php endif; ?>

 <?php if(isset($_GET['AssocieUserEvenement'])): ?>
   <div class= "container">
     <div class="alert alert-success">
       écrivez un message à <?php echo $_SESSION['user'] ?> en lui expliquant pourquoi vous l'avez associé à cet événement
     </div>
   </div>
 <?php endif; ?>

 <?php if(isset($_GET['successAjoutMembreGroupe'])): ?>
   <div class= "container">
     <div class="alert alert-success">
       écrivez un message a votre membre <?php echo $_SESSION['CUNom']['nom'] ?> en lui expliquant ces rôles et pourquoi vous l'avez choisi pour ce groupe
     </div>
   </div>
 <?php endif; ?>

 <?php if(isset($_GET['successAjouGroupe'])): ?>
   <div class= "container">
     <div class="alert alert-success">
       écrivez un message à votre admin <?php echo $_SESSION['nomAdmin']['nom'] ?> en lui expliquant ces rôles
     </div>
   </div>
 <?php endif; ?>


</div>

<div class="container">
  <h1>Gardez le contact !</h1>

  <form action ="EnvoieMessage.php" method="post" class="form">

      <div class="col-sm-3">
        <div class="form-group">
          <label for="name">A qui ?</label>
          </br>
            <select name="choixUser" class="browser-default custom-select custom-select-lg mb-3">
              <?php

               $sql='SELECT id,prenom FROM user';

               $statements = $bdd->query($sql);
               while($row= $statements->fetch()){
                   echo '<option value="'.$row['id'].'">'.$row['prenom'].'</option>';
               }
               ?>
            </select>
           </div>
         </div>


         <div class="row">
           <div class="col-sm-6">
             <div class="form-group">
               <label for="name">Sujet</label>
               <input id="name" type="text" required class="form-control" name="sujet">
             </div>
           </div>
         </div>

    <div class="col-sm-13">
      <div class="form-group">
        <label for="name">Ecrivez votre message</label>
        </br>
        <textarea name="message" id="description" class="form-control"></textarea>
      </div>
    </div>

      <div class="row">
       <div class="form-group">
         <input type="submit" name="action" value="Envoyer" class="btn btn-outline-danger"/>
       </div>
     </div>
  </form>
</div>

<div class="container">
<button class = "btn btn-indo" type = "button" data-toggle = "collapse" 
data-target = "#collapseSupMessage" aria-expanded = "false" 
aria-controls = "collapsewithbutton"><h3>Supprimer un message </h3>
</button>
<div id="collapseSupMessage" class="collapse">  

  <form action="SuppMessage.php" method="post" class="form">
    <div class="row">
      <div class="col-sm-3 ">
        <div class="form-group">
          <label for="name">Sujet</label>
        </br>

          <select name="messages"  class="browser-default custom-select custom-select-lg mb-3">
            <?php
             $id = $_SESSION["idUser"];
             $sql="SELECT DISTINCT * FROM message WHERE destinataire = $id ";
             $statements = $bdd->query($sql);
             while($row= $statements->fetch()){
               echo '<option value="'.$row['id'].'">'.$row['sujet'].'</option>';
             }
             ?>
           </select>

        </div>
      </div>
    </div>

      <div class="row">
       <div class="form-group">
         <input type="submit" name="action" value="Supprimer" class="btn btn-outline-danger"/>
       </div>
     </div>
  </form>
</div>
</div>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<?php /*<form action="ReqMesMessages.php" method="post">
  <button type="submit" class="btn btn-secondary mb-5 ml-2 mt-2" data-toggle="button" aria-pressed="false" autocomplete="off">voir mes messages</button>
</form>
<?php if(!empty($_SESSION['mesMessages'])): ?>
  <table class="table table-striped table-hover ">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th class="table-dark" scope="col">De</th>
        <th class="table-dark" scope="col">Sujet</th>
        <th class="table-dark" scope="col">Message</th>
      </tr>
    </thead>
    <?php
      $messages = $_SESSION['mesMessages'];
      $nomExpi = $_SESSION['mesNoms'] ;
      $sujet = $_SESSION['mesSujets'] ;
      for($i=0; $i<$_SESSION['nbMesMessages']; $i++):
    ?>
    <tbody>
      <tr >
        <th scope="row"><?php echo $i+1; ?></th>
        <td class="table-warning"><?php echo $nomExpi[$i][0]['nom']; ?></td>
        <td class="table-warning"><?php echo $sujet[$i]; ?></td>
        <td class="table-warning"><?php echo $messages[$i]; ?></td>
      </tr>
    </tbody>
      <?php endfor; ?>
  </table>
<?php endif; */?>
