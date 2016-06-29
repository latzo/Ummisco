<?php

include_once('../config/config.php');


function connexion()
{
	try 
	{
		$bdd = new PDO('mysql:dbname='.db_name.';host='.db_host,db_user ,db_password,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch (Exception $e)
	{
		die('Erreur : '.$e->getMessage());
	}

	return $bdd;
}

function getAllCandidats()
{
	$bdd = connexion();
	$req = $bdd->prepare('SELECT * FROM candidat');
	return $req;
}

