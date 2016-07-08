<?php

require_once '../Functions/etudiant.php';
require_once '../Functions/ummiscoActor.php';
require_once '../Functions/examen.php';
require_once '../Functions/matiere.php';

$classe = $_GET['classe'];

$etudiants = etudantClasse($classe);



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
                        <th></th>
                        <th>Action</th>
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

                        </td>
                        <td>
                            <a href="../Enseignant/ajouterNote.php?action=noter&etudiant=<?php echo $etudiant['id']; ?>"><button  class="btn btn-primary">Noter</button></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>

                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>
</div>

