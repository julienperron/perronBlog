<?php
	//------Vérifie les informations de l'utilisateur connecté---------//
	
	if((isset($_COOKIE)) && ($_COOKIE != null))
	{
		$sid = $_COOKIE['sid'];
		$sql = "SELECT * FROM utilisateurs WHERE sid = '$sid'";
		$res = mysql_query($sql);
		$data = mysql_fetch_array($res);
		
		if($data)
		{
			$connect = true;
			$email_util = $data['email'];
		}
	}
	else
	{
		$connect = false;
	}

?>