<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$title = "OpenSim Loginscreen";
$subtitle = "A Loginscreen for OpenSimulator";
$copyright = "OpenSim Loginscreen v0.3 by djphil (CC-BY-NC-SA 4.0)";
$github = "https://github.com/djphil/osloginscreen";
$robustIP   = "<DNS_OR_IP_ADRESS>";
$robustPORT = "8002";

// database access
$dbhost = "<DB HOST>";
$dbuser = "<DB USER>";
$dbpass = "<DB PASS>";
$dbname = "<DB NAME>";

// database tables
$tb_useraccount = "useraccounts";
$tb_land = "land";
$tb_regions = "regions";
$tb_griduser = "griduser";
$tb_presence = "presence";
$tb_assets = "assets"; // fsassets
$tb_objects = "objects"; // primitems
$tb_prims = "prims";

// database fields
$fd_objectuuid  = "objectuuid"; // itemID

// bootstrap, slate, etc ...
$style = "slate";
$transparency = 0.0;
$region_max = 5;

$displayribbon = TRUE;
$displaymatrix = TRUE;
$displaytitle = TRUE;
$displaypanelfooter = TRUE;
$displaycaroussel = TRUE;
$displaynewsticker = FALSE;
$displayassetsinfo = FALSE;

$displayslideshow = TRUE;
$refresh = 3000;

$displayregisternow = TRUE;
$registernow = "./";

$displayflashinfo = TRUE;
$flashinfo = "
    Welcome to <strong>$title</strong><br>
    Visit <a target='_blank' href='".$github."'> the repository</a> for more information ...
";

/* CAROUSEL */
$carousel_class = "img img-responsive img-rounded";
$carousel_images = [
    "carousel1.jpg",
    "carousel2.jpg",
    "carousel3.jpg",
    "carousel4.jpg",
    "carousel1.jpg",
    "carousel2.jpg",
    "carousel3.jpg",
    "carousel4.jpg"
];
?>