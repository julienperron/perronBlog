<?php 

	include('includes/connexion.inc.php'); // Connexion
	
	include('includes/header.inc.php'); // En tête de la page
	
	include('includes/verif_util.inc.php'); //vérifie si l'utilisateur est connecté
	
    //--------- CONTENU ---------

	if((isset($_POST['champSearch']))) //si il utilise sur le moteur de recherche
	{
		$search = $_POST['champSearch'];

		//on enleve les espaces avant et apres la chaine
		$mot=trim($search);
		//on explose la chaine si il y a différent mot clés
		$array = explode(' ',$mot);

		$query = "SELECT * FROM articles WHERE titre LIKE \"%$array[0]%\" OR contenu LIKE \"%$array[0]%\"";

		$i = 1;

		while($i<count($array))
		{
			$query.="OR titre LIKE \"%$array[$i]%\" OR contenu LIKE \"%$array[$i]%\""; //on boucle jusqu'a ce qu'il n'y plus de mot saisie
			$i++;
		}
		
		$res = mysql_query($query);
	}
	else //si on n'utilise pas le moteur de recherche
	{
		$res = mysql_query("SELECT * FROM articles");
	}
	
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
		
		include('includes/footer.inc.php'); //pied de page
	
?>