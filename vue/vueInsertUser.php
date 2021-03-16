<h2> Insertion d'un utilisateur </h2>

<form method="post" action="">
	<table>
		<tr> <td> Nom : </td> <td> <input type ="text" name ="nom"></td></tr>
		<tr> <td> Prénom : </td> <td> <input type ="text" name ="prenom"></td></tr>
		<tr> <td> Email : </td> <td> <input type ="text" name ="email"></td></tr>
		<tr> <td> Téléphone : </td> <td> <input type ="text" name ="telephone" ></td></tr>
		<tr> <td> MDP : </td> <td> <input type ="password" name ="mdp" ></td></tr>
		<tr> <td> Droits </td><td>
			<select nom ="droits">
				<option value ="admin"> Administrateur </option>
				<option value ="user"> Utilisateur </option>
			</select>
		</td></tr>
		<tr> <td> <input type ="reset" name ="Annuler" value ="Annuler"></td> 
			 <td><input type ="submit" name ="Valider" value ="Valider"></td> 
		</tr>
	</table>

</form>