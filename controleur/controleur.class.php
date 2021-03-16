<?php

	require_once ("modele/modele.class.php");

	//controleur.class.php

	class Controleur 
	{
		//le controleur appelle le modele 

		private $leModele ; // instance de la classe Modele 

		public function __construct ()
		{
			$this->leModele = new Modele (); 
		}

		//*************************************************** Méthodes pour Evenement ********************** //
		public function selectAllEvents ()
		{
			//on appelle le modele pour l'extraction des evenements de la base de données 

			$resultats = $this->leModele->selectAllEvents(); 

			//on pourra faire des traitements sur les données récupérées de la base de données avant l'envoi à la vue 

			//revoit des données à la vue 

			return $resultats;
		}

		public function insertEvent ($tab)
		{
			// ici on controle les données avant leur insertion dans la BDD : c'est le rôle du controleur 

			$this->leModele->insertEvent($tab);
		}

		public function deleteEvent ($idevent)
		{
			$this->leModele->deleteEvent($idevent);
		}

		//*************************************************** Méthodes pour Personne ********************** //
		public function selectAllPersonnes ()
		{
			return $this->leModele->selectAllPersonnes(); 
		}

		public function insertPersonne ($tab)
		{
			$this->leModele->insertPersonne($tab);
		}

		public function deletePersonne ($idpers)
		{
			$this->leModele->deletePersonne($idpers);
		}
		
		//*************************************************** Méthodes pour Participation  ********************** //
		public function selectAllParticipations ()
		{
			return $this->leModele->selectAllParticipations(); 
		}

		public function insertParticipation($tab)
		{
			$this->leModele->insertParticipation($tab);
		}

		public function deleteParticipation ($idevent, $idpers)
		{
			$this->leModele->deleteParticipation($idevent, $idpers);
		}
		//************************************************* Gestion des connexions **************************//

		public function selectWhereUser ($tab)
		{
			return $this->leModele->selectWhereUser($tab);
		}

		public function selectAllUsers ()
		{
			return $this->leModele->selectAllUsers(); 
		}

		public function insertUser($tab)
		{
			$this->leModele->insertUser($tab);
		}

		public function deleteUser ($iduser)
		{
			$this->leModele->deleteUser($iduser);
		}

	}

?>