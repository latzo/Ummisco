<?php
session_start();
if(!isset($_SESSION['UserId']))
{
    header('location:../includes/lockscreen.php');
}
if(!isset($_GET['id']))
{
    header('location:../includes/404.html');
}
$nomPage = "Informations sur le Candidat";
$page='content/voircandidatcontent.php';
$activeLP="active";
require_once('../includes/profileRp.php');

