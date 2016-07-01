<?php
session_start();
if(!isset($_SESSION['UserId']))
{
    header('location:../includes/lockscreen.php');
}
$nomPage = "Liste Principale";
$page='content/principalecontent.php';
$activeLP="active";
require_once('../includes/profileRp.php');

