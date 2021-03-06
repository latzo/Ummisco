<?php

include_once('../Functions/bdd.php');

//validation cote client ok
//Validation php a faire
function isValid()
{
	return true;

}

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

function enregistreFichier($nomFichier,$actorid)
{
	if(isset($_FILES[$nomFichier]) AND $_FILES[$nomFichier]['error']==0)
	{


		// Testons si le fichier n'est pas trop gros
		if ($_FILES[$nomFichier]['size'] <= 100000)
		{


			$infosfichier =pathinfo($_FILES[$nomFichier]['name']);
			$extension_upload = $infosfichier['extension'];
			$extensions_autorisees = array('pdf', 'docx', 'png', 'jpg', 'gif', 'jpeg');
			$d=basename($_FILES[$nomFichier]['name']);
			$genreFichier=substr($nomFichier,4);
			$nomFichierToSave='file'.$genreFichier.'.'.$extension_upload;
			$dossierUser='../UserFiles/User'.$actorid;
			if (in_array($extension_upload,$extensions_autorisees))
			{

				//si le dossier n'existe pas, on le cree
				if(!is_dir($dossierUser))
				{

					//on cree le dossier
					if(mkdir($dossierUser,0733,true))
					{

						//puis on y met le fichier
						//echo "dossier cree";
						move_uploaded_file($_FILES[$nomFichier]['tmp_name'], $dossierUser.'/'.$nomFichierToSave);

					}
				}
				else
				{
					move_uploaded_file($_FILES[$nomFichier]['tmp_name'], $dossierUser.'/'.$nomFichierToSave);
					//echo "ok";
				}

			}


		}

	}

}


