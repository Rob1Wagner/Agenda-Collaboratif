<?php
require '../../views/header.php';
require '../../src/date/bootstrap.php';
include '../user/functionMessages.php';
messagesLu($_SESSION['idUser']);
 ?>

<h3 class=" ml-2"> Mes Invitations </h3>
<div>

  <form action="invitation.php" method="post">
      <button type="submit" class="btn btn-secondary mb-5 ml-2 mt-2" data-toggle="button" aria-pressed="false" autocomplete="off">voir mes invitations <?php if((isset($_SESSION['invitationEvenement'])) || (isset($_SESSION['invitation'])) ): ?><span class="badge badge-danger"> Invitation </span> <?php endif; ?></button>
     
  </form>

  <?php if ($_SESSION['idUser']==$_SESSION['invitation']): ?>
  	<div class="calendar">
  		<?php if((isset($_GET['successAjouMembreGroupe'])) || (isset($_GET['deux'])) ): ?>
  			<div class= "container">
  				<div class="alert alert-warning">
  					<form action="AccpterMembre.php" method="post">
    					<div>
                <?php if(($_SESSION['CI']) == 1 ): ?>
      							<label for="accepter">Vous avez une invitation dans le groupe "<?php	echo $_SESSION['CGNom']; ?>".<br>
                    Vous êtes indispensable pour ce groupe, si vous refusez, le groupe sera supprimé</label><br>
          					<input type="radio" name="invitation" value="1"> Accepter<br>
      							<input type="radio" name="invitation" value="0"> Refuser<br>
                <?php endif; ?>
                <?php if(($_SESSION['CI']) == 0 ): ?>
      							<label for="accepter">Vous avez une invitation dans le groupe "<?php	echo $_SESSION['CGNom']; ?>".<br></label><br>
          					<input type="radio" name="invitation" value="1"> Accepter<br>
      							<input type="radio" name="invitation" value="0"> Refuser<br>
                <?php endif; ?>
    					</div>
    					<div>
      					<button type="submit"class="btn btn-secondary mt-2" >Répondre</button>
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
  				<div class="alert alert-info">
  					<form action="../evenement/AccepterInvitationEvenement.php" method="post">
    					<div>
                <?php if(($_SESSION['CIEvenement']) == 1 ): ?>
      						  <label for="accepter">Vous avez une invitation à l'événement "<?php	echo $_SESSION['nomEvnemenemt']; ?>".<br>
                    Vous êtes indispensable pour cet événement, si vous refusez, l'événement sera supprimé</label><br>
          					<input type="radio" name="invitationEvenement" value="1"> Accepter<br>
      							<input type="radio" name="invitationEvenement" value="0"> Refuser<br>
                <?php endif; ?>
                <?php if(($_SESSION['CIEvenement']) == 0 ): ?>
                  	<label for="accepter">Vous avez une invitation à l'événement "<?php	echo $_SESSION['nomEvnemenemt']; ?>".</label><br>
                    <input type="radio" name="invitationEvenement" value="1">Accepter<br>
      							<input type="radio" name="invitationEvenement" value="0">Refuser<br>
                <?php endif; ?>
    					</div>
    					<div>
      					<button type="submit"class="btn btn-secondary mt-2" >Répondre</button>
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
          Le membre a bien refusé l'invitation
        </div>
      </div>
    <?php endif; ?>
  </div>



  <h3 class=" ml-2"> Mes Groupes </h3>
  <form action="RecMesGroupes.php" method="post">
  	<button type="submit" class="btn btn-secondary mt-2 mb-3 ml-2" data-toggle="button" aria-pressed="false" autocomplete="off">Voir mes groupes</button>
  </form>
 
  <?php if(!empty($_SESSION['mesGroupes'])): ?>
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th class="table-dark" scope="col">Nom de Groupe</th>
          <th class="table-dark" scope="col">Membres de groupe</th>
          <th class="table-dark" scope="col">Evénements de groupe</th>
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
                if(isset($membres[$i])){
                  for($j=0; $j<sizeof($membres[$i]); $j++){
                           echo " , ";
                           echo $membres[$i][$j]['nom'];
                  }
                }
              ?>
            </td>
            <td class="table-primary">
              <?php
                if(isset($evenements[$i])){

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
<br>


<h3 class=" ml-2"> Mes Messages </h3>
<form action="../user/ReqMesMessages.php" method="post">
  
  <button type="submit" class="btn btn-secondary mb-5 ml-2 mt-2" data-toggle="button" aria-pressed="false" autocomplete="off">Voir mes messages <?php if(isset($_SESSION['messagesLu'])):  ?><span class="badge badge-warning"><?php echo ($_SESSION['messagesLu']) ?></span>
  <?php endif; ?> </button>

</form>
<?php if(!empty($_SESSION['mesMessages'])): ?>
  <table class="table table-striped table-hover ">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th class="table-dark" scope="col">Lu</th>
        <th class="table-dark" scope="col">De</th>
        <th class="table-dark" scope="col">Sujet</th>
        <th class="table-dark" scope="col">Message</th>
      </tr>
    </thead>
    <?php
      $idMessage=$_SESSION['idMessage'];
      $messagLu = $_SESSION['mesLu'];
      $messages = $_SESSION['mesMessages'];
      $nomExpi = $_SESSION['mesNoms'] ;
      $sujet = $_SESSION['mesSujets'] ;
      for($i=0; $i<$_SESSION['nbMesMessages']; $i++):
    ?>
    <tbody>
      <tr >
        <th scope="row"><?php echo $i+1; ?></th>
        <td class="table-warning"><?php if(!empty($messagLu[$i])):  ?>
          <form action="../user/changerEtatMessage.php" method="post">
           <input type="hidden" name="messageID" value="<?php echo $idMessage[$i]; ?>">
           <button type="submit" class="btn btn-outline-info btn-sm m-0 waves-effect" data-toggle="button" aria-pressed="false" autocomplete="off">NON LU</button>
          </form> <?php endif; ?></td>
        <td class="table-warning"><?php echo $nomExpi[$i][0]['nom']; ?></td>
        <td class="table-warning"><?php echo $sujet[$i]; ?></td>
        <td class="table-warning"><?php echo $messages[$i]; ?></td>
      </tr>
    </tbody>
      <?php endfor; ?>
  </table>
<?php endif; ?>
