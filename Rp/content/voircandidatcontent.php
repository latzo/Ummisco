<?php
ob_start();
require "../config/config.php";
require "../Functions/bdd.php";
$bdd = connexion();
$req = $bdd->prepare("SELECT * FROM candidat WHERE id=:id");
$req->execute(
    array(
        'id'=>$_GET['id'])
    );
$donnee = $req->fetch();
$candidat_id=$donnee['id'];
$ine = $donnee['ine'];
$cni = $donnee['cni'];
$statut = $donnee['statut'];
$situationFam = $donnee['situationFamiliale'];
$categorieSocioPro = $donnee['categorieSocioPro'];
$nbEnfants=$donnee['nbEnfants'];
$anneeEtude = $donnee['anneeEtude'];
$actor_id=$donnee['actor_id'];
$departement_id=$donnee['departement_id'];
$responsable_id=$donnee['responsable_id'];
$req->closeCursor();

$req = $bdd->prepare("SELECT * FROM departement WHERE id=:departement_id");
$req->execute(array(
        'departement_id'=>$departement_id,
    )
);
$donneedep=$req->fetch();
$nomDept=$donneedep['nomDept'];
$req->closeCursor();

$req = $bdd->prepare("SELECT * FROM ummisco_actor WHERE id=:actor_id");
$req->execute(
    array(
        'actor_id'=>$actor_id,
    )
);
$donneeua=$req->fetch();
$prenom=$donneeua['prenom'];
$nom = $donneeua['nom'];
$datNaiss = $donneeua['datNaiss'];
$sexe = $donneeua['sexe'];
$numTel = $donneeua['numTel'];
$email = $donneeua['email'];
$adresse_id=$donneeua['adresse_id'];
$req->closeCursor();

$req=$bdd->prepare("SELECT * FROM adresse WHERE id=:adresse_id");
$req->execute(array(
    'adresse_id'=>$adresse_id,
));
$donneeadr=$req->fetch();
$adresse=$donneeadr['ville'];
$req->closeCursor();

$req=$bdd->prepare("SELECT * FROM responsable WHERE id=:responsable_id");
$req->execute(array(
    'responsable_id'=>$responsable_id,
));
$donneeresp=$req->fetch();
$prenomresp=$donneeresp['prenom'];
$nomresp=$donneeresp['nom'];
$numTelresp = $donneeresp['numTel'];
$emailresp = $donneeresp['email'];
$adresse_id_resp=$donneeresp['adresse_id'];
$req->closeCursor();

$req=$bdd->prepare("SELECT * FROM adresse WHERE id=:adresse_id");
$req->execute(array(
    'adresse_id'=>$adresse_id_resp,
));
$donneeadresp=$req->fetch();
$adresseresp=$donneeadresp['ville'];
$req->closeCursor();

$req=$bdd->prepare("SELECT * FROM diplome WHERE candidat_id=:candidat_id");
$req->execute(array(
    'candidat_id'=>$candidat_id,
));

?>

<div class="pad margin no-print">
    <div class="callout callout-info" style="margin-bottom: 0!important;">
        <h4><i class="fa fa-info"></i> Note:</h4>
        Vous pouvez generer les informations du candidat en document pdf
    </div>
</div>

