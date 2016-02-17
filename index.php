<?php include_once("inc/config.php"); ?>
<?php include_once("inc/PDO-mysql.php"); ?>
<?php include_once("inc/functions.php"); ?>

<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $ossloginscreen; ?></title>
    <link rel="icon" href="./img/favicon.ico" />
    <link rel="author" href="./inc/humans.txt" />
	<link rel="stylesheet" href="./css/bootstrap.min.css">
	<link rel="stylesheet" href="./css/<?php echo $style; ?>.css">
	<link rel="stylesheet" href="./css/loginscreen.css">
    <link rel="stylesheet" href="./css/gh-fork-ribbon.min.css" />
</head>

<body>
<div class="github-fork-ribbon-wrapper left">
    <div class="github-fork-ribbon">
        <a href="https://github.com/djphil/osloginscreen" target="_blank">Fork me on GitHub</a>
    </div>
</div>

<div class="container">
    <img id="bgimage" src="<?php echo getRandomImage(); ?>" />
    <div id="topleft">
        <div class="logo">
            <?php include("inc/logo.php"); ?>
        </div>
        <div class="clearfix"></div>
        <div class="regionlist">
            <?php include("./inc/regionlist.php"); ?>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
    <div id="topright">
        <div class="gridstatus">
            <?php include("./inc/gridstatus.php"); ?>
        </div>
        <div class="clearfix"></div>
        <div class="flashinfo">
            <?php if ($displayflashinfo) {include("./inc/flashinfo.php");} ?>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

</body>
</html>
