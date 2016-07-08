<?php

require_once '../Functions/etudiant.php';
require_once '../Functions/matiere.php';
require_once '../Functions/examen.php';
require_once '../Functions/note.php';


$examens = allExamen();


$etudiants = etudantClasse($_GET['etudiant']);


if (isset($_GET['id']))
{
    $note = unNote($_GET['id']);
}



?>


<section class="content">
    <div class="row">
        <div class="col-md-12">

            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box box-header with-border">
                        <h3 class="box-title">
                            Ajouter  une Note
                        </h3>
                    </div>
                    <form action="../Functions/note.php" method="post" class="form-horizontal">
                        <div class="boy-body">

                            <div class="form-group">
                                <div class="col-sm-10">
                                    <input type="hidden" name="id" value="<?php echo isset($note['id'])?$note['id']:null ; ?>" class="form-control">
                                </div>
                            </div>



                            <div class="form-group">
                                <div class="col-sm-8">
                                    <input type="hidden" name="id_etudiant" value="<?php echo $_GET['etudiant'];?>">
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="id_examen" class="col-sm-2 control-label" >Examen :</label>
                                <div class="col-sm-8">
                                    <select name="id_examen" id="" class="form-control">

                                        <?php foreach ($examens as $examen): ?>
                                            <option value="<?php echo $examen['id'];  ?>" <?php  echo isset($note) && $examen['id'] == $note['id_examen'] ? "selected" : null ; ?> >
                                                <?php $matiere = uneMatiere($examen['id_matiere']);
                                                echo $matiere['nomMatiere']; ?>
                                            </option>
                                        <?php  endforeach; ?>

                                    </select>
                                </div>

                            </div>

                            <div class="form-group">
                                <label for="note" class="col-sm-2 control-label">Note :</label>
                                <div class="col-sm-10">
                                    <input type="text" name="note" placeholder="Note" value="<?php echo isset($note['note'])?$note['note']:null ; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="appreciation" class="col-sm-2 control-label">Appreciation :</label>
                                <div class="col-sm-10">
                                    <input type="text" name="appreciation" placeholder="Appreciation" value="<?php echo isset($note['appreciation'])?$note['appreciation']:null ; ?>" >
                                </div>
                            </div>


                            <div class="box-footer">
                                <div class="col-sm-2">

                                </div>
                                <div class="col-sm-8">
                                    <input type="submit" value="Noter" class="btn btn-info pull-left col-lg-4">
                                </div>

                            </div>

                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>



