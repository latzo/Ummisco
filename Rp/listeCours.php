<?php
session_start();
if(!isset($_SESSION['UserId']))
{
    header('location:../includes/lockscreen.php');
}
$nomPage = "Liste des Cours";
$page= '../Public/listeCours.php';
require_once('../includes/profileRp.php');