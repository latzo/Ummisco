<?php


require('../Functions/bdd.php');
$bdd = connexion();
$id= $_GET['id_ens'];

$req=$bdd->prepare('delete from ummisco_actor where id=:id ');
$req->execute(array(
'id'=>$id));
$req->closeCursor();

header('location:liste_enseignants.php');


?>