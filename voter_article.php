<?php
	
	include('includes/connexion.inc.php');

	if(isset($_GET['id']))
	{

		$id = (int)$_GET['id'];

		$ip = $_SERVER['REMOTE_ADDR'];
		
		$sql = "UPDATE articles SET votes = votes+1, derniereIp = '".$ip."' WHERE id = '".$id."';";
		
		mysql_query($sql);

		header('Location: index.php');
		
	}

?>