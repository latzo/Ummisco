<?php
session_start();
if(!isset($_SESSION['UserId']))
{
    header('location:../includes/lockscreen.php');
}
$nompage="Ma Preinscription";
$page="/content/mapreinscriptioncontent.php";
require "../includes/profileCandidat.php";