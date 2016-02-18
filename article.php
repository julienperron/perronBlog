
<?php
	include('includes/connexion.inc.php');
	
	include('includes/header.inc.php');

	include('includes/verif_util.inc.php');
	
	if($connect == true)
	{
		if(isset($_POST['titre']) && isset($_POST['contenu'])) //Si il y a un titre et un contenu lorsqu'on clique sur le bouton
		{
			if(isset($_POST['id'])) //si il y a une id (modification)
			{
				$titre = mysql_real_escape_string($_POST['titre']);
				$contenu = mysql_real_escape_string($_POST['contenu']);
				$date = time();
				
				$id = $_POST['id'];
				
				$sql = "UPDATE articles SET titre = '".$titre."', contenu = '".$contenu."', date = '".$date."' WHERE id = '".$id."';";
				mysql_query($sql);
				
				$idArticle = $_POST['id'];
				
				header('Location: index.php'); //on redirige vers la page principal
			}
			else
			{
				$titre = mysql_real_escape_string($_POST['titre']);
				$contenu = mysql_real_escape_string($_POST['contenu']);
				$date = time();
				
				$sql = "INSERT INTO articles VALUES ('', '".$titre."', '".$contenu."','".$date."');";
				mysql_query($sql);
				
				$idArticle = mysql_insert_id(); //id de l'article qu'on a crée
			
				header('Location: index.php');
			}
			$cheminImage = $_FILES['image']['tmp_name']; //chemin de l'image
			move_uploaded_file($cheminImage, dirname(__FILE__).'/assets/images/'.$idArticle.'.jpg'); //déplace l'image vers le 'serveur'
		}	
		else if(isset($_GET['id'])) //si il y a déjà un id (modification) on récupère et on affiche le titre et l'article dans le formulaire
		{
			$id = $_GET['id'];
				
			$sql = "SELECT * FROM articles WHERE id = '".$id."'";
			
			$res = mysql_query($sql);
				
			while($data = mysql_fetch_array($res))
			{
				$titre = mysql_real_escape_string($data['titre']);
				$contenu = mysql_real_escape_string($data['contenu']);
			}
				
			?>

			<form method='post' action='article.php' enctype="multipart/form-data">

			<input type="hidden" name="id" value="<?php echo $id; ?>">

				<h3> Titre </h3>
				<input type=text name="titre" value="<?php echo $titre; ?>"></br>
				
				<h3> Contenu </h3>
				<textarea name="contenu" rows=10 cols=40><?php echo $contenu; ?></textarea> </br>

			<?php
		}
		else
		{
			?>

			<form method='post' action='article.php' enctype="multipart/form-data">

				<h3> Titre </h3>
				<input type=text name="titre"> </br>

				<h3> Contenu </h3>
				<textarea name="contenu" rows=10 cols=40></textarea> </br>

			<?php
		}
			?>
				<input type="file" name="image"></br>
				
				<input type=submit class="btn btn-primary" name ="save" value="Enregistrer">
			</form>
			<?php
	}
	else
	{
		?>
			<h3> Veuillez vous connecter ! <h3>
		<?php
	}
	
	include('includes/footer.inc.php');
	
?>