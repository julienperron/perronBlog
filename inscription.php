<?php 

	include('includes/connexion.inc.php'); //connexion
	
	include('includes/header.inc.php'); //en tête de la page
	
	include('includes/verif_util.inc.php'); //vérifie si l'utilisateur est connecté

	if($connect == false)//Si l'utilisateur n'est connecté
	{
		if((isset($_POST['nom'])) && (isset($_POST['prenom'])) && (isset($_POST['email'])) && (isset($_POST['mdp'])))
		{
			$nom = mysql_real_escape_string($_POST['nom']);
			$prenom = mysql_real_escape_string($_POST['prenom']);
			$email = mysql_real_escape_string($_POST['email']);
			$mdp = mysql_real_escape_string(md5($_POST['mdp']));

			if($nom!="" && $prenom!="" && $email!="" && $mdp!="")
			{
				$sql = "INSERT INTO utilisateurs VALUES ('', '$nom', '$prenom','$email','$mdp','')";
				mysql_query($sql);
				header('Location: index.php');
			}
			else
			{
				formulaireInscription(); //appel de la fonction pour afficher le formulaire
				echo "<h4>Erreur ! Réessayer !<h4>";
			}
		}
		else
		{
			formulaireInscription();
		}
	}
	else
	{
		?>
			<h3> Vous êtes déjà inscrit ! <h3>
		<?php
	}

	function formulaireInscription() //fonction pour afficher le formulaire, pour éviter la redondance
	{
		?>

			<h2>Inscription</h2>
		   
				<form method="post">
					<table>
						<tr>
							<td><label for="nom"><strong>Nom : </strong></label></td>
							<td><input type="text" name="nom" id="nom"/></td>
						</tr> 
						<tr>
							<td><label for="prenom"><strong>Prénom : </strong></label></td>
							<td><input type="text" name="prenom" id="prenom"/></td>
						</tr> 
						<tr>
							<td><label for="login"><strong>Email : </strong></label></td>
							<td><input type="email" name="email" id="email"/></td>
						</tr> 
						<tr>
							<td><label for="pass"><strong>Mot de passe : </strong></label></td>
							<td><input type="password" name="mdp" id="mdp"/></td>
						</tr>
					</table>
					<input type="submit" name="inscription" value="S'inscrire" class="btn btn-primary"/>
				</form>
		
		<?php
	}

	include('includes/footer.inc.php'); //pied de page
	
?>