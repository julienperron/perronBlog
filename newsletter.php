<?php
	
	include('includes/connexion.inc.php');

	if(isset($_GET['email'])) //si il y a un get, si l'mail n'est pas nul et si si c'est bien un format email
	{
		if($_GET['email'] != "")
		{
			if((preg_match('#^[\w.-]+@[\w.-]+\.[a-z]{2,6}$#i', $_GET['email'])))
			{
				$email = $_GET['email'];

				$res = mysql_query("SELECT * FROM newsletter WHERE email = '".$email."'"); //on sélectionne via l'email
				$data = mysql_fetch_array($res);
				
				if($data) //si il existe
				{
					echo "Vous êtes déjà abonné !"; //on envoie cela
				}
				else//si il n'existe pas
				{
					$sql = "INSERT INTO newsletter VALUES ('', '".$email."');"; //on insert
					mysql_query($sql);
					echo "Vous êtes abonné !";
				}
			}
			else
			{
				echo "Ceci n'est pas un email !";
			}
		}
		else
		{
			echo "Champs vide !";
		}
	}
	else //si il n'y a pas de get alors on envoie cela
	{
		echo "Erreur ! Réessayer !"; 
	}

?>