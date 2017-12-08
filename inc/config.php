<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$title      = "OpenSim Loginscreen";
$subtitle   = "A Loginscreen for Open Simulator";
$copyright  = "OpenSim Loginscreen v0.3 by djphil (CC-BY-NC-SA 4.0)";
$robustIP   = "<DNS_OR_IP_ADRESS>";
$robustPORT = "8002";
$refresh    = 30000;

// database access
$dbhost = "<DB HOST>";
$dbuser = "<DB USER>";
$dbpass = "<DB PASS>";
$dbname = "<DB NAME>";

// database tables
$tb_useraccount = "useraccounts";
$tb_land        = "land";
$tb_regions     = "regions";
$tb_griduser    = "griduser";
$tb_presence    = "presence";
$tb_assets      = "assets";     // fsassets
$tb_objects     = "objects";    // primitems
$tb_prims       = "prims";

// database fields
$fd_objectuuid  = "objectuuid"; // itemID

// bootstrap, slate
$style = "slate";

$region_max = 5;
$transparency = 0.0;
$displayassetsinfo  = TRUE;
$displayflashinfo   = TRUE;
$displayribbon      = TRUE;
$displaymatrix      = TRUE;
$displaytitle       = TRUE;
$displaypanelfooter = TRUE;

$flashinfo = "
    Welcome to <strong>$title</strong><br>
    Visit <a target='_blank' href='./'> the website</a> for more information ...
";
?>
