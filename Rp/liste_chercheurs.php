<?php
session_start();
if(!isset($_SESSION['UserId']))
{
    header('location:../includes/lockscreen.php');
}
$nomPage = "Liste des chercheurs";
$page= '../Public/listeChercheurs.php';
require_once('../includes/profileRp.php');