<?php
require '../Functions/bdd.php';
$bdd=connexion();
$req=$bdd->query('SELECT * FROM candidat');
$nbPreins=$req->rowCount();
$nbPreinsValide=0;
while($donnee=$req->fetch())
{
    if ($donnee['valide']==1)
    {
        $nbPreinsValide++;
    }
}
$nbPreinsAttente=$nbPreins-$nbPreinsValide;
if($nbPreins>0)
{
    $tauxValidation = round((100*$nbPreinsValide)/($nbPreins),2);
}
else
{
    $tauxValidation = 0;
}

$req->closeCursor();
?>
<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3><?php echo $nbPreins; ?></h3>
                <p>Preinscriptions</p>
            </div>
            <div class="icon">
                <i class="ion ion-ios-people"></i>
            </div>
            <a href="candidats.php" class="small-box-footer">Plus d'infos <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3><?php echo $nbPreinsValide; ?></h3>
                <p>Liste Principale</p>
            </div>
            <div class="icon">
                <i class="ion ion-ios-people"></i>
            </div>
            <a href="principale.php" class="small-box-footer">Plus d'infos <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3><?php echo $nbPreinsAttente; ?></h3>
                <p>Liste d'attente</p>
            </div>
            <div class="icon">
                <i class="ion ion-ios-people-outline"></i>
            </div>
            <a href="attente.php" class="small-box-footer">Plus d'infos <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div><!-- ./col -->

    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3><?php echo $tauxValidation; ?><sup style="font-size: 20px">%</sup></h3>
                <p>Validation</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">Plus d'infos <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div><!-- ./col -->

</div><!-- /.row -->