<?php
session_start();
$id= $_SESSION["UserId"];

require('../Functions/bdd.php');
$bdd = connexion();

$req=$bdd->prepare('delete from ummisco_actor where id=:id ');
$req->execute(array(
'id'=>$id));
$req->closeCursor();

$requete=$bdd->prepare('select responsable_id from candidat where id=:id');
$requete->execute(array(
'id'=>$id));
$res= $requete->fetch();
$id_resp=$res['responsable_id'];
$requete->closeCursor();

$req3=$bdd->prepare('delete from responsable where id=:id ');
$req3->execute(array(
'id'=>$id_resp));
$req3->closeCursor();

$req2=$bdd->prepare('delete from candidat where actor_id=:id ');
$req2->execute(array(
'id'=>$id));
$req2->closeCursor();




?>