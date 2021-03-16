<?php
		if (isset($_SESSION['droits']) && $_SESSION['droits'] == "admin")
		{
			//supprimer un utilisateur  
			if (isset($_GET["action"]) && isset($_GET["iduser"]) && $_GET["action"]=="s")
			{
				$unControleur->deleteUser($_GET["iduser"]); 
				echo "<br/> Suppression réussie de le l'utilisateur </br>";
			}

			//insérer un utilisateur   

			require_once("vue/vueInsertUser.php"); 
			if (isset($_POST['Valider']))
			{
				//	appel de la méthode insert du controleur 
				$unControleur->insertUser ($_POST);
				echo "<br/> Insertion réussie de l'utilisateur  </br>";
			}
		}

			//Afficher les users  

			$lesUsers = $unControleur->selectAllUsers (); 

			require_once("vue/SelectAllUsers.php");

?>