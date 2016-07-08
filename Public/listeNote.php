<?php

require_once '../Functions/matiere.php';
require_once '../Functions/note.php';
require_once '../Functions/ummiscoActor.php';
require_once '../Functions/';

$matieres = allMatiere();
$etudiants = etudantClasse($classe);

?>


<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Liste des Cours</h3>
                </div>
                <div class="box-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Numero</th>
                            <th>Prenom et Nom de l'etudiant</th>
                            <?php foreach ($matieres as $matiere):?>
                                <th>
                                    <?php echo $matiere['nomMatiere']; ?>
                                </th>
                            <?php endforeach; ?>

                        </tr>
                        </thead>

                        <tbody>
                        <?php foreach ($etudiant as $item): ?>
                            <tr>
                                <td>
                                    <?php echo $item['id']; ?>
                                </td>
                                <td>
                                    <?php
                                    $enseignant = unEnseignant($item['id_enseignant']);
                                    $ummiscoActor = unUmmiscoActor($enseignant['actor_id']);
                                    echo $ummiscoActor['prenom'].' '.$ummiscoActor['nom'];
                                    ?>
                                </td>
                                <?php foreach ($matieres as $matiere):?>
                                    <td>
                                        
                                    </td>
                                <?php endforeach; ?>
                                <td>
                                    <div class="col-sm-3">
                                        <a href="../Rp/ajouterCours.php?action=modifier&id=<?php echo $item['id']; ?>" title="modifier" >
                                            <span class="fa fa-edit fa-2x"></span>
                                        </a>
                                    </div>
                                    <div class="col-sm-3">
                                        <a href="../Functions/cours.php?action=supprimer&id=<?php echo $item['id']; ?>" title="supprimer">
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
                            <th>Nom de la Matiere</th>
                            <th>Nom de l'Enseignant</th>
                            <th>Heure de debut</th>
                            <th>Heure de fin</th>
                            <th>Duree</th>
                            <th>Date du Cours</th>
                            <th>Lieu</th>
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