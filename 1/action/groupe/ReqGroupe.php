<?php

require '../../views/header.php';
require '../../src/date/bootstrap.php';


$bdd=bdd();
/*<script type= "text/javascript" src="JsGroupe.js"></script>*/
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
       <div class="form-group col-sm-6">
         <label for="name">Admin</label>
          </br>
            <select name="choixAdmin" class="browser-default custom-select custom-select-lg mb-3">
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

           <select name="groupes"  class="browser-default custom-select custom-select-lg mb-3">
             <?php
              $id = $_SESSION["idUser"];
              $sql="SELECT DISTINCT * FROM groupe WHERE createur = $id ";
              $statements = $bdd->query($sql);
              while($row= $statements->fetch()){
                echo '<option value="'.$row['id'].'">'.$row['nom'].'</option>';
              }
              $sql="SELECT DISTINCT * FROM groupe WHERE admin = $id ";
              $statements = $bdd->query($sql);
              while($row= $statements->fetch()){
                  echo '
                  <option value="'.$row['id'].'">'.$row['nom'].'</option>';
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
   <h1>Quitter un groupe</h1>

   <form action="SortirGroupe.php" method="post" class="form">
     <div class="row">
       <div class="col-sm-6 ">
         <div class="form-group">
           <label for="name">Nom</label>
         </br>

           <select name="groupes"  class="browser-default custom-select custom-select-lg mb-3">
             <?php
              $groupes = $_SESSION['mesGroupes'];
              var_dump($groupes);
              $i=0;
              for($i=0;$i<sizeof($groupes);$i++){
                echo '<option value="'.$groupes[$i]['nom'].'">'.$groupes[$i]['nom'].'</option>';
              }

              ?>
            </select>

         </div>
       </div>
     </div>

       <div class="row">
        <div class="form-group">
          <input type="submit" name="action" value="Quitter" class="btn btn-outline-danger"/>
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

           <select name="choixUser" class="browser-default custom-select custom-select-lg mb-3">
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

         <select name="choixGroupe" class="browser-default custom-select custom-select-lg mb-3">
           <?php

            $sql="SELECT * FROM groupe WHERE createur = $id";
            $statements = $bdd->query($sql);
            while($row= $statements->fetch()){
                echo '<option value="'.$row['id'].'">'.$row['nom'].'</option>';

            }
            $sql="SELECT DISTINCT * FROM groupe WHERE admin = $id ";
            $statements = $bdd->query($sql);
            while($row= $statements->fetch()){
                echo '
                <option value="'.$row['id'].'">'.$row['nom'].'</option>';
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

         <select name="choixImportance" class="browser-default custom-select custom-select-lg mb-3">
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

         <select name="choixEvenement" class="browser-default custom-select custom-select-lg mb-3">
           <?php
           $id =$_SESSION['idUser'];
           $sql="SELECT id,nom FROM evenement WHERE createur = $id";
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

         <select name="choixGroupe" class="browser-default custom-select custom-select-lg mb-3">
           <?php

            $sql="SELECT * FROM groupe WHERE createur = $id";
            $statements = $bdd->query($sql);
            while($row= $statements->fetch()){
                echo '<option value="'.$row['id'].'">'.$row['nom'].'</option>';
            }
            $sql="SELECT DISTINCT * FROM groupe WHERE admin = $id ";
            $statements = $bdd->query($sql);
            while($row= $statements->fetch()){
                echo '
                <option value="'.$row['id'].'">'.$row['nom'].'</option>';
            }
            ?>
          </select>

         <!--<input id="name" type="text" required class="form-control" name="nameGroupeSupp">-->
       </div>
     </div>
   </div>


       <div class="row">
        <div class="form-group">
          <input type="submit" name="action" value="Associer" class="btn btn-outline-danger"/>
        </div>
      </div>
   </form>
 </div>
 <script type="text/javascript" src="JsGroupe.js">

 </script>


<?php
/*<div class="col-sm-6">
   <div class="form-group">
     <label for="name">Groupe</label>

     <input id="name" type="text" required class="form-control" name="nameGroupeSupp">
   </div>
 </div>
</div>*/?>
