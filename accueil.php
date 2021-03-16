	<br/> <br/> 
	<h3>

	Une année riche vous attend dans la capitale française ! Expositions phares, événements sportifs majeurs, festivals incontournables, grands rendez-vous gastronomiques, animations inédites pour les familles… les temps forts s’enchainent à Paris en 2020 A chaque saison, la ville vous fait vibrer : tentez l’expérience !

	</h3>

<?php
	if ( ! isset ($_SESSION['email']))
	{
		echo '
				<form method = "post" action ="">
					<table border = 0>
						<tr><td> Email </td> <td> <input type="text" name="email">   </td> </tr>
						<tr><td> MDP   </td> <td> <input type="password" name="mdp"> </td> </tr>
						<tr><td> <input type="reset" name ="Annuler" value ="Annuler"> </td>
							<td> <input type="submit" name ="SeConnecter" value ="Se Connecter"> </td> </tr>
					</table>
				</form>
			';
	}
	?>
	<br/> <br/> 
	
	<a href="https://www.parisinfo.com/decouvrir-paris/les-grands-rendez-vous/que-faire-a-paris"> 
		<img src = "images/quefaire.png" height="200" width="600">
	</a>

	
