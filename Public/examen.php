<?php

require_once '../Functions/matiere.php';
require_once '../Functions/enseignant.php';
require_once '../Functions/ummiscoActor.php';
require_once '../Functions/examen.php';

$matieres = allMatiere();

$enseignants = allEnseignant();

$ummiscoActors = [];

foreach ($enseignants as $enseignant)
{
    $ummiscoActors[$enseignant['id']] = unUmmiscoActor($enseignant['actor_id']);
}

if (isset($_GET['id']))
{
    $examen = unExamen($_GET['id']);


}




?>

<section class="content">
    <div class="row">
        <div class="col-md-12">

            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box box-header with-border">
                        <h3 class="box-title">
                            Ajouter  un Examen
                        </h3>
                    </div>
                    <form action="../Functions/examen.php" method="post" class="form-horizontal">
                        <div class="boy-body">
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <input type="hidden" name="id" value="<?php echo isset($examen['id'])?$examen['id']:null ; ?>" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="id_matiere" class="col-sm-2 control-label">Matiere :</label>
                                <div class="col-sm-8">
                                    <select name="id_matiere" id="" class="form-control">

                                        <?php foreach ($matieres as $matiere): ?>
                                            <option value="<?php echo $matiere['id'];  ?>" <?php echo isset($examen) && $matiere['id'] == $examen['id_matiere'] ? "selected" : null; ?> > <?php echo $matiere['nomMatiere']; ?> </option>
                                        <?php  endforeach; ?>

                                    </select>
                                </div>


                            </div>


                            <div class="form-group">
                                <label for="id_enseignant" class="col-sm-2 control-label" >Enseignant :</label>
                                <div class="col-sm-8">
                                    <select name="id_enseignant" id="" class="form-control">

                                        <?php foreach ($ummiscoActors as $key => $ummiscoActor): ?>
                                            <option value="<?php echo $key;  ?>" <?php  echo isset($examen) && $key == $examen['id_enseignant'] ? "selected" : null ; ?> > <?php echo $ummiscoActor['prenom'].' '.$ummiscoActor['nom']; ?> </option>
                                        <?php  endforeach; ?>

                                    </select>
                                </div>

                            </div>

                            <div class="form-group">
                                <label for="dateExamen" class="col-sm-2 control-label">Date d'examen :</label>
                                <div class="col-sm-10">
                                    <input type="date" name="dateExamen" placeholder="Date d'examen" value="<?php echo isset($examen['dateExamen'])?$examen['dateExamen']:null ; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="heureDebut" class="col-sm-2 control-label">Heure de Debut :</label>
                                <div class="col-sm-10">
                                    <input type="time" name="heureDebut" placeholder="Heure de Debut" value="<?php echo isset($examen['heureDebut'])?$examen['heureDebut']:null ; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="duree" class="col-sm-2 control-label">Duree :</label>
                                <div class="col-sm-10">
                                    <input type="number" name="duree" placeholder="Duree" value="<?php echo isset($examen['duree'])?$examen['duree']:null ; ?>" >
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="urlEpreuve" class="col-sm-2 control-label">Epreuve :</label>
                                <div class="col-sm-10">
                                    <input type="text" name="urlEpreuve" placeholder="Epreuve" value="<?php echo isset($examen['urlEpreuve'])?$examen['urlEpreuve']:null ; ?>" >
                                </div>
                            </div>
                            <div class="box-footer">
                                <div class="col-sm-2">

                                </div>
                                <div class="col-sm-8">
                                    <input type="submit" value="Ajouter un Examen" class="btn btn-info pull-left col-lg-4">
                                </div>

                            </div>

                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

