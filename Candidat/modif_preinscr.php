<?php
session_start();
require('../Functions/bdd.php');
if(isset($_POST['ine']))
{
    $bdd = connexion();

    $ine=$_POST['ine'];
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $cni=$_POST['cni'];
    $dateNaiss=$_POST['dateNaiss'];
    $sexe=$_POST['sexe'];
    $paysNaiss=$_POST['paysNaiss'];
    $regionNaiss=$_POST['regionNaiss'];
    $lieuNaiss=$_POST['lieuNaiss'];
    $nationalite=$_POST['nationalite'];
    $email=$_POST['email'];
    $numTel=$_POST['numTel'];
    $boitePostale=$_POST['boitePostale'];
    $adresse=$_POST['ville'];
    $statut=$_POST['statut'];
    $situationFamiliale=$_POST['situationFamiliale'];
    $categorieSocioPro=$_POST['categorieSocioPro'];
    $nbEnfants=$_POST['nbEnfants'];
    $nomResponsable=$_POST['nomResponsable'];
    $prenomResponsable=$_POST['prenomResponsable'];
    $emailResponsable=$_POST['emailResponsable'];
    $numTelResponsable=$_POST['numTelResponsable'];
    $boitePostaleResponsable=$_POST['boitePostaleResponsable'];
    $adresseResponsable=$_POST['adresseResponsable'];

    $id  = $_SESSION['UserId'] ;



    $req=$bdd->prepare('update ummisco_actor set  prenom=:prenom, nom=:nom,datNaiss=:dateNaiss,lieuNaiss=:lieuNaiss,
paysNaiss=:paysNaiss,regionNaiss=:regionNaiss,nationalite=:nationalite,email=:email,numTel=:numTel,
boitePostale=:boitePostale,sexe=:sexe where id=:id');

    $req->execute(array(
        'prenom'=>$prenom,
        'nom'=>$nom,
        'dateNaiss'=>$dateNaiss,
        'lieuNaiss'=>$lieuNaiss,
        'paysNaiss'=>$paysNaiss,
        'regionNaiss'=>$regionNaiss,
        'nationalite'=>$nationalite,
        'email'=>$email,
        'numTel'=>$numTel,
        'boitePostale'=>$boitePostale,
        'sexe'=>$sexe,
        'id'=>$id
    ));
    $req->closeCursor();

    $req2=$bdd->prepare('update candidat set  ine=:ine, cni=:cni,statut=:statut,situationFamiliale=:situationFamiliale,
nbEnfants=:nbEnfants,categorieSocioPro=:categorieSocioPro where actor_id=:id');

    $req2->execute(array(
        'ine'=>$ine,
        'cni'=>$cni,
        'statut'=>$statut,
        'situationFamiliale'=>$situationFamiliale,
        'nbEnfants'=>$nbEnfants,
        'categorieSocioPro'=>$categorieSocioPro,
        'id'=>$id
    ));
    $req2->closeCursor();
    $requete=$bdd->prepare('select responsable_id from candidat where id=:id');
    $requete->execute(array(
        'id'=>$id));
    $res= $requete->fetch();
    $id_resp=$res['responsable_id'];
    $requete->closeCursor();
    $req3=$bdd->prepare('update responsable set  nom=:nomResponsable, prenom=:prenomResponsable,email=:emailResponsable,numTel=:numTelResponsable,
boitePostale=:boitePostaleResponsable where id=:id');

    $req3->execute(array(
        'nomResponsable'=>$nomResponsable,
        'prenomResponsable'=>$prenomResponsable,
        'emailResponsable'=>$emailResponsable,
        'numTelResponsable'=>$numTelResponsable,
        'boitePostaleResponsable'=>$boitePostaleResponsable,
        'id'=>$id_resp
    ));
    $req3->closeCursor();
    header("location:mapreinscription.php");


}
else
{
    echo "Erreur Post";
}

?>