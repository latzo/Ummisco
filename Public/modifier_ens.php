<?php

require('../Functions/bdd.php');
$bdd = connexion();
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$dateNaiss=$_POST['dateNaiss'];
$lieuNaiss=$_POST['lieuNaiss'];
$nationalite=$_POST['nationalite'];
$email=$_POST['email'];
$numTel=$_POST['numTel'];
$nbPub=$_POST['nbPub'];
$discr="enseignant";
$id_ens=$_GET['id_ens']; 
echo $id_ens;

$req=$bdd->prepare('update ummisco_actor set  prenom=:prenom, nom=:nom,datNaiss=:dateNaiss,lieuNaiss=:lieuNaiss,
nationalite=:nationalite,email=:email,numTel=:numTel where id=:id_ens');
$req->execute(array(
        'prenom'=>$prenom,
        'nom'=>$nom,
        'dateNaiss'=>$dateNaiss,
        'lieuNaiss'=>$lieuNaiss,
        'nationalite'=>$nationalite,
        'email'=>$email,
        'numTel'=>$numTel,
        'id_ens'=>$id_ens
    ));
    $req->closeCursor();

$req2=$bdd->prepare('update enseignant_chercheur set  nbPublications=:nbPub where actor_id=:id_ens');
$req2->execute(array(
        'nbPub'=>$nbPub,
        'id_ens'=>$id_ens));

$req2->closeCursor();
header('location:../Rp/liste_enseignants.php');


?>