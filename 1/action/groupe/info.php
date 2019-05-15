<?php
require '../../views/header.php';
require '../../src/date/bootstrap.php';

 ?>

<h3 class=" ml-2"> Mes Invitations </h3>
<div>

  <form action="invitation.php" method="post">
  	<button type="submit" class="btn btn-secondary mb-5 ml-2 mt-2" data-toggle="button" aria-pressed="false" autocomplete="off">voir mes invitations</button>
  </form>

  <?php if ($_SESSION['idUser']==$_SESSION['invitation']): ?>
  	<div class="calendar">
  		<?php if((isset($_GET['successAjouMembreGroupe'])) || (isset($_GET['deux'])) ): ?>
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

  <?php if ($_SESSION['idUser']==$_SESSION['invitationUser']): ?>
  	<div class="calendar">
      <?php if((isset($_GET['successAjoutMembrEven'])) || (isset($_GET['deux'])) ): ?>
  			<div class= "container">
  				<div class="alert alert-success">
  					<form action="../evenement/AccepterInvitationEvenement.php" method="post">
    					<div>
  							<label for="accepter">vous avez une invitation à l'evenement <?php	echo $_SESSION['nomEvnemenemt']; ?></label><br>
      					<input type="radio" name="invitationEvenement" value="1">Accepter<br>
  							<input type="radio" name="invitationEvenement" value="0">Refuser<br>
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
        <div class="alert alert-success">
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




  <h3 class=" ml-2"> Mes Groupes </h3>
  <form action="RecMesGroupes.php" method="post">
  	<button type="submit" class="btn btn-secondary mt-2 mb-3 ml-2" data-toggle="button" aria-pressed="false" autocomplete="off">voir mes groupes</button>
  </form>
  <?php if(!empty($_SESSION['mesGroupes'])): ?>
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th class="table-dark" scope="col">Nom de Groupe</th>
          <th class="table-dark" scope="col">Membres de groupe</th>
          <th class="table-dark" scope="col">Evenements de groupe</th>
          <th class="table-dark" scope="col">Createur</th>


        </tr>
      </thead>
      <?php
        $groupes = $_SESSION['mesGroupes'];
        $membres = $_SESSION['mesMembres'];
        $evenements = $_SESSION['mesEvenements'];
        $createurs = $_SESSION['createurs'];




       for($i=0; $i<$_SESSION['nbMesGroupes']; $i++):
      ?>
        <tbody>
          <tr >
            <th scope="row"><?php echo $i+1; ?></th>
            <td class="table-success"><?php echo $groupes[$i]['nom']; ?></td>
            <td class="table-danger">
              <?php
                if($membres!=null){
                  for($j=0; $j<sizeof($membres[$i]); $j++){
                           echo " , ";
                           echo $membres[$i][$j]['nom'];
                  }
                }
              ?>
            </td>
            <td class="table-primary">
              <?php
                if($evenements!=null){
                  for($j=0; $j<sizeof($evenements[$i]); $j++){
                           echo " , ";
                           echo $evenements[$i][$j]['nom'];
                  }
                }
              ?>
            </td>
            <td class="table-warning"><?php echo $createurs[$i][0]; ?></td>
          </tr>
        </tbody>
      <?php endfor; ?>
    </table>
  <?php endif; ?>
</div>
<br>


<h3 class=" ml-2"> Mes Messages </h3>
<form action="../user/ReqMesMessages.php" method="post">
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
<?php endif; ?>
