<?php
		if (isset($_SESSION['droits']) && $_SESSION['droits'] == "admin")
		{
			//supprimer une personne 
			if (isset($_GET["action"]) && isset($_GET["idpers"]) && $_GET["action"]=="s")
			{
				$unControleur->deletePersonne ($_GET["idpers"]); 
				echo "<br/> Suppression réussie de la personne </br>";
			}

			//insérer une personne  

			require_once("vue/vueInsertPersonne.php"); 
			if (isset($_POST['Valider']))
			{
				//	appel de la méthode insert du controleur 
				$unControleur->insertPersonne ($_POST);
				echo "<br/> Insertion réussie de la personne  </br>";
			}
		}

			//Afficher les personnes 

			$lesPersonnes = $unControleur->selectAllPersonnes (); 

			require_once("vue/SelectAllPersonnes.php");

?>