<?php
error_reporting(E_ALL ^ E_DEPRECATED);
	mysql_connect('mysql.hostinger.fr','u474266026_lpdim','benjiom13'); //connexion à la base de données
	
	mysql_select_db('u474266026_blog'); //le nom de la base de donnnées
	
	mysql_query("SET NAMES 'utf8'"); //convertir en utf8 pour afficher tous les caractères spécial
	
?>