<?php

include_once('../config/config.php');


function connexion()
{
	try 
	{
		$bdd = new PDO('mysql:dbname='.db_name.';host='.db_host,db_user ,db_password);
	}
	catch (Exception $e)
	{
		die('Erreur : '.$e->getMessage());
	}

	return $bdd;
}

