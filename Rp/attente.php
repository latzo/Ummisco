<?php
session_start();
if(!isset($_SESSION['UserId']))
{
    header('location:../includes/lockscreen.php');
}
$nomPage = "Liste d'attente";
$page='content/attentecontent.php';
$activeLA="active";
require_once('../includes/profileRp.php');

