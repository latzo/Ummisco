<?php


require('../Functions/bdd.php');
$bdd = connexion();
$id=$_GET['id_cherch'];

$req=$bdd->prepare('delete from ummisco_actor where id=:id ');
$req->execute(array(
'id'=>$id));
$req->closeCursor();

header('location:liste_chercheurs.php');


?>