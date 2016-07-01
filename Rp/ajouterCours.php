<?php
session_start();
if(!isset($_SESSION['UserId']))
{
    header('location:../includes/lockscreen.php');
}
$nomPage = "Ajouter un Cours";
$page= '../Public/cours.php';
require_once('../includes/profileRp.php');
