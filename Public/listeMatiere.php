<?php

require_once '../Functions/matiere.php';
require_once '../Functions/ue.php';

$matieres = allMatiere();
?>


<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Liste des Matieres</h3>
                </div>
                <div class="box-body">
                    <table class="table table-bordered table-hover">
                        <theah>
                            <tr>
                                <th>Numero</th>
                                <th>Nom de la Matiere</th>
                                <th>Nom de l'UE</th>
                                <th>Quantum Horaire</th>
                                <th>Coefficient</th>
                                <th>Actions</th>
                            </tr>
                        </theah>

                        <tbody>
                        <?php foreach ($matieres as $matiere): ?>
                            <tr>
                                <td>
                                    <?php echo $matiere['id']; ?>
                                </td>
                                <td>
                                    <?php echo $matiere['nomMatiere']; ?>
                                </td>
                                <td>
                                    <?php
                                    $ue = uneUe($matiere['id_ue']);
                                    echo $ue['nomUe'];
                                    ?>
                                </td>
                                <td>
                                    <?php echo $matiere['quantum']; ?>
                                </td>
                                <td>
                                    <?php echo $matiere['coefficient']; ?>
                                </td>
                                <td>
                                    <div class="col-sm-3">
                                        <a href="../Rp/ajouterMatiere.php?action=modifier&id=<?php echo $matiere['id']; ?>" title="modifier" >
                                            <span class="fa fa-edit fa-2x"></span>
                                        </a>
                                    </div>
                                    <div class="col-sm-3">
                                        <a href="../Functions/matiere.php?action=supprimer&id=<?php echo $matiere['id']; ?>" title="supprimer">
                                            <span class="fa fa-remove fa-2x co"></span>
                                        </a>
                                    </div>

                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                        <tbody>
                        <tr>
                            <th>Numero</th>
                            <th>Nom de la Matiere</th>
                            <th>Nom de l'UE</th>
                            <th>Quantum Horaire</th>
                            <th>Coefficient</th>
                            <th>Actions</th>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="box-footer">
                    <div class="col-sm-3">
                        <a href="../Rp/ajouterMatiere.php" class="btn btn-block btn-primary"><i>Ajouter un Matiere</i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>