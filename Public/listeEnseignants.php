<?php

require('../Functions/bdd.php');
$bdd = connexion();
$discr="enseignant";
$req=$bdd->prepare('select * from ummisco_actor where discr=:discr');
$req->execute(array(
'discr'=>$discr
));


?>



<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Liste des enseignants</h3>
                </div>
                <div class="box-body">
                    <table class="table table-bordered table-hover">
                        <theah>
                            <tr>
                                
                              <th>Nom</th>
                            <th>Prénom</th>
                            <th>Date de Naissance</th>
                            <th>Lieu de naissance</th>
                            <th>Nationalité</th>
							<th>Email</th>
							<th>Numéro de téléphone</th>
							<th>Nombre de publications</th>
                            <th>Actions</th>
                            </tr>
                        </theah>
						 <tbody>
                        <?php while ($res= $req->fetch())
									{ 
										$id=$res['id'];
										$req2=$bdd->prepare('select nbPublications from enseignant_chercheur where actor_id=:id');
										$req2->execute(array(
										'id'=>$id
										));
										$res2= $req2->fetch();
										$nbpub=$res2['nbPublications'];
								
								
								?>
                            <tr>
                                <td>
                                    <?php echo $res['nom']; ?>
                                </td>
                                <td>
                                    <?php echo $res['prenom']; ?>
                                </td>
                                <td>
                                    <?php
                                    echo $res['datNaiss'];
                                    ?>
                                </td>
								<td>
                                    <?php echo $res['lieuNaiss']; ?>
                                </td>
								<td>
                                    <?php echo $res['nationalite']; ?>
                                </td>
                                <td>
                                    <?php echo $res['email']; ?>
                                </td>
                                <td>
                                    <?php echo $res['numTel']; ?>
                                </td>
								<td>
                                    <?php echo $nbpub; ?>
                                </td>
                                <td>
                                    <div class="col-sm-3">
                                        <a  href="../Rp/modifier_enseignant.php?id_ens=<?php echo($res['id']);?>" title="modifier" >
                                            <span class="fa fa-edit fa-2x"></span>
                                        </a>
                                    </div>
									<script language="javascript">
										function supprimer()
											{
												if(confirm("Etes vous sûr de vouloir supprimer cet enseignant?"))
													{
														window.location.replace('../Rp/suppr_ens.php?id_ens=<?php echo $res['id']; ?>');
													}
											}






									</script>
                                    <div class="col-sm-3">
									
                                        <a title="supprimer" onClick="supprimer();">
                                            <span class="fa fa-remove fa-2x co"></span>
                                        </a>
                                    </div>

                                </td>
                            </tr>
						<?php } ?>
                        </tbody>
						 </table>
                </div>
                <div class="box-footer">
                    <div class="col-sm-3">
                        <a href="../Rp/ajouter_enseignant.php" class="btn btn-block btn-primary"><i>Ajouter un enseignant</i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
						
						
                    
</section>