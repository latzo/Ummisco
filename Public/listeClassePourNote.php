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
                            <th>Action</th>

                        </tr>
                        </thead>

                        <tbody>
                        <?php foreach ($classe as $item): ?>
                            <tr>
                                <td>
                                    <?php echo $item['id']; ?>
                                </td>
                                <td>
                                    <span><?php echo $item['nomClasse']; ?></span>
                                </td>
                                <td>
                                    <a href="listeEtudiantPourNote.php?classe=<?php echo $item['id']; ?>"><i class="fa fa-plus"></i></a>

                                </td>

                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Numero</th>
                            <th>Nom de la Classe</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>

            </div>
        </div>
    </div>
</section>