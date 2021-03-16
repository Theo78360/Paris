
	<h2> Liste des prochains des évènements <h2> 

	<table border =1>
		<tr> <td> Id Event </td><td>Désignation </td><td>Date Evènement </td><td> Heure Evènement</td><td>Description </td><td> Prix</td>
		<?php
			if (isset($_SESSION['droits']) && $_SESSION['droits'] == "admin")
			{
				echo " <td> Action </td> ";
			}
		?>
		
		</tr>

		<?php

		foreach ($lesEvenements as $unEvent) {
			echo "<tr>  <td>".$unEvent['idevent']."</td> 
			            <td>".$unEvent['designation']."</td>
			            <td>".$unEvent['dateevent']."</td>
			            <td>".$unEvent['heureevent']."</td>
			            <td>".$unEvent['description']."</td>
			            <td>".$unEvent['prixplace']."</td> ";
			if (isset($_SESSION['droits']) && $_SESSION['droits'] == "admin")
			{       
			echo "<td style='text-align:center'> <a href='index.php?page=1&action=s&idevent=".$unEvent['idevent']."'> <img src='images/supprimer.png' height='20' width='20'> </a> </td>"; 
			}

			 echo     "</tr>";

		}
		?>

	</table>

