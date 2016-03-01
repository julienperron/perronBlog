<?php
	
	include('includes/connexion.inc.php');

	if(isset($_GET['email']))
	{
		$email = $_GET['email'];

		$res = mysql_query("SELECT * FROM newsletter WHERE email = '".$email."'");
		$data = mysql_fetch_array($res);
		
		if($data)
		{
			echo "Déjà abonné !";
		}
		else
		{
			$sql = "INSERT INTO newsletter VALUES ('', '".$email."');";
			mysql_query($sql);
			echo "OK";
		}
	}
	else
	{
		echo "KO"; 
	}

?>