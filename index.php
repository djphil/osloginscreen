<?php include_once("inc/config.php"); ?>
<?php include_once("inc/PDO-mysql.php"); ?>
<?php include_once("inc/functions.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title; ?></title>
    <link rel="icon" href="./img/favicon.ico" />
    <link rel="author" href="./inc/humans.txt" />
	<link rel="stylesheet" href="./css/loginscreen.css">
    <?php if ($displayribbon === TRUE) {echo '<link rel="stylesheet" href="./css/gh-fork-ribbon.min.css" />';} ?>
	<link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/<?php echo $style; ?>.css">
    <link href="./css/font-awesome.min.css" rel="stylesheet">
    <?php if ($transparency > 0) {include_once("css/css.php");} ?>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
<?php if ($displayribbon === TRUE): ?>
<div class="github-fork-ribbon-wrapper left">
    <div class="github-fork-ribbon">
        <a href="https://github.com/djphil/osloginscreen" target="_blank">Fork me on GitHub</a>
    </div>
</div>
<?php endif; ?>

<div class="container-fluid">
    <div id="bgimage" class="">
        <img id="bgimage" src="<?php echo getRandomImage(); ?>" />
    </div>
    <div class="row">
        <div class="title">
            <?php if ($displaytitle === TRUE): ?>
            <h1 class=''><?php echo $title; ?></h1>
            <p><?php echo $subtitle; ?></p>
            <?php endif; ?>
        </div>
        <div class="col-sm-4">
            <div class="logo">
                <?php include_once("inc/logo.php"); ?>
            </div>
            <div class="regionlist">
                <?php include_once("./inc/regionlist.php"); ?>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="flashinfo">
                <?php if ($displayflashinfo) {include_once("./inc/flashinfo.php");} ?>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="gridstatus">
                <?php include_once("./inc/gridstatus.php"); ?>
            </div>
        </div>
    </div>
</div>

<!-- RELOADER -->
<script>
$(document).ready(function() {
    setInterval(function() {
        $('#bgimage').load(document.URL +  ' #bgimage');
        $('#bgimage').hide();
        $('#bgimage').fadeIn('slow');   
        
    }, <?php echo $refresh; ?>);
});
</script>

</body>
</html>
