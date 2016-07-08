<?php

require_once '../Functions/etudiant.php';
require_once '../Functions/ummiscoActor.php';
require_once '../Functions/examen.php';
require_once '../Functions/matiere.php';

$etudiants = allEtudiant();



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
                        <th>Liste des Etudiant</th>
                        <th>Matiere</th>
                        <th >Noter</th>
                        <th></th>
                        <th>Action</th>
                    </tr>
                    <tr>
                        <td></td>
                        <th>
                            <select name="id_examen" id="">
                                <?php $examens = allExamen(); ?>

                                <?php foreach ($examens as $examen):?>
                                    <option value="<?php echo $examen['id']; ?>">
                                        <?php $matiere = uneMatiere($examen['id_matiere']); echo $matiere['nomMatiere']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>

                        </th>
                        <th>Note</th>
                        <th>Appreciation</th>
                        <th></th>
                    </tr>
                    <?php foreach ($etudiants as $etudiant): ?>
                    <tr>
                        <td>
                            <?php $ummiscoActor = unUmmiscoActor($etudiant['actor_id']);
                            echo $ummiscoActor['prenom'].' '.$ummiscoActor['nom'];
                            ?>
                            <input type="hidden" name="id_etudiant" value="<?php echo $etudiant['id'];?>">
                        </td>
                        <td>
                            <input type="hidden" name="id_examen">
                        </td>
                        <td>
                            <input type="text" name="note" placeholder="Note" width="5" height="5">
                        </td>
                        <td>
                            <input type="text" name="appreciation">
                        </td>
                        <td>
                            <input type="submit" value="Noter">
                        </td>
                    </tr>
                    <?php endforeach; ?>

                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>
</div>

