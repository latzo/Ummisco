<?php
session_start();
require('../Functions/bdd.php');

var_dump($_POST);

 if(isset($_POST['email']) && isset($_POST['password']) )
			
		
 {
		 
		 
	   $bdd = connexion();
		
		$login=$_POST['email'];
		$pass_hache=sha1($_POST['password']);
		$req=$bdd->prepare('select id from ummisco_actor where email= :login and password= :pass');
		$req->execute(array(
		'login'=>$login,
		'pass'=>$pass_hache));
		$res=$req->fetch();
		$id=$res['id'];
		
		if(!$res){
			echo '<script>alert("Login ou mot de passe incorrect!")</script>';
			 
			echo '<META http-equiv="refresh" content="0;URL=http://localhost/Ummisco/Public/login.php">';
			
			
		}
		else{
			$req2=$bdd->prepare('select discr,nom,prenom from ummisco_actor where id=:id');
			$req2->execute(array(
			
			'id'=>$id));
			$res2=$req2->fetch();
			$discr=$res2['discr'];
			$prenom=$res2['prenom'];
			$nom=$res2['nom'];
			
			
			 if($discr=="candidat")
			 {
				 echo "
				 
				  <html>
					<head>
						<title>Page candidat</title>
						<meta charset='utf-8'>
					</head>
					<body>
						<center><h2>Page du candidat ".$prenom." ".$nom;
			    echo 	"</h2></center>
					</body>
				  </html>";
				 
				 
			
			}
			else{
				if($discr=="chercheur")
				{
				  echo "
				 
				  <html>
					<head>
						<title>Page chercheur</title>
						<meta charset='utf-8'>
					</head>
					<body>
						<center><h2>Page du chercheur ".$prenom." ".$nom;
				  echo 	"</h2></center>
					</body>
				 </html>";
				}
				else{
					  echo "
				 
						<html>
							<head>
								<title>Page enseignant</title>
								<meta charset='utf-8'>
							</head>
							<body>
								<center><h2>Page de l'enseignant(e) ".$prenom." ".$nom;
					echo 		"</h2></center>
							</body>
						</html>";
				}
			}
			 

			$_SESSION['id']=$res['id'];
			$_SESSION['login']=$login;
			
			 
			
			
		}
		 }
		
		   else{
			 echo 'Aucun login ou mot de passe defini!';
		   }
		
?>