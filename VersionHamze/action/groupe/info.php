<?php
 require '../../views/header.php';

 ?>

<h3 class=" ml-2"> Mes Invitaion </h3>
<div>

  <form action="invitation.php" method="post">
  	<button type="submit" class="btn btn-secondary mb-5 ml-2 mt-2" data-toggle="button" aria-pressed="false" autocomplete="off">voir mes invitations</button>
  </form>

  <?php if ($_SESSION['idUser']==$_SESSION['invitation']): ?>
  	<div class="calendar">
  		<?php if(isset($_GET['successAjouMembreGroupe'])): ?>
  			<div class= "container">
  				<div class="alert alert-success">
  					<form action="AccpterMembre.php" method="post">
    					<div>
  							<label for="accepter">vous avez une invitation dans le groupe <?php	echo $_SESSION['CGNom']; ?></label><br>
      					<input type="radio" name="invitation" value="1">Accepter<br>
  							<input type="radio" name="invitation" value="0">Refuser<br>
    					</div>
    					<div>
      					<button type="submit"class="btn btn-secondary mt-2" >répondre</button>
    					</div>
  					</form>
  				</div>
  			</div>
  		<?php endif; ?>
  	</div>
  <?php endif; ?>

  <div class="calendar">
    <?php if(isset($_GET['okMembre'])): ?>
      <div class= "container">
        <div class="alert alert-danger">
          Le membre a bien été ajouté
        </div>
      </div>
    <?php endif; ?>

    <?php if(isset($_GET['noMembre'])): ?>
      <div class= "container">
        <div class="alert alert-danger">
          Le membre a bien réfusé l'inviation
        </div>
      </div>
    <?php endif; ?>
  </div>
</div>

<?php

 ?>
<div>

  <h3 class=" ml-2"> Mes Groupes </h3>
  <form action="RecMesGroupes.php" method="post">
  	<button type="submit" class="btn btn-secondary mt-2 mb-3 ml-2" data-toggle="button" aria-pressed="false" autocomplete="off">voir mes groupes</button>
  </form>
  <?php if(!empty($_SESSION['mesGroupes'])): ?>
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nom de Groupe</th>
        </tr>
      </thead>
      <?php
        $groupes = $_SESSION['mesGroupes'];
       /*while ($groupes):*/
       for($i=0; $i<$_SESSION['nbMesGroupes']; $i++):
      ?>
        <tbody>
          <tr>
            <th scope="row"><?php echo $i+1; ?></th>
            <td><?php echo $groupes[$i][0]; ?></td>
          </tr>
        </tbody>
      <?php endfor; ?>
    </table>
  <?php endif; ?>
</div>
