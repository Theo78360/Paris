
	<h2> Liste des participations aux prochains évènements de Paris <h2> 

	<table border =1>
		<tr> <td> Désignation </td> <td> Date Evènement </td> <td> Nom </td> <td>Prénom </td> <td> Nb Places </td>
			 <td> Prix Total payé </td> <td> Date Achat </td> <td> Commentaire </td>
			 <td> Action </td>
		</tr>

		<?php

		foreach ($lesParticipations as $uneParticipation) {
			echo "<tr>  <td>".$uneParticipation['designation']."</td> 
			            <td>".$uneParticipation['dateevent']."</td>
			            <td>".$uneParticipation['nom']."</td>
			            <td>".$uneParticipation['prenom']."</td>
			            <td>".$uneParticipation['nbplaces']."</td>
			            <td>".$uneParticipation['prixtotal']."</td>
			            <td>".$uneParticipation['dateachat']."</td>
			            <td>".$uneParticipation['commentaire']."</td> "; 
			         if (isset($_SESSION['droits']) && $_SESSION['droits'] == "admin")
					{
			        echo "    <td style='text-align:center'> <a href='index.php?page=3&action=s&idevent=".$uneParticipation['idevent']."&idpers=".$uneParticipation['idpers']."'> <img src='images/supprimer.png' height='20' width='20'> </a> </td>"; 
			        } else if (isset($_SESSION['iduser']) && $_SESSION['iduser'] == $uneParticipation['idpers'])
			        {
			        	echo "    <td style='text-align:center'> <a href='index.php?page=3&action=s&idevent=".$uneParticipation['idevent']."&idpers=".$uneParticipation['idpers']."'> <img src='images/supprimer.png' height='20' width='20'> </a> </td>"; 
			        } else {
			        	echo "<td> </td>";
			        }
			      echo "</tr>";

		}
		?>

	</table>