<!-- Main content -->
<section class="invoice">
    <!-- title row -->
    <div class="row">
        <div class="col-xs-12">
            <h2 class="page-header">
                <i class="fa fa-graduation-cap"></i> <?php echo $prenom.' '.$nom; ?>
                <small class="pull-right"><?php echo $datNaiss; ?></small>
            </h2>
        </div><!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
        <div class="col-sm-3 invoice-col">
            <img style="width: 150px;height: 150px;" class="img-responsive img-bordered-sm" src=
            <?php
            if(file_exists('../UserFiles/User'.$actor_id.'/fileavatar.jpg'))
                echo '../UserFiles/User'.$actor_id.'/fileavatar.jpg';
            else
            {
                if(file_exists('../UserFiles/User'.$actor_id.'/fileavatar.png'))
                    echo '../UserFiles/User'.$actor_id.'/fileavatar.png';
                else
                    echo '../dist/img/avatar.png';
            }

            ?> alt="">
        </div><!-- /.col -->
        <div class="col-sm-3 invoice-col">
            <strong>Etat Civil</strong>
            <address>
                Ine: <?php echo $ine; ?> <br>
                Sexe: <?php echo $sexe; ?><br>
                Adresse: <?php echo $adresse; ?> <br>
                Numero Telephone: <?php echo $numTel; ?><br>
                Email: <?php echo $email; ?>
            </address>
        </div><!-- /.col -->
        <div class="col-sm-3 invoice-col">
            <strong>Emploi-Famille</strong>
            <address>
                Statut Etudiant: <?php echo $statut; ?><br>
                Categorie SocioProfessionnelle: <?php echo $categorieSocioPro; ?><br>
                Situation Familiale: <?php echo $situationFam; ?><br>
                Nombre d'enfants: nbEnfants: <?php echo $nbEnfants; ?><br>
            </address>
        </div><!-- /.col -->
        <div class="col-sm-3 invoice-col">
            <b>Inscription Annuelle</b><br>
            Departement: <?php echo $nomDept; ?><br>
            Année d'étude: <?php echo $anneeEtude; ?>
        </div><!-- /.col -->
    </div><!-- /.row -->
    <br>
    <hr>

    <!-- Table row -->
    <div class="row">
        <div class="col-xs-12 table table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Nom Diplome</th>
                    <th>Mention</th>
                    <th>Année d'Obtention</th>
                    <th>Lieu Obtention</th>
                    <th>Justificatif</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $i=1;
                while ($donneedip=$req->fetch())
                {
                    if($i==1)
                    {
                        $nomJustificatif ='fileBac.pdf';
                    }
                    if($i==2)
                    {
                        $nomJustificatif ='fileDiplome2.pdf';
                    }
                    if($i==3)
                    {
                        $nomJustificatif ='fileDiplome3.pdf';
                    }
                    if($i==4)
                    {
                        $nomJustificatif ='fileDiplome4.pdf';
                    }
                    if($i==5)
                    {
                        $nomJustificatif ='fileDiplome5.pdf';
                    }
                ?>
                <tr>
                    <td><?php echo $donneedip['nomDiplome'] ?></td>
                    <td><?php echo $donneedip['mention'] ?></td>
                    <td><?php echo $donneedip['dateObtention'] ?></td>
                    <td><?php echo $donneedip['lieuObtention'] ?></td>
                    <td><a href=<?php echo '../UserFiles/User'.$actor_id.'/'.$nomJustificatif.'' ?>>Justificatif</a></td>
                </tr>
                <?php
                    $i++;
                }
                ?>
                </tbody>
            </table>
        </div><!-- /.col -->
    </div><!-- /.row -->
    <hr>

    <div class="row">
        <div class="col-xs-6">
            <p class="lead">Responsable</p>
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th style="width:50%">Nom</th>
                        <td><?php echo $prenomresp.' '.$nomresp; ?></td>
                    </tr>
                    <tr>
                        <th>Telephone</th>
                        <td><?php echo $numTelresp; ?></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><?php echo $emailresp; ?></td>
                    </tr>
                    <tr>
                        <th>Adresse</th>
                        <td><?php echo $adresseresp; ?></td>
                    </tr>
                </table>
            </div>
        </div><!-- /.col -->
    </div><!-- /.row -->


    <!-- this row will not appear when printing -->
    <div class="row no-print">
        <div class="col-xs-12">
            <!--<a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>-->
            <!--<button class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment</button>-->
            <a href=<?php echo '../UserFiles/User'.$actor_id.'/dossier.pdf'; ?> class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generer PDF</a>
        </div>
    </div>

    <?php

    /*$content = ob_get_clean();
    require_once('../config/pdf/html2pdf/vendor/autoload.php');
    $html2pdf = new HTML2PDF('P','A4','fr');
    $html2pdf->WriteHTML($content);
    $html2pdf->Output('../UserFiles/User'.$actor_id.'/dossier.pdf','F');*/

    ?>
</section><!-- /.content -->