<?php
session_start();
if(!isset($_SESSION['UserId']))
{
    header('location:../includes/lockscreen.php');
}
$nomPage = "Ajouter une Matiere";
$page= '../Public/matiere.php';
require_once('../includes/profileRp.php');