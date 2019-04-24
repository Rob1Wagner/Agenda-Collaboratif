<?php
	include_once "db.php";
	
	class Evenement{
		public $idEvenement = null;
		public $nom;
		public $idUser; /*createur de l'evenement*/
		public $description;
		public $debut;
		public $fin;
		public $type;
		public $idGroupe;
	}
?>