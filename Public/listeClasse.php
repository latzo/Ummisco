<?php

require_once '../Functions/classe.php';
require_once '../Functions/etudiant.php';

$classe = allClasse();



?>


<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Liste des Classes</h3>
                </div>
                <div class="box-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Numero</th>
                            <th>Nom de la Classe</th>
                            <th>Nombre d'Etudant</th>
                            <th>Actions</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php foreach ($classe as $item): ?>
                            <tr>
                                <td>
                                    <?php echo $item['id']; ?>
                                </td>
                                <td>
                                    <?php echo $item['nomClasse']; ?>
                                </td>
                                <td>
                                    <?php
                                        $etudiants = etudantClasse($item['id']);
                                        echo count($etudiants);
                                    ?>
                                </td>


                                <td>
                                    <div class="col-sm-3">
                                        <a href="../Rp/ajouterClasse.php?action=modifier&id=<?php echo $item['id']; ?>" title="modifier" >
                                            <span class="fa fa-edit fa-2x"></span>
                                        </a>
                                    </div>
                                    <div class="col-sm-3">
                                        <a href="../Functions/classe.php?action=supprimer&id=<?php echo $item['id']; ?>" title="supprimer">
                                            <span class="fa fa-remove fa-2x"></span>
                                        </a>
                                    </div>
                                    <div class="col-sm-3">
                                        <a href="../Rp/ajouterClasseMatiere.php?classe=<?php echo $item['id']; ?>" title="ajouter une matiere">
                                            <span class="fa fa-plus fa-2x"></span>
                                        </a>
                                    </div>


                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Numero</th>
                            <th>Nom de la Classe</th>
                            <th>Nombre d'Etudant</th>
                            <th>Actions</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="box-footer">
                    <div class="col-sm-3">
                        <a href="../Rp/ajouterCours.php" class="btn btn-block btn-primary"><i>Ajouter un Cours</i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>