<?php

require_once '../Functions/ue.php';

$ues = allUe();

?>


<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Liste des Unites d'Enseignement</h3>
                </div>
                <div class="box-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Numero</th>
                            <th>Nom de l'UE</th>
                            <th>Nombre de Matieres</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($ues as $ue):?>
                            <tr>
                                <td>
                                    <?php echo $ue['id'] ;?>
                                </td>
                                <td>
                                    <?php echo $ue['nomUe'];?>
                                </td>
                                <td>
                                    <?php echo $ue['nbMatieres'] ?>
                                </td>
                                <td>
                                    <div class="col-sm-3">
                                        <a href="../Rp/ajouterUe.php?action=modifier&id=<?php echo $ue['id']; ?>" title="modifier" >
                                            <span class="fa fa-edit fa-2x"></span>
                                        </a>
                                    </div>
                                    <div class="col-sm-3">
                                        <a href="../Functions/ue.php?action=supprimer&id=<?php echo $ue['id']; ?>" title="supprimer">
                                            <span class="fa fa-remove fa-2x"></span>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Numero</th>
                            <th>Nom de l'UE</th>
                            <th>Nombre de Matieres</th>
                            <th>Actions</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="box-footer">
                    <div class="col-sm-3">
                        <a href="../Rp/ajouterUe.php" class="btn btn-block btn-primary"><i>Ajouter une Unite d'Enseignement</i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>