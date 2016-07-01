<?php 
require "database.php";

if(isset($_POST))
{
	$email = $_POST['login'];
	$password = $_POST['password'];

	$login = login($email,$password);
	if ($login === true) {
		# code...
		echo "okiiii";
	} else {
		# code...
		echo "nooooo";
	}
	
}

function login($login, $password)
{
	session_start();

	$bdd = connexion();
	
	$req = $bdd->prepare("SELECT * FROM ummisco_actor where email = :email and password = :password");
	$params['email'] = $login;
	$params['password'] = $password;

	$req->execute($params);

	$res = $req->fetch(PDO::FETCH_ASSOC);
	
	if(!is_null($res) && $res != false)
	{
		$_SESSION['id_user'] = $res['id'];
		$_SESSION['email'] = $res['email'];
		$_SESSION['prenom'] = $res['prenom'];
		$_SESSION['nom'] = $res['nom'];

		return true;
	}
	else
	{
		return false;
	}
}

function logout()
{
	session_destroy();
}