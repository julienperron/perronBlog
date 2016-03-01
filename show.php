<?php

	include('includes/connexion.inc.php');
	
	include('includes/header.inc.php');

	include('includes/verif_util.inc.php'); //vérifie si l'utilisateur est connecté

	$id = $_GET['id'];

	$res = mysql_query("SELECT * FROM articles WHERE id = '".$id."'");
	
	while($data = mysql_fetch_array($res))
	{
		$id = $data['id']; //id de l'article
		echo '<h3>'.$data['titre'].'</h3>'; //titre de l'article
		
		$imageFile = dirname(__FILE__).'/assets/images/'.$id.'.jpg'; //chemin de l'image
		if(file_exists($imageFile))
		{
			echo "<img style='margin-right:10px;' id='image' src='vignette.jpg.php?id=$id' class='img-rounded pull-left'>"; //l'image de l'article
		}
		echo '<p>'.nl2br(htmlspecialchars($data['contenu'])).'</p>'; //contenu de l'article
		echo '<p>'.gmdate('d M Y H:i', $data['date']).'</p>'; //date au moment de la rédaction de l'article

		if($connect == true) //Si l'utilisateur est connecté
		{
			?>
			
			<a href="article.php?id=<?php echo $id ?>" class="btn btn-primary" value="<?php echo $id ?>">Modifier</a>
			<a href="supprimer_article.php?id=<?php echo $id ?>" class="btn btn-primary" value="<?php echo $id ?>">Supprimer</a>
				
			<?php
		}
		echo '<div style="clear:both;"></div>';
		echo '<HR>';
	}

	include('includes/footer.inc.php');

?>