<?php

require_once '../Functions/matiere.php';

$matieres = allMatiere();

?>


<section class="content">
    <div class="row">
        <div class="col-md-12">

            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box box-header with-border">
                        <h3 class="box-title">
                            Ajouter  une classe
                        </h3>
                    </div>
                    <form action="../Functions/classeMatiere.php" method="post" class="form-horizontal">
                        <div class="boy-body">
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <input type="hidden" name="id" value="<?php echo isset($classe['id'])?$classe['id']:null ; ?>" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-8">
                                    <input type="hidden" name="id_classe"  class="form-control" value="<?php echo $_GET['classe'] ; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="id_matiere" class="col-sm-2 control-label">Matiere :</label>
                                <div class="col-sm-8">
                                    <select name="id_matiere" id="">
                                     <?php foreach ($matieres as $matiere):?>
                                        <option value="<?php echo $matiere['id'] ?>"> <?php echo $matiere['nomMatiere']; ?></option>
                                     <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="box-footer">
                                <div class="col-sm-2">

                                </div>
                                <div class="col-sm-8">
                                    <input type="submit" value="Ajouter une Classe" class="btn btn-info pull-left col-lg-4">
                                </div>

                            </div>

                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>
