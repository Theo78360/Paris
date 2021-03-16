
<?php
	// modele.class.php

	class Modele 
	{
		//cette classe va gérer la connexion à la base de données et les requêtes sur les tables 

		private $pdo ; //objet de la classe PDO PHP DATA Object qui permet de se connecter à la base de données. 

		public function __construct ()
		{
			//connexion au serveur SGBD Mysql avec gestion des exceptions (erreurs)
			try{
			// pour connexion pc 
			$this->pdo = new PDO ("mysql:host=localhost;dbname=paris", "root", "");
			}
			catch (PDOEXception $exp)
			{
				echo "Erreur de connexion au serveur Mysql";
			}
		}

		public function selectAllEvents ()
		{
			if( $this->pdo != null)
			{
				$requete = "select * from evenement ; ";
				//préparation de la requête avant exécution 
				$select = $this->pdo->prepare ($requete);
				// execution de la requete 
				$select->execute (); 
				//extraction des données 
				$resultats = $select->fetchAll(); 
				//retour des resultats 
				return $resultats ; 

			}else
			{
				return null;
			}
		}

		public function insertEvent ($tab)
		{
			if( $this->pdo != null)
			{
				//passage par variables parametrees precedees par : 
				$requete = "insert into evenement values (null, :designation, :dateevent, :heureevent, :description, :prixplace); ";
				//la correspondance entre les variables PDO et les variables PHP recues en entree 
				$donnees = array (":designation"=>$tab["designation"], ":dateevent"=>$tab["dateevent"], 
									":heureevent"=>$tab["heureevent"], ":description"=>$tab["description"], 
								    ":prixplace"=>$tab["prixplace"]); 
				//preparation de la requete 
				$insert = $this->pdo->prepare($requete); 
				//execution de la requete 
				$insert->execute($donnees);
			}
			else 
			{
				return null; 
			}
		}

		public function deleteEvent ($idevent)
		{
			if( $this->pdo != null)
			{
				$requete = "delete from evenement where idevent = :idevent ; " ;
				$donnees = array (":idevent"=>$idevent); 
				//preparation de la requete 
				$insert = $this->pdo->prepare($requete); 
				//execution de la requete 
				$insert->execute($donnees);
			}else
			{
				return null; 
			}
		}
		/**********************************************************************************************************************/
		public function selectAllPersonnes ()
		{
			if( $this->pdo != null)
			{
				$requete = "select * from personne ; ";
				//préparation de la requête avant exécution 
				$select = $this->pdo->prepare ($requete);
				// execution de la requete 
				$select->execute (); 
				//extraction des données 
				$resultats = $select->fetchAll(); 
				//retour des resultats 
				return $resultats ; 

			}else
			{
				return null;
			}
		}
		public function insertPersonne ($tab)
		{
			if( $this->pdo != null)
			{
				//passage par variables parametrees precedees par : 
				$requete = "insert into personne values (null, :nom, :prenom, :email, :telephone, :adresse); ";
				//la correspondance entre les variables PDO et les variables PHP recues en entree 
				$donnees = array (":nom"=>$tab["nom"], ":prenom"=>$tab["prenom"], 
									":email"=>$tab["email"], ":telephone"=>$tab["telephone"], 
								    ":adresse"=>$tab["adresse"]); 
				//preparation de la requete 
				$insert = $this->pdo->prepare($requete); 
				//execution de la requete 
				$insert->execute($donnees);
			}
			else 
			{
				return null; 
			}
		}
		public function deletePersonne ($idpers)
		{
			if( $this->pdo != null)
			{
				$requete = "delete from personne where idpers = :idpers ; " ;
				$donnees = array (":idpers"=>$idpers); 
				//preparation de la requete 
				$insert = $this->pdo->prepare($requete); 
				//execution de la requete 
				$insert->execute($donnees);
			}else
			{
				return null; 
			}
		}

		/******************************************** Participation *************************************************************/
		public function selectAllParticipations ()
		{
			if( $this->pdo != null)
			{
				$requete = "select * from viewParticipations  ; ";
				//préparation de la requête avant exécution 
				$select = $this->pdo->prepare ($requete);
				// execution de la requete 
				$select->execute (); 
				//extraction des données 
				$resultats = $select->fetchAll(); 
				//retour des resultats 
				return $resultats ; 

			}else
			{
				return null;
			}
		}

		public function insertParticipation ($tab)
		{
			if( $this->pdo != null)
			{
				//passage par variables parametrees precedees par : 
				$requete = "insert into participer values (:idpers, :idevent, :nbplaces, :prixtotal, now(), :commentaire); ";
				//la correspondance entre les variables PDO et les variables PHP recues en entree 
				$donnees = array (":idpers"=>$tab["idpers"], ":idevent"=>$tab["idevent"], 
									":nbplaces"=>$tab["nbplaces"], ":prixtotal"=>$tab["prixtotal"], 
								    ":commentaire"=>$tab["commentaire"]); 
				//preparation de la requete 
				$insert = $this->pdo->prepare($requete); 
				//execution de la requete 
				$insert->execute($donnees);
			}
			else 
			{
				return null; 
			}
		}

		public function deleteParticipation ($idevent, $idpers)
		{
			if( $this->pdo != null)
			{
				$requete = "delete from participer where idpers = :idpers and idevent = :idevent ; " ;
				$donnees = array (":idpers"=>$idpers, ":idevent"=>$idevent); 
				//preparation de la requete 
				$insert = $this->pdo->prepare($requete); 
				//execution de la requete 
				$insert->execute($donnees);
			}else
			{
				return null; 
			}
		}

		/****************************** Gestion des connexions user **************************************/
		public function selectWhereUser ($tab)
		{
			if( $this->pdo != null)
			{
				$requete = "select * from user where email = :email and mdp = :mdp  ; ";
				//préparation de la requête avant exécution 
				$select = $this->pdo->prepare ($requete);

				$donnees = array (":email"=>$tab["email"], ":mdp"=>$tab["mdp"]); 
				// execution de la requete 
				$select->execute ($donnees); 
				//extraction des données 
				$resultat = $select->fetch (); //fetch car un seul résultat 
				//retour un resultat 
				return $resultat ; 

			}else
			{
				return null;
			}
		}

public function selectAllUsers ()
		{
			if( $this->pdo != null)
			{
				$requete = "select * from user ; ";
				//préparation de la requête avant exécution 
				$select = $this->pdo->prepare ($requete);
				// execution de la requete 
				$select->execute (); 
				//extraction des données 
				$resultats = $select->fetchAll(); 
				//retour des resultats 
				return $resultats ; 

			}else
			{
				return null;
			}
		}
		public function insertUser ($tab)
		{
			if( $this->pdo != null)
			{
				//passage par variables parametrees precedees par : 
				$requete = "insert into user values (null, :email, :mdp, :nom, :prenom, :telephone, :droits); ";
				//la correspondance entre les variables PDO et les variables PHP recues en entree 
				$donnees = array (":nom"=>$tab["nom"], ":prenom"=>$tab["prenom"], 
									":email"=>$tab["email"], ":telephone"=>$tab["telephone"], 
								    ":mdp"=>$tab["mdp"],":droits"=>$tab["droits"] ); 
				//preparation de la requete 
				$insert = $this->pdo->prepare($requete); 
				//execution de la requete 
				$insert->execute($donnees);
			}
			else 
			{
				return null; 
			}
		}
		public function deleteUser ($iduser)
		{
			if( $this->pdo != null)
			{
				$requete = "delete from user where iduser = :iduser ; " ;
				$donnees = array (":iduser"=>$iduser); 
				//preparation de la requete 
				$insert = $this->pdo->prepare($requete); 
				//execution de la requete 
				$insert->execute($donnees);
			}else
			{
				return null; 
			}
		}


	}

?>