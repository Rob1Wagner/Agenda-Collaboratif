

		<?php


		require 'views/header.php';
		require 'src/date/Month.php';
		require 'src/date/Events.php';
		require 'src/date/bootstrap.php';
		$bdd= bdd();



			$events = new App\date\Events($bdd);

			try
			{
				$month = new App\date\Month($_GET['month'] ?? null, $_GET['year'] ?? null);
			} catch(\Exception $e){
				$month = new App\date\Month();
			}


			/*recupérer le nombre de semaines d'un mois*/
			$weeks = $month->getWeeks();

			/*cration de la variable $start selon le mois*/
			$start= $month->getFirstDay();
			$start= $start->format('N') === '1' ?
							$start : $month->getFirstDay()->modify('last monday');

			/* créer la variable $end selon le mois*/
			$end= (clone $start)->modify('+' . (6 + 7 * ($weeks - 1)) .'days');
			/* stocker les evenments entre deux date dans une variable */
			$events = $events->getEventsByDay($start,$end);


		?>
<div class="calendar">

	<?php if(isset($_GET['success'])): ?>
		<div class= "container">
			<div class="alert alert-success">
				L'evenement a bien été enregistré
			</div>
		</div>
	<?php endif; ?>

			<div class="d-flex flex-row align-items-center justify-content-between mx-sm-3">
				<h1><?= $month->toString(); ?></h1>
				<div>
						<a href="/1/agenda.php?month=<?=$month->previousMonth()->month; ?>&year=<?= $month->previousMonth()->year;?>" class="btn btn-outline-danger btn-lg">&lt;</a>
						<a href="/1/agenda.php?month=<?=$month->nextMonth()->month; ?>&year=<?= $month->nextMonth()->year;?>" class="btn btn-outline-primary btn-lg">&gt;</a>
				</div>
			</div>




			<table class="tab tab--<?= $weeks; ?>weeks table-dark">
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

			<a href="add.php" class="calendar__button">+</a>
</div>

<?php
	require 'views/footer.php';
?>
