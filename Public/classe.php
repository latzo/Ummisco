<?php
require_once '../Functions/classe.php';
if (isset($_GET['id']))
{
    $classe = unClasse($_GET['id']);
}


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
                    <form action="../Functions/classe.php" method="post" class="form-horizontal">
                        <div class="boy-body">
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <input type="hidden" name="id" value="<?php echo isset($classe['id'])?$classe['id']:null ; ?>" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="nomClasse" class="col-sm-2 control-label">Nom de la Classe :</label>
                                <div class="col-sm-8">
                                    <input type="text" name="nomClasse" placeholder="Nom de la Classe" class="form-control" value="<?php echo isset($classe['nomClasse'])?$classe['nomClasse']:null ; ?>">
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
