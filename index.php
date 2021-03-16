<?php
	session_start(); 
	require_once ("controleur/controleur.class.php"); 
	//instancier la classe Controleur 
	$unControleur = new Controleur();
?>

<html>
	<head> 
			<title> Gestion des évènements de Paris</title>
			<meta charset="utf-8">
	</head>
	<body> 
		<center>
		<h1> Les évènements de la ville de Paris</h1>
		<img src="images/paris.jpg" height="200" width="400">
		<br/>
		<hr width="100%">
		<a href ="index.php?page=0"> Accueil</a> 
		
		
		<?php
			if (isset ($_SESSION['email'])){
				echo "<h3>Bienvenue MMe M. ".$_SESSION['nom']."  ".$_SESSION['prenom']."</h3>";
				echo '	<a href ="index.php?page=1"> Gestion des évènements </a> 
						<a href ="index.php?page=2"> Gestion des personnes </a> 
						<a href ="index.php?page=3"> Gestion des participations </a>  
						';

				if ($_SESSION['droits'] == "admin"){
					echo '<a href ="index.php?page=5"> Gestion des users </a> ';
				}

				echo '<a href ="index.php?page=4"> Déconnexion </a> 
						'; 
			}	


			if( isset($_GET["page"])) {
				$page = $_GET["page"];
			}else {
				$page = 0; 
			}
			switch($page)
			{
				case 1 : require_once("evenements.php"); break; 
				case 2 : require_once("personnes.php"); break; 
				case 3 : require_once("participations.php"); break; 
				case 0 : require_once("accueil.php"); break; 
				case 4 : 
						session_destroy();
						unset($_SESSION['email']); 
						header("Location: index.php");
						break; 
				case 5 : require_once("users.php"); break; 
				
			}

			if (isset($_POST["SeConnecter"]))
			{
				$resultat = $unControleur->selectWhereUser($_POST);
				if ($resultat == null)
				{
					echo "<br/> Veuillez vérifier vos identifiants ! </br>";
				}
				else{
					
					$_SESSION['email'] = $resultat['email']; 
					$_SESSION['iduser'] = $resultat['iduser']; 
					$_SESSION['droits'] = $resultat['droits']; 
					$_SESSION['nom'] = $resultat['nom']; 
					$_SESSION['prenom'] = $resultat['prenom']; 
					header("Location: index.php");
				}

			}

		?>

	</center>
	<hr width="100%">
		<footer>
			<p> Site de gestion des évènements de Paris, réalisé par la classe SIO A </p>
			<p> Droits réservés Ecole Iris 6-8 Impasse des deux Cousins Paris 17e. </p>

		</footer>
	</body>
</html>