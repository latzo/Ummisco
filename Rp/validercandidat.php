<?php
session_start();
require '../Functions/bdd.php';
if(isset($_GET['id']) && isset($_GET['action']))
{
    if($_GET['action']=="validate")
    {
        //var_dump($_GET['action']);
        $id=$_GET['id'];
        $bdd=connexion();
        $req=$bdd->prepare('UPDATE candidat SET candidat.valide=1 WHERE candidat.id=:id');
        $req->execute(
            array(
                'id'=>$id,
            )
        );
        $_SESSION['flashBag']=
            "<div class='alert alert-success alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-check'></i> Alerte</h4>
                Le Candidat a été validé avec succes!
            </div>";
    }
    else
    {
        if($_GET['action']=="unvalidate"){
            $id=$_GET['id'];
            $bdd=connexion();
            $req=$bdd->prepare('UPDATE candidat SET candidat.valide=0 WHERE candidat.id=:id');
            $req->execute(
                array(
                    'id'=>$id,
                )
            );
            $_SESSION['flashBag']=
                "<div class='alert alert-danger alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-check'></i> Alerte</h4>
                    Validation annulée!
                </div>";
        }
    }

    header('Location:candidats.php');
    exit();
}
?>