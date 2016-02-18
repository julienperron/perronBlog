<?php

	include('includes/connexion.inc.php');
	
	include('includes/verif_util.inc.php');
	
	if($connect == true)
	{
		if(isset($_GET['id']))
		{
			$id = (int)$_GET['id'];
			
			$sql = "DELETE FROM articles WHERE id = '".$id."'";
			
			$res = mysql_query($sql);
			
			$idArticle = $_GET['id'];
			$chemin = dirname(__FILE__).'/assets/images/'.$idArticle.'.jpg';
			unlink($chemin); //supprimer l'image
			
			header('Location: index.php');
		}
		else
		{
			header('Location: index.php');
		}
	}
	else
	{
		?>
			<h3> Veuillez vous connecter ! <h3>
		<?php
	}
	
?>