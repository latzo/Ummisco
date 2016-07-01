<?php
require "../config/config.php";
require "../Functions/bdd.php";
$bdd=$connexion();
$req=$bdd->query("SELECT * FROM classe");
if($req->rowCount()>0)
{
    while ($donnee=$req->fetch())
    {
        $nomClasse=$donnee['nomClasse'];
    }
}
?>
<div>

</div>