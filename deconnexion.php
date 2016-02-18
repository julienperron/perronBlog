<?php

	setcookie('sid',null,time()-100);
	header('Location: index.php');
	
?>