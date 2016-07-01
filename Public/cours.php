<?php

require_once '../Functions/matiere.php';
require_once '../Functions/enseignant.php';
require_once '../Functions/ummiscoActor.php';
require_once '../Functions/cours.php';


$matieres = allMatiere();

$enseignants = allEnseignant();

$ummiscoActors = [];

foreach ($enseignants as $enseignant)
{
    $ummiscoActors[$enseignant['id']] = unUmmiscoActor($enseignant['actor_id']);
}

if (isset($_GET['id']))
{
    $cours = unCours($_GET['id']);
}



?>


<section class="content">
    <div class="row">
        <div class="col-md-12">

                <div class="col-md-12">
                    <div class="box box-info">
                        <div class="box box-header with-border">
                            <h3 class="box-title">
                                Ajouter  un cours
                            </h3>
                        </div>
                        <form action="../Functions/cours.php" method="post" class="form-horizontal">
                            <div class="boy-body">
                                <div class="form-group">
                                    <div class="col-sm-10">
                                        <input type="hidden" name="id" value="<?php echo isset($cours['id'])?$cours['id']:null ; ?>" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="id_matiere" class="col-sm-2 control-label">Matiere :</label>
                                    <div class="col-sm-8">
                                        <select name="id_matiere" id="" class="form-control">

                                            <?php foreach ($matieres as $matiere): ?>
                                                <option value="<?php echo $matiere['id'];  ?>" <?php echo isset($cours) && $matiere['id'] == $cours['id_matiere'] ? "selected" : null; ?> > <?php echo $matiere['nomMatiere']; ?> </option>
                                            <?php  endforeach; ?>

                                        </select>
                                    </div>


                                </div>


                                <div class="form-group">
                                    <label for="id_enseignant" class="col-sm-2 control-label" >Enseignant :</label>
                                    <div class="col-sm-8">
                                        <select name="id_enseignant" id="" class="form-control">

                                            <?php foreach ($ummiscoActors as $key => $ummiscoActor): ?>
                                                <option value="<?php echo $key;  ?>" <?php  echo isset($cours) && $key == $cours['id_enseignant'] ? "selected" : null ; ?> > <?php echo $ummiscoActor['prenom'].' '.$ummiscoActor['nom']; ?> </option>
                                            <?php  endforeach; ?>

                                        </select>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label for="heureDebut" class="col-sm-2 control-label">Heure de Debut :</label>
                                    <div class="col-sm-10">
                                        <input type="time" name="heureDebut" placeholder="Heure de Debut" value="<?php echo isset($cours['heureDebut'])?$cours['heureDebut']:null ; ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="duree" class="col-sm-2 control-label">Duree :</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="duree" placeholder="Duree" value="<?php echo isset($cours['duree'])?$cours['duree']:null ; ?>" >
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="dateCours" class="col-sm-2 control-label">Date Cours :</label>
                                    <div class="col-sm-10">
                                        <input type="date" name="dateCours" placeholder="Date du Cours" value="<?php echo isset($cours['dateCours'])?$cours['dateCours']:null ; ?>" >
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="lieu" class="col-sm-2 control-label">Lieu du Cours</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="lieu" placeholder="Lieu du Cours " value="<?php echo isset($cours['lieu'])?$cours['lieu']:null ; ?>" >
                                    </div>
                                </div>
                                <div class="box-footer">
                                    <div class="col-sm-2">

                                    </div>
                                    <div class="col-sm-8">
                                        <input type="submit" value="Ajouter un Cours" class="btn btn-info pull-left col-lg-4">
                                    </div>

                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            
        </div>
    </div>
</section>

