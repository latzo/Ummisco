<?php 
require_once "database.php";


if ($_SERVER['REQUEST_METHOD'] === "POST") {
	if ($_POST['id'] == 0 ) {
			array_shift($_POST);
			ajouterMatiere($_POST);

		header('location:../Rp/listeMatiere.php');
			

		} else {
			modifierMatiere($_POST);
		header('location:../Rp/listeMatiere.php');
		}
				
}

if (isset($_GET['action']) && $_GET['action'] === 'supprimer')
{
	supprimerMatiere($_GET['id']);

	header('location:../Rp/listeMatiere.php');
}

function ajouterMatiere(array $donnees)
{
	$bdd = connexion();
	$requete = "insert into matiere(nomMatiere, id_ue, quantum, coefficient) values(:nomMatiere, :id_ue, :quantum, :coefficient)";

	$reponse = $bdd->prepare($requete);
	$reponse->execute($donnees);
}


function uneMatiere($id){

	$bdd = connexion();
	$requete = "select * from matiere where id = :id";

	$reponse = $bdd->prepare($requete);
	$reponse->execute(array('id' => $id));

	$donnees = $reponse->fetch(PDO::FETCH_ASSOC);

	return $donnees;
}


function allMatiere(){

	$bdd = connexion();
	$requete = "select * from matiere";

	$reponse = $bdd->prepare($requete);
	$reponse->execute();

	$donnees = $reponse->fetchAll(PDO::FETCH_ASSOC);

	return $donnees;
}


function modifierMatiere(array $donnees)
{
	$bdd = connexion();
	$id = $donnees['id'];
	array_shift($donnees);
	$requete = "update matiere set nomMatiere = :nomMatiere, id_ue = :id_ue, quantum = :quantum, coefficient = :coefficient where id = :id";
	$donnees['id'] = $id;
	$reponse = $bdd->prepare($requete);
	$reponse->execute($donnees);	
}

function supprimerMatiere($id)
{
	$bdd = connexion();
	$requete = "delete from matiere where id = :id";

	$reponse = $bdd->prepare($requete);
	$reponse->execute(array('id' => $id));
}
