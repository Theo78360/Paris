<?php

			//supprimer une participation  
			if (isset($_GET["action"]) && isset($_GET["idevent"]) && isset($_GET["idpers"]) && $_GET["action"]=="s")
			{
				$unControleur->deleteParticipation ($_GET["idevent"], $_GET["idpers"]); 
				echo "<br/> Suppression réussie de la participation </br>";
			}

			//insérer une participation  
			$lesEvenements = $unControleur->selectAllEvents (); 
			$lesPersonnes = $unControleur->selectAllPersonnes (); 

			require_once("vue/vueInsertParticipation.php"); 
			if (isset($_POST['Valider']))
			{
				//	appel de la méthode insert du controleur 
				$unControleur->insertParticipation ($_POST);
				echo "<br/> Insertion réussie de la participation </br>";
			}

			//Afficher les participations

			$lesParticipations = $unControleur->selectAllParticipations (); 

			require_once("vue/vueSelectParticipations.php");

?>