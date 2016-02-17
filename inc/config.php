<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
header("Refresh: 10");

$dbhost = "<DB HOST>";
$dbuser = "<DB USER>";
$dbpass = "<DB PASS>";
$dbname = "<DB NAME>";

$ossloginscreen = "OpenSim Loginscreen";
$robustIP   = "<ROBUST IP/DOMAIN>";
$robustPORT = "<ROBUST PORT>";

// bootstrap, slate
$style = "slate";

$regionMAX = 5;
$displayflashinfo = FALSE;
$flashinfo = "
    Welcome to $ossloginscreen<br>
    Visit <a target='_blank' href='./'> the website</a> for more information ...
";
?>
