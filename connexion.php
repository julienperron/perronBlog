<?php 

	include('includes/connexion.inc.php');
	
	include('includes/header.inc.php');
	
	include('includes/verif_util.inc.php');

	if($connect == false)
	{
		if((isset($_POST['email'])) && (isset($_POST['mdp'])))
		{
			$email = mysql_real_escape_string($_POST['email']);
			$mdp = mysql_real_escape_string(md5($_POST['mdp']));
			
			$sql = "SELECT * FROM utilisateurs WHERE email='$email' AND mdp = '$mdp'";
			$res = mysql_query($sql);
			$data = mysql_fetch_array($res);
			
			if ($data)
			{
				$sid = md5($email.time());
				$sql = "UPDATE utilisateurs SET sid = '$sid' WHERE email = '$email'";
				mysql_query($sql);
				setcookie('sid',$sid,time()+3600);
				header('Location: index.php');
			}
			else
			{
				formulaireCo(); //appel de la fonction pour afficher le formulaire
				echo "<h4>Erreur ! Réessayer !<h4>";
			}
		}
		else
		{
			formulaireCo();
		}
	}
	else
	{
		?>
			<h3> Vous êtes déjà connecter ! <h3>
		<?php
	}
	
	include('includes/footer.inc.php');
	
	function formulaireCo() //fonction pour afficher le formulaire, pour éviter la redondance
	{
		?>

			<h2>Connexion</h2>
		   
				<form method="post">
					<table>
						<tr>
							<td><label for="login"><strong>Nom de compte : </strong></label></td>
							<td><input type="email" name="email" id="email"/></td>
						</tr> 
						<tr>
							<td><label for="pass"><strong>Mot de passe : </strong></label></td>
							<td><input type="password" name="mdp" id="mdp"/></td>
						</tr>
					</table>
					<input type="submit" name="connexion" value="Connexion" class="btn btn-primary"/>
				</form>
		
		<?php
	}
	
?>