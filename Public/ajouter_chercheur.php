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

$req=$bdd->prepare('insert into ummisco_actor(prenom,nom,datNaiss,lieuNaiss,nationalite,email,numTel,discr)
values(:prenom,:nom,:dateNaiss,:lieuNaiss,:nationalite,:email,:numTel,:discr)');
$req->execute(array(
'prenom'=>$prenom,
'nom'=>$nom,
'dateNaiss'=>$dateNaiss,
'lieuNaiss'=>$lieuNaiss,
'nationalite'=>$nationalite,
'email'=>$email,
'numTel'=>$numTel,
'discr'=>$discr
));
$id=$bdd->lastInsertId();
$req->closeCursor();
$req2=$bdd->prepare('insert into chercheur(nbPublications,actor_id) values(:nbPub,:actor_id)');
$req2->execute(array(
'nbPub'=>$nbPub,
'actor_id'=>$id));
$req2->closeCursor();

header('location:../Rp/liste_chercheurs.php');


?>