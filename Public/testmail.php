<?php
$donnees_ummiscoactor['email']="latyr@esp.sn";
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
if($PhpMailer ->Send())
{
echo "Message envoyé avec succes";
}
else
{
echo "ERREUR : Message non envoyé";
}