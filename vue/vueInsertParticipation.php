<h2> Insertion d'une participation à un évènement </h2>

<form method="post" action="">
	<table>
		<tr> <td> Evènement  : </td> 
			<td> 
				<select name ="idevent">
				<?php
				foreach ($lesEvenements as $unEvent) {
					echo "<option value ='".$unEvent['idevent']."'>".$unEvent['designation']."</option>";
				}
				?>
				</select>
			</td>
		</tr>


		<tr> <td> Personne : </td> 
			<td> 
				 <select name ="idpers">
				<?php
				foreach ($lesPersonnes as $unePersonne) {
					echo "<option value ='".$unePersonne['idpers']."'>".$unePersonne['nom']."  ".$unePersonne['prenom']."</option>";
				}
				?>
				</select>
			</td>
		</tr>
		<tr> <td> Nb Places : </td> <td> <input type ="text" name ="nbplaces"></td></tr>
		<tr> <td> Prix Total : </td> <td> <input type ="text" name ="prixtotal" ></td></tr>
		<tr> <td> Commentaire : </td> <td> <textarea name ="commentaire" rows ="10" cols="30"></textarea> </td></tr>
		<tr> <td> <input type ="reset" name ="Annuler" value ="Annuler"></td> 
			 <td><input type ="submit" name ="Valider" value ="Valider"></td> 
		</tr>
	</table>

</form>