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

 <?php if(isset($_GET['successAjouMembreGroupe'])): ?>
   <div class= "container">
     <div class="alert alert-success">
       Le membre a bien été ajouter dans le groupe
     </div>
   </div>
 <?php endif; ?>

 <?php if(isset($_GET['successAjouGroupe'])): ?>
   <div class= "container">
     <div class="alert alert-success">
       Le groupe a bien été créé
     </div>
   </div>
 <?php endif; ?>


</div>

 <div class="container">
   <h1>Créer un groupe</h1>

   <form action="AjouGroupe.php" method="post" class="form">
     <div class="row">
       <div class="col-sm-12">
         <div class="form-group">
           <label for="name">Nom</label>
           <input id="name" type="text" required class="form-control" name="nameGroupeAjou">
         </div>
       </div>
     </div>

       <div class="row">
        <div class="form-group">
          <input type="submit" name="action" value="Créer" class="btn btn-outline-danger"/>
        </div>
      </div>
   </form>
 </div>


 <div class="container">
   <h1>Supprimer un groupe</h1>

   <form action="SuppGroupe.php" method="post" class="form">
     <div class="row">
       <div class="col-sm-6 ">
         <div class="form-group">
           <label for="name">Nom</label>
         </br>

           <select name="groupes" class="col-sm-6">
             <?php
              $id = $_SESSION["idUser"];
              $sql="SELECT DISTINCT nom FROM groupe WHERE createur = $id ";
              $statements = $bdd->query($sql);
              while($row= $statements->fetch()){
                  echo '<option value="'.$row['0'].'">'.$row['0'].'</option>';
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



 <div class="container">
   <h1>Ajouter un membre</h1>

   <form action ="AjoutMembreGroupe.php" method="post" class="form">
     <div class="row">
       <div class="col-sm-6">
         <div class="form-group">
           <label for="name">User</label>
         </br>

           <select name="choixUser" class="col-sm-6">
             <?php

              $sql='SELECT id,prenom FROM user';

              $statements = $bdd->query($sql);
              while($row= $statements->fetch()){
                  echo '<option value="'.$row['id'].'">'.$row['prenom'].'</option>';
              }
              ?>
            </select>
           <!--<input id="name" type="text" required class="form-control" name="nameGroupeSupp">-->
         </div>
       </div>


     <div class="col-sm-6">
       <div class="form-group">
         <label for="name">Groupe</label>
       </br>

         <select name="choixGroupe" class="col-sm-6">
           <?php

            $sql="SELECT * FROM groupe WHERE createur = $id";
            $statements = $bdd->query($sql);
            while($row= $statements->fetch()){
                echo '<option value="'.$row['id'].'">'.$row['nom'].'</option>';

            }
            ?>
          </select>

         <!--<input id="name" type="text" required class="form-control" name="nameGroupeSupp">-->
       </div>
     </div>

     <div class="col-sm-6">
       <div class="form-group">
         <label for="name">Importance</label>
       </br>

         <select name="choixImportance" class="col-sm-6">
           <option value="1">Important</option>
           <option value="0">Secondaire</option>
          </select>

         <!--<input id="name" type="text" required class="form-control" name="nameGroupeSupp">-->
       </div>
     </div>
   </div>


       <div class="row">
        <div class="form-group">
          <input type="submit" name="action" value="Ajouter" class="btn btn-outline-danger"/>
        </div>
      </div>
   </form>
 </div>


 <div class="container">
   <h1>Associer un groupe à un evenement</h1>

   <form action ="AssocieGroupeEvenement.php" method="post" class="form">
     <div class="row">
       <div class="col-sm-6">
         <div class="form-group">
           <label for="name">Evenement</label>
         </br>

           <select name="choixEvenement" class="col-sm-6">
             <?php

              $sql='SELECT id,nom FROM evenement';
              $statements = $bdd->query($sql);
              while($row= $statements->fetch()){
                  echo '<option value="'.$row['id'].'">'.$row['nom'].'</option>';
              }
              ?>
            </select>
           <!--<input id="name" type="text" required class="form-control" name="nameGroupeSupp">-->
         </div>
       </div>


     <div class="col-sm-6">
       <div class="form-group">
         <label for="name">Groupe</label>
       </br>

         <select name="choixGroupe" class="col-sm-6">
           <?php

            $sql="SELECT * FROM groupe WHERE createur = $id";
            $statements = $bdd->query($sql);
            while($row= $statements->fetch()){
                echo '<option value="'.$row['id'].'">'.$row['nom'].'</option>';

            }
            ?>
          </select>

         <!--<input id="name" type="text" required class="form-control" name="nameGroupeSupp">-->
       </div>
     </div>
   </div>


       <div class="row">
        <div class="form-group">
          <input type="submit" name="action" value="Ajouter" class="btn btn-outline-danger"/>
        </div>
      </div>
   </form>
 </div>



<?php /*<div class="col-sm-6">
   <div class="form-group">
     <label for="name">Groupe</label>

     <input id="name" type="text" required class="form-control" name="nameGroupeSupp">
   </div>
 </div>
</div>*/ ?>
