<?php 

function connect(){
	
	try
	{
    	$bdd = new PDO('mysql:host=localhost;dbname=ummiscodb', 'root', 'hamidou00');
    	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
	}
	catch (Exception $e)
	{
        die('Erreur : ' . $e->getMessage());
	}

	return $bdd;
}