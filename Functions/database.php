<?php 

function connexion(){
	
	try
	{
    	$bdd = new PDO('mysql:host=localhost;dbname=ummiscodb', 'hamydu' );
    	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
	}
	catch (Exception $e)
	{
        die('Erreur : ' . $e->getMessage());
	}

	return $bdd;
}
