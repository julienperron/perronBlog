<?php

	header("Content-type:image/jpg");

	$idArticle = $_GET['id'];
	$chemin = dirname(__FILE__).'/assets/images/'.$idArticle.'.jpg';
	
	list($width,$height) = getimagesize($chemin); //on récupère la taille de l'image
	$ratio = $width/$height; //on fait le ratio en divisant la largeur par la hauteur
	$w = 200; //on définit la largeur à 200px
	$h = $w/$ratio; //on définir la hauteur en divisant la largeur par le ratio
	
	$srcImg = @imagecreatefromjpeg($chemin); //retourne un identifiant d'image représentant une image obtenue à partir du fichier 
	
	$dstImg = @imagecreatetruecolor($w, $h); //retourne une ressource représentant une image noire. 
	
	imagecopyresampled($dstImg, $srcImg, 0, 0, 0, 0, $w, $h, $width, $height); //copie une zone rectangulaire de l'image srcImg vers l'image dstImg. Durant la copie, la zone est rééchantillonnée de manière à conserver la clarté de l'image durant une réduction. 
	
	imagejpeg($dstImg, null, 100); //crée un fichier JPEG depuis l'image fournie. 
	
?>