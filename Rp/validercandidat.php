<?php
require '../Functions/bdd.php';
if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $bdd=connexion();
    $req=$bdd->prepare('UPDATE candidat SET candidat.valide=1 WHERE candidat.id=:id');
    $req->execute(
        array(
            'id'=>$id,
        )
    );
    header('Location:validerpreinscription.php?valide=true');
    exit();
}
?>