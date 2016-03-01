<?php
	
	include('includes/connexion.inc.php');

	if(isset($_GET['email'])) //si il y a un get
	{
		$email = $_GET['email'];

		$res = mysql_query("SELECT * FROM newsletter WHERE email = '".$email."'"); //on sélectionne via l'email
		$data = mysql_fetch_array($res);
		
		if($data) //si il existe
		{
			echo "Déjà abonné !"; //on envoie cela
		}
		else //si il n'existe pas
		{
			$sql = "INSERT INTO newsletter VALUES ('', '".$email."');"; //on insert
			mysql_query($sql);
			echo "OK";
		}
	}
	else //si il n'y a pas de get alors on envoie cela
	{
		echo "KO"; 
	}

?>