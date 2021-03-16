n<h2> Liste des Personnes <h2> 

	<table border =1>
		<tr> <td> Id Personne </td><td>Nom </td><td>Prénom </td><td> Email</td><td>Téléphone </td><td> Adresse</td>
		<?php 	
		if (isset($_SESSION['droits']) && $_SESSION['droits'] == "admin")
		{
			echo "<td> Action </td>"; 
		}
		?>
		</tr>

		<?php

		foreach ($lesPersonnes as $unePersonne) {
			echo "<tr>  <td>".$unePersonne['idpers']."</td> 
			            <td>".$unePersonne['nom']."</td>
			            <td>".$unePersonne['prenom']."</td>
			            <td>".$unePersonne['email']."</td>
			            <td>".$unePersonne['telephone']."</td>
			            <td>".$unePersonne['adresse']."</td> "; 
				if (isset($_SESSION['droits']) && $_SESSION['droits'] == "admin")
						{
			            echo "<td style='text-align:center'> <a href='index.php?page=2&action=s&idpers=".$unePersonne['idpers']."'> <img src='images/supprimer.png' height='20' width='20'> </a> </td>"; 
			        }
			      echo "</tr>";

		}
		?>

	</table>
