<?php
session_start();
if(!isset($_SESSION['UserId']))
{
    header('location:../includes/lockscreen.php');
}
$nomPage = "Tableau de Bord";
$page='content/profilecontent.php';
require_once('../includes/profileCandidat.php');
