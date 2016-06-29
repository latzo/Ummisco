<?php
require '../Functions/bdd.php';
$bdd=connexion();
$req=$bdd->query('SELECT * FROM candidat,ummisco_actor WHERE candidat.actor_id=ummisco_actor.id');
if(isset($_GET['valide']))
{
    $valide=$_GET['valide'];
    if($valide=="true")
    {
        echo "
                <div class='alert alert-success alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-check'></i> Alerte</h4>
                        Le Candidat a été validé avec succes!
                  </div>
                  ";
        unset($_GET['valide']);
    }
}
?>


<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Liste des Candidats</h3>
                <div class="box-tools">
                    <div class="input-group" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search">
                        <div class="input-group-btn">
                            <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tr>
                        <th>INE</th>
                        <th>Nom</th>
                        <th>Date Soumission</th>
                        <th>Statut</th>
                        <th>&nbsp;</th>
                    </tr>
                    <?php
                    while ($candidat=$req->fetch()) {
                        $id=$candidat['id'];
                        $ine = $candidat['ine'];
                        $nom = $candidat['prenom'].' '.$candidat['nom'];
                        $datSoumission = $candidat['datSoumission'];
                        $statut = $candidat['valide'] == 1 ? "<span class='label label-success'>Validé</span>" : "<span class='label label-warning'>En Attente</span>";
                        ?>
                    <tr>
                        <td><?php echo $ine; ?></td>
                        <td><?php echo $nom; ?></td>
                        <td><?php echo $datSoumission; ?></td>
                        <td><?php echo $statut; ?></td>
                        <td>
                            <a href=<?php echo "voircandidat.php?id=".$id ?> class="">
                                <span class="fa-stack info">
                                    <i class="fa fa-square fa-stack-2x"></i>
                                    <i class="fa fa-search  fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                            &nbsp;
                            <a href="#" class="">
                                <span class="fa-stack info">
                                    <i class="fa fa-square fa-stack-2x"></i>
                                    <i class="fa fa-file-pdf-o fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                            &nbsp;
                            <?php
                            if($candidat['valide']==0) {
                                ?>
                                <a href="<?php echo "validercandidat.php?id=".$id?>" class="table-link text-success">
                                <span class="fa-stack">
                                    <i class="fa fa-square fa-stack-2x"></i>
                                    <i class="fa fa-check fa-stack-1x fa-inverse"></i>
                                </span>
                                </a>
                                <?php
                            }
                            ?>
                        </td>
                    </tr>
                    <?php
                    }
                    $req->closeCursor();
                    ?>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>
</div>