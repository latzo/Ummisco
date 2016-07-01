<?php
session_start();
if(!isset($_SESSION['UserId']))
{
    header('location:../includes/lockscreen.php');
}
$nomPage = "Informations sur le Candidat";
$page='content/voircandidatcontent.php';
$activeLP="active";
require_once('../includes/profileRp.php');

