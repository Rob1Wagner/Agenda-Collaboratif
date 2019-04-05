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
			<input id="type" type="text" required class="form-control" name="type" placeholder="public ou private">
		</div>
	</div>
</div>

<div class="row">
	<div class="col-sm-6">
		<div class="form-group">
			<lable for="group">Id Groupe</lable>
			<input id="group" type="text" class="form-control" name="group"  value="<?= isset($data['group']) ? h($data['group']) : '';?>">
		</div>
	</div>
	<div class="col-sm-6">
		<div class="form-group">
			<lable for="creator">Createur</lable>
			<?php /*<<select name="champCreateur">
				<?php
					$res =selectAllUser();
					while ($row =mysqli_fetch_assoc($res)){
						echo '<option value="'.$row["id"]. '">'. $row["nom"].'</option>';
					}
				?>
			</select>*/ ?>
			<input id="creator" type="text" class="form-control" name="creator"  value="<?= isset($data['creator']) ? h($data['creator']) : '';?>">
		</div>
	</div>
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
