<?php
		//on teste si l'user est un admin : on lui donne les droits d'insertion et de suppression 
		if (isset($_SESSION['droits']) && $_SESSION['droits'] == "admin")
		{
			//supprimer un évènement 
			if (isset($_GET["action"]) && isset($_GET["idevent"]) && $_GET["action"]=="s")
			{
				$unControleur->deleteEvent ($_GET["idevent"]); 
				echo "<br/> Suppression réussie de l'évènement </br>";
			}

			//insérer un évènement 

			require_once("vue/vueInsertEvent.php"); 
			if (isset($_POST['Valider']))
			{
				//	appel de la méthode insert du controleur 
				$unControleur->insertEvent ($_POST);
				echo "<br/> Insertion réussie de l'évènement </br>";
			}
		}

		//Afficher les évènements : droit attribué pour les users et les admins 

		$lesEvenements = $unControleur->selectAllEvents (); 

		require_once("vue/vueSelectAllEvents.php");

?>