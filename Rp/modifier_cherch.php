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
$discr="chercheur"; 
$id_cherch=$_GET['id_cherch']; 


 $req=$bdd->prepare('update ummisco_actor set  prenom=:prenom, nom=:nom,datNaiss=:dateNaiss,lieuNaiss=:lieuNaiss,
nationalite=:nationalite,email=:email,numTel=:numTel where id=:id_cherch');
$req->execute(array(
        'prenom'=>$prenom,
        'nom'=>$nom,
        'dateNaiss'=>$dateNaiss,
        'lieuNaiss'=>$lieuNaiss,
        'nationalite'=>$nationalite,
        'email'=>$email,
        'numTel'=>$numTel,
        'id_cherch'=>$id_cherch
    ));
    $req->closeCursor();

$req2=$bdd->prepare('update chercheur set  nbPublications=:nbPub where actor_id=:id_cherch');
$req2->execute(array(
        'nbPub'=>$nbPub,
        'id_cherch'=>$id_cherch));

$req2->closeCursor(); 
header('location:../Rp/liste_chercheurs.php');


?>