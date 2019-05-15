<?php
	include_once "db.php";
	
	class User{
		public $id = null;
		public $nom = "";
		public $mdp = "";
		public $email = ""; 
		public $admin = ""; /*bool*/
	}
	
	/** Renvoi un client ou null selon les informations de connexion.
 * \param nom Nome du client.
 * \param mdp Mot de passe du client.
 * \return Client ou null.
 */
	function obtenirUserConnexion($nom, $mdp){

		global $db;

		$c = "SELECT * FROM `user` WHERE email = '$email' AND mdp = '$mdp'";
		$r = mysqli_query($db, $c);

		if (ligneExiste($r)) {
			// Creér une instance de client et la renvoyer.
			$row = mysqli_fetch_assoc($r)
			$user = new User();
			extraireLigne($row, $user);
			return $user;
		}
		return null;
	}
	
	/** Ajouter un client

 * \param nom Nom du client.

 * \param mdp Not de passe du client.

 * \param email Email du client.

 * \param image Image profil du client.

 * \return Le client si l'ajout est effectué, sinon null si le client existe déjà.

 */

	function ajouterUser($nom, $mdp, $email, $role){
		global $db;

		$c = "SELECT * FROM `user` WHERE email = '$email'";
		$r = mysqli_query($db, $c);

		if (ligneExiste($r)) {
			// Le client existe déjà.
			return null;
		}

		$user = new User();
		$user->nom = $nom;
		$user->mdp = $mdp;
		$user->email = $email;
		$user->role = $role;

		if (!ecrireLigne("user", $user)) {
			return null;
		}
		return $user;
	}
	
	/** Renvoi le client correspondant à l'id.

	* \param idClient  Id du Client

	* \return Client.

	*/



	function obtenirUserId($idUser){
		global $db;

		$c = "SELECT * FROM `user` WHERE idUser = $idUser";
		$r = mysqli_query($db, $c);
		$row = mysqli_fetch_assoc($r);

		$client = new User();
		extraireLigne($row, $user);

		return $user;
	}
?>