if(isValid())
{
	extract($_POST);
	
	$donnees_ummiscoactor = array(
	'prenom' => strip_tags($prenom), 
	'nom' => strip_tags($nom),
	'datNaiss' => strip_tags($dateNaiss),
	'lieuNaiss' => strip_tags($lieuNaiss),
	'paysNaiss' => strip_tags($paysNaiss),
	'regionNaiss' => strip_tags($regionNaiss),
	'nationalite' => strip_tags($nationalite),
	'email' => strip_tags($email),
	'numTel' => strip_tags($numTel),
	'boitePostale' => strip_tags($boitePostale),
	'password' => sha1('passer'),
	'discr' => 'candidat',
	'sexe' => strip_tags($sexe),

	);

	$donnees_candidat = array(
	'ine' => $ine, 
	'cni' => $cni,
	'statut' => $statut,
	'situationFamiliale' => $situationFamiliale,
	'nbEnfants' => $nbEnfants,
	//'datSoumision' => date('Y-m-d H:i:s'),
	'categorieSocioPro' => $categorieSocioPro,
	'anneeEtude' => $anneeEtude,
	'cycle' => $cycle,
	'nbInscriptAnt' => $nbInscriptAnt,
	'redouble' => $redouble=='Oui'?1:0,
	'aptitude' => $aptitude=='Oui'?1:0,
	'signature' => 'signature',
	'statutBourse' => $statutBourse,

	);

	$donnees_adresse = array(
	'ville' => $ville, 

	);


	$donnees_bourse = array(
	'montantBourse' => $montantBourse ,
	'natureBourse' => $natureBourse,
	'tauxExoneration' => $tauxExoneration, 

	);

	$donnees_responsable = array(
	'nom' => $nomReponsable,
	'prenom' => $prenomResponsable,
	'email' => $emailResponsable, 
	'numTel' => $numTelResponsable,
	'boitePostale' => $boitePostaleResponsable,

	);

	$donnees_adresse_responsable = array(
	'ville' => $adresseReponsable, 

	);

	$donnees_diplome1 = array(
		'nomdiplome' => $nomDiplomeBac,
		'mention' => $mentionBac,
		'dateObtention' => $anneeObtentionBac,
		'lieuObtention' => $lieuObtentionBac,

	);

	$donnees_diplome2 = array(
		'nomdiplome' => $nomDiplome2,
		'mention' => $mentionDiplome2,
		'dateObtention' => $anneeObtentionDiplome2,
		'lieuObtention' => $lieuObtentionDiplome2,

	);

	$donnees_diplome3 = array(
		'nomdiplome' => $nomDiplome3,
		'mention' => $mentionDiplome3,
		'dateObtention' => $anneeObtentionDiplome3,
		'lieuObtention' => $lieuObtentionDiplome3,

	);

	$donnees_diplome4 = array(
		'nomdiplome' => $nomDiplome4,
		'mention' => $mentionDiplome4,
		'dateObtention' => $anneeObtentionDiplome4,
		'lieuObtention' => $lieuObtentionDiplome4,

	);

	$donnees_diplome5 = array(
		'nomdiplome' => $nomDiplome5,
		'mention' => $mentionDiplome5,
		'dateObtention' => $anneeObtentionDiplome5,
		'lieuObtention' => $lieuObtentionDiplome5,

	);




	//var_dump($donnees_ummiscoactor);
	//var_dump($donnees_candidat);
	//var_dump($donnees_adresse);
	//var_dump($donnees_diplome1);
	//var_dump($donnees_diplome2);
	//var_dump($donnees_diplome3);
	//var_dump($donnees_diplome4);
	//var_dump($donnees_diplome5);
	//var_dump($donnees_bourse);
	//var_dump($donnees_responsable);
	//var_dump($donnees_adresse_responsable);


	//Enregistrement dees donnees en bdd

	$bdd;

	$bdd = connexion();


	//Insertion dans la table adresse de l'adresse du candidat
	$req = $bdd->prepare('INSERT INTO adresse(ville) VALUES (:ville)');
	$req->execute($donnees_adresse);
	$req->closeCursor();
	$lastadresseid = $bdd->lastInsertId();

	//Ajout de l'id de l'adresse du candidat dans les donnees de la table ummiscoactor
	$donnees_ummiscoactor['adresse_id']=$lastadresseid;

	//Insertion de donnees dans la table ummiscoactor
	$req = $bdd->prepare('INSERT INTO ummisco_actor(prenom,nom,datNaiss,lieuNaiss,paysNaiss,regionNaiss,nationalite,email,numTel,boitePostale,password,discr,adresse_id,sexe)
		VALUES (:prenom,:nom,:datNaiss,:lieuNaiss,:paysNaiss,:regionNaiss,:nationalite,:email,:numTel,:boitePostale,:password,:discr,:adresse_id,:sexe)');
	$req->execute($donnees_ummiscoactor);
	$req->closeCursor();
	$lastummiscoactorid = $bdd->lastInsertId();

	//Insertion dans la table bourse
	$req = $bdd->prepare('INSERT INTO bourse(montantBourse,natureBourse,tauxExoneration)
		VALUES (:montantBourse,:natureBourse,:tauxExoneration)');
	$req->execute($donnees_bourse);
	$req->closeCursor();
	$lastbourseid = $bdd->lastInsertId();	
	

	//Insertion dans la table adresse pour le responsable
	$req = $bdd->prepare('INSERT INTO adresse(ville) VALUES (:ville)');
	$req->execute($donnees_adresse_responsable);
	$req->closeCursor();
	$lastadresseResid = $bdd->lastInsertId();
	
	
	//Ajout de l'id de l adresse du responsable
	$donnees_responsable['adresse_id'] = $lastadresseResid;
	
	
	//Insertion dans la tabe responsable
	$req = $bdd->prepare('INSERT INTO responsable(nom,prenom,email,numTel,boitePostale,adresse_id) 
		VALUES (:nom,:prenom,:email,:numTel,:boitePostale,:adresse_id)');
	$req->execute($donnees_responsable);
	$req->closeCursor();
	$lastresponsableid = $bdd->lastInsertId();


	//Recuperation de l id du departement
	$req = $bdd->query('SELECT id FROM departement WHERE nomDept=\''.$departement.'\'');
	$departement_id=$req->fetch()[0];
	$req->closeCursor();

	//Ajout de l id du departement auquel postule le candidat dans les donnees du candidat
	$donnees_candidat['departement_id']=$departement_id;

	//Ajout de l'id de la bourse dans les donnees du candidat
	$donnees_candidat['bourse_id'] = $lastbourseid;

	//Ajout de l'id du Responsable dans les donnees du candidat
	$donnees_candidat['responsable_id'] = $lastresponsableid;

	//Ajout de l'id du pere ummiscoactor dans les donnees du candidat
	$donnees_candidat['actor_id'] = $lastummiscoactorid;

	//var_dump($donnees_candidat);

	//Insertion dans candidat
	$req = $bdd->prepare('INSERT INTO candidat(ine,cni,statut,situationFamiliale,nbEnfants,datSoumission,categorieSocioPro,anneeEtude,cycle,nbInscriptAnt,
		redouble,aptitude,signature,statutBourse,departement_id,bourse_id,responsable_id,actor_id) 
		VALUES (:ine,:cni,:statut,:situationFamiliale,:nbEnfants, NOW() ,:categorieSocioPro,:anneeEtude,:cycle,:nbInscriptAnt,:redouble,:aptitude,
			:signature,:statutBourse,:departement_id,:bourse_id,:responsable_id,:actor_id)');
	$req->execute($donnees_candidat);
	$req->closeCursor();
	$lastcandidatid = $bdd->lastInsertId();


	//Gestion des fichiers
	enregistreFichier('fileBac',$lastummiscoactorid);
	enregistreFichier('fileDiplome2',$lastummiscoactorid);
	enregistreFichier('fileDiplome3',$lastummiscoactorid);
	enregistreFichier('fileDiplome4',$lastummiscoactorid);
	enregistreFichier('fileDiplome5',$lastummiscoactorid);
	enregistreFichier('fileVisiteMedicale',$lastummiscoactorid);
	enregistreFichier('fileavatar',$lastummiscoactorid);

	// Insertion des diplomes dans la table diplome
	//Prise en compte du diplome du Bac seulement pour le moment

	$donnees_diplome1['candidat_id']=$lastcandidatid;
	$donnees_diplome2['candidat_id']=$lastcandidatid;
	$donnees_diplome3['candidat_id']=$lastcandidatid;
	$donnees_diplome4['candidat_id']=$lastcandidatid;
	$donnees_diplome5['candidat_id']=$lastcandidatid;
	
	$req = $bdd->prepare('INSERT INTO diplome(nomDiplome,mention,dateObtention,lieuObtention,candidat_id)
		VALUES (:nomdiplome,:mention,:dateObtention,:lieuObtention,:candidat_id)');
	$req->execute($donnees_diplome1);
	$req->closeCursor();

	//Diplome2
	$req = $bdd->prepare('INSERT INTO diplome(nomDiplome,mention,dateObtention,lieuObtention,candidat_id)
		VALUES (:nomdiplome,:mention,:dateObtention,:lieuObtention,:candidat_id)');
	$req->execute($donnees_diplome2);
	$req->closeCursor();

	//Diplome3
	$req = $bdd->prepare('INSERT INTO diplome(nomDiplome,mention,dateObtention,lieuObtention,candidat_id)
		VALUES (:nomdiplome,:mention,:dateObtention,:lieuObtention,:candidat_id)');
	$req->execute($donnees_diplome3);
	$req->closeCursor();

	//Diplome4
	$req = $bdd->prepare('INSERT INTO diplome(nomDiplome,mention,dateObtention,lieuObtention,candidat_id)
		VALUES (:nomdiplome,:mention,:dateObtention,:lieuObtention,:candidat_id)');
	$req->execute($donnees_diplome4);
	$req->closeCursor();

	//Diplome5
	$req = $bdd->prepare('INSERT INTO diplome(nomDiplome,mention,dateObtention,lieuObtention,candidat_id)
		VALUES (:nomdiplome,:mention,:dateObtention,:lieuObtention,:candidat_id)');
	$req->execute($donnees_diplome5);
	$req->closeCursor();

	$message =
		"
<div class=\"box box-info\">
<div class=\"box-header with-border\">
<h3 class=\"box-title\">Ummisco</h3>
</div><!-- /.box-header -->
<div class=\"box-body\">
    <p>
        Bonjour. Vous avez eu à candidater au niveau du Master Syscom de l'Ummisco.
        Afin que votre candidature soit officialisé, veuilez suivre le lien ci-dessus.
    </p>
</div><!-- /.box-body -->
<div class=\"box-footer\">
    <a href=\"http://localhost/ummisco/public/firstconnexion.php?email=".$donnees_ummiscoactor['email']."&password=passer\">Activer mon compte</a>
</div><!-- /.box-footer -->

</div><!-- /.box -->
";

//Tentative d'envoi de mail
	require '../config/phpmailer/vendor/phpmailer/phpmailer/PHPMailerAutoload.php';
	$destinataire = $donnees_ummiscoactor['email']; //le destinataire
//Contenu

	$content= $message; //le contenu de message html
	$PhpMailer = new PHPMailer();
	$PhpMailer->CharSet =  "utf-8";
	$PhpMailer ->IsSMTP();
	$PhpMailer ->SMTPAuth = true;
	$PhpMailer ->Username = "ummisco.ucad.mastersyscom@gmail.com";
	$PhpMailer ->Password = "repasser";
	$PhpMailer ->SMTPSecure = "ssl";
	$PhpMailer ->Host = "smtp.gmail.com";
	$PhpMailer ->Port = "465";
	$PhpMailer ->setFrom('ummisco.ucad.mastersyscom@gmail.com', 'Ummisco');
	$PhpMailer ->Subject  =  'Validation preinscription ummisco';
	$PhpMailer ->IsHTML(true);
	$PhpMailer ->AddAddress($destinataire);
	$body=$content;
	$PhpMailer ->msgHTML($body);
	$PhpMailer ->Send();

	/*{
		echo "Message envoyé avec succes";
	}
	else
	{
		echo "ERREUR : Message non envoyé";
	}

	*/

	//Redirection vers la page success
	header("location:preinscription.php?action=success&mail=".$donnees_ummiscoactor['email']);
	

}
else
{
	echo "Faut remplir";
}

?>
