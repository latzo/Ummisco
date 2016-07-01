<?php
session_start();
if(!isset($_SESSION['UserId']))
{
    header('location:../includes/lockscreen.php');
}
$nomPage = "Ajouter une Unite d'Enseignement";
$page= '../Public/ue.php';
require_once('../includes/profileRp.php');