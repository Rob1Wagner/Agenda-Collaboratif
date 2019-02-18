




		<?php

		/*/index.php?month=<? $month->previousMonth()->month; ?>&year=<?= $month->previousMonth()->year; ?>*/
		require 'views/header.php';
		require 'src/date/Month.php';
		require 'src/date/Events.php';
		require 'src/date/bootstrap.php';
		$newmonth=1;
		$newyear =2019;
		$bdd= bdd();



			$events = new App\date\Events($bdd);
			$month = new App\date\Month($newmonth,$newyear);



			/*recupérer le nombre de semaines d'un mois*/
			$weeks = $month->getWeeks();

			/*cration de la variable $start selon le mois*/
			if ($newmonth==7 || $newmonth==4)
			{
				$start= $month->getFirstDay();
			}
			else
			{
				$start= $month->getFirstDay()->modify('last monday');
			}
			/* créer la variable $end selon le mois*/
			$end= (clone $start)->modify('+' . (6 + 7 * ($weeks - 1)) .'days');
			/* stocker les evenments entre deux date dans une variable */
			$events = $events->getEventsByDay($start,$end);


		?>

		<div class="d-flex flex-row align-items-center justify-content-between mx-sm-3">
			<h1><?= $month->toString(); ?></h1>
			<div>
					<a href="#" class="btn btn-primary">&lt;</a>
					<a href="..\2\index.php" class="btn btn-primary">&gt;</a>
			</div>
		</div>




		<table class="tab tab--<?= $weeks; ?>weeks">
			<?php for($i=0; $i < $weeks; $i++): ?>
				<tr>
					<?php
						foreach($month->days as $d=> $days):
							$date =(clone $start)->modify("+" . ($d + $i * 7) . "days");
							$eventsForDay= $events[$date->format('Y-m-d')] ?? [];
					?>
						<td class="<?=$month->chekDay($date) ? '' : 'overMonth'; ?>">
							<?php if($i==0): ?>
								<div class="weekDay">
									<?= $days; ?>
								</div>
							<?php endif; ?>

							<div class="dayNumber">
								<?=$date->format('d'); ?>
							</div>

							<?php foreach($eventsForDay as $event): ?>
								<div class="event">
									<?= (new DateTime($event['debut']))->format('H:i') ?> -
									 		<a href="/1/event.php?id=<?= $event['id'];?>"><?= h($event['nom']);?></a>
								</div>
							<?php endforeach; ?>

						</td>
					<?php endforeach; ?>
				</tr>
			<?php endfor;?>

		</table>



<?php

?>
<section>
	<h1>Bienvenue sur notre ... l'agenda collaboratif 2.0</h1>
	<form method="post" action="connexion.php">
		<h2>Connectez vous :</h2>
		<label for="mail">adresse mail</label>
		<input type="email" name="mail" placeholder="Email"/>
		<label for="mdp">Mot de passe</label>
		<input type="password" name="mdp" placeholder="password"/>

		<input type="submit" name="action" value="Se connecter"/>
	</form>
	<h2><a href="inscription.php">ou s'inscrire</a></h2>
</section>
<?php
	require 'views/footer.php';
?>
