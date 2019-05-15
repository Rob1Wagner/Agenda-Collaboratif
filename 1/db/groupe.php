<?php
	include_once "db.php";
	
	class Groupe{
		public $idGroupe = null;
		public $nom = "";
	}
	
	function obtenirGroupeId($idGroupe){
		global $db;

		$c = "SELECT * FROM `groupe` WHERE idGroupe = $idGroupe";
		$r = mysqli_query($db, $c);
		$row = mysqli_fetch_assoc($r);

		$groupe = new Groupe();
		extraireLigne($row, $groupe);

		return $groupe;
	}
?>