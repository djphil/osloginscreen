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
    <meta name="description" content="<?php echo $title." - ".$subtitle; ?>">
    <meta name="author" content="Philippe Lemaire (djphil)">
    <link rel="icon" href="./img/favicon.ico" />
    <link rel="author" href="./inc/humans.txt" />
	<link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/<?php echo $style; ?>.css">
	<link rel="stylesheet" href="./css/osloginscreen.css">
<?php if ($transparency > 0) {include_once("css/css.php");} ?>
<?php if ($displayribbon === TRUE): ?>
    <link rel="stylesheet" href="./css/gh-fork-ribbon.min.css" />
<?php endif; ?>
<?php if ($displaynewsticker === TRUE): ?>
    <link rel="stylesheet" href="./css/newsticker.min.css" />
<?php endif; ?>
</head>

<body class="full fader">
<?php if ($displaymatrix === TRUE): ?>
<div id="matrix"></div>
<?php endif; ?>

<?php if ($displayslideshow === TRUE): ?>
<span id="fader">
    <style>.fader {background-image: url('<?php echo getRandomImage(); ?>');}</style>
</span>
<?php endif; ?>

<?php if ($displayribbon === TRUE): ?>
<div class="github-fork-ribbon-wrapper left">
    <div class="github-fork-ribbon">
        <a href="<?php echo $github; ?>" target="_blank">Fork me on GitHub</a>
    </div>
</div>
<?php endif; ?>

<div class="container-fluid">
    <div class="row">
        <div class="title">
            <?php if ($displaytitle === TRUE): ?>
            <h1 class=''><?php echo $title; ?></h1>
            <p><?php echo $subtitle; ?></p>
            <?php endif; ?>
        </div>

        <?php if ($displaycaroussel): ?>
        <div class="col-sm-12">
            <?php include_once("inc/carousel.php"); ?>
        </div>
        <?php endif; ?>

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
            <div class="newsticker">
                <?php if ($displaynewsticker) {include_once("./inc/newsticker.php");} ?>
            </div>
            <div class="registernow">
                <?php if ($displayregisternow) {include_once("./inc/registernow.php");} ?>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="gridstatus">
                <?php include_once("./inc/gridstatus.php"); ?>
            </div>
        </div>
    </div>
</div>

<div class="text-center footer copyright small">
    <?php echo $copyright; ?>
</div>

<?php $db = null; ?>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<?php if ($displayslideshow === TRUE): ?>
<!-- RELOADER -->
<script>setInterval(function() {$("#fader").load(location.href + " #fader");}, <?php echo $refresh; ?>);</script>
<?php endif; ?>

<?php if ($displaynewsticker): ?>
<script src="js/newsticker.min.js"></script>
<!--BEWSTICKER-->
<script>
$(function () {
    $(".basic").bootstrapNews({
        newsPerPage: 1,
        autoplay: true,
        pauseOnHover: true,
        navigation: false,
        direction: 'down',
        newsTickerInterval: 2500,
        onToDo: function () {
            // console.log(this);
        }
    });

    $(".demo1").bootstrapNews({
        newsPerPage: 1,
        autoplay: true,
        pauseOnHover:true,
        direction: 'down',
        newsTickerInterval: 2500,
        onToDo: function () {
            // console.log(this);
        }
    });

    $(".demo2").bootstrapNews({
        newsPerPage: 1,
        autoplay: false,
        onToDo: function () {
            // console.log(this);
        }
    });
});
</script>
<?php endif; ?>

<?php if ($displaycaroussel): ?>
<!-- CAROUSSEL -->
<script>
$(document).ready(function() {
    $('#myCarousel').carousel({interval: 5000})
    $('.carousel .item').each(function() {
        var next = $(this).next();
        if (!next.length) {next = $(this).siblings(':first');}
        next.children(':first-child').clone().appendTo($(this));
        for (var i = 0; i < 2; i++) {
            next=next.next();
            if (!next.length) {next = $(this).siblings(':first');}
            next.children(':first-child').clone().appendTo($(this));
        }
    });
});
</script>
<?php endif; ?>

</body>
</html>
