<?php
// Online / Offline with socket
$socket = @fsockopen($robustIP, $robustPORT, $errno, $errstr, 1);
if (is_resource($socket)) {$online = TRUE;}
else {$online = FALSE;}
@fclose($socket);

// Users count
$userscounter = $db->prepare("
    SELECT PrincipalID
    FROM ".$tb_useraccount." 
");
$userscounter->execute();
$userscounter = $userscounter->rowCount();

// Regions count
$landscounter = $db->prepare("
    SELECT UUID
    FROM ".$tb_land." 
");
$landscounter->execute();
$landscounter = $landscounter->rowCount();

// Regions Online count
$regionscounter = $db->prepare("
    SELECT uuid
    FROM ".$tb_regions." 
");
$regionscounter->execute();
$regionscounter = $regionscounter->rowCount();

// Single regions count
$singleregioncounter = $db->prepare("
    SELECT uuid
    FROM ".$tb_regions." 
    WHERE sizeX = 256
    AND sizeY = 256
");
$singleregioncounter->execute();
$singleregioncounter = $singleregioncounter->rowCount();

// Var regions count
$varregioncounter = $db->prepare("
    SELECT uuid
    FROM ".$tb_regions." 
    WHERE sizeX <> 256
    AND sizeY <> 256
");
$varregioncounter->execute();
$varregioncounter = $varregioncounter->rowCount();

// Total Area
$totalarea = $db->prepare("
    SELECT SUM(Area) AS totalarea
    FROM ".$tb_land." 
");
$totalarea->execute();
$totalarea = $totalarea->fetch(PDO::FETCH_ASSOC);
$totalarea = $totalarea['totalarea'] / 1000;

// Unique Visitor Last 24h
$now = time() - 86400;
$lastdayscounter = $db->prepare("
    SELECT UserID
    FROM ".$tb_griduser." 
    WHERE Login > ".$now."
");
$lastdayscounter->execute();
$lastdayscounter = $lastdayscounter->rowCount();

// Unique Visitor Last 30 Days
$now = time() - 2419200;
$lastmonthscounter = $db->prepare("
    SELECT UserID
    FROM ".$tb_griduser." 
    WHERE Login > ".$now."
");
$lastmonthscounter->execute();
$lastmonthscounter = $lastmonthscounter->rowCount();

// Online now count
$nowonlinescounter = $db->prepare("
    SELECT UserID
    FROM ".$tb_presence." 
");
$nowonlinescounter->execute();
$nowonlinescounter = $nowonlinescounter->rowCount();

// HG User count
$hguserscounter = $db->prepare("
    SELECT UserID, Online
    FROM ".$tb_griduser." 
    WHERE (UserID LIKE '%http%' OR UserID LIKE '%https%')
    AND Online LIKE 'True'
");
$hguserscounter->execute();
$hguserscounter = $hguserscounter->rowCount();
?>

<div class="panel panel-default <?php echo $class; ?>">
    <div class="panel-heading ">
        <h3 class='panel-title'>
            <i class="glyphicon glyphicon-stats"></i>
            <strong>Grid Status</strong>
            <?php
            if ($online === TRUE)
            {
                echo "<span class='label label-success pull-right'>";
                echo "<strong>ONLINE <i class='glyphicon glyphicon-ok'></i></strong>";
                echo "</span>";
            }
            else
            {
                echo "<span class='label label-danger pull-right'>";
                echo "<strong>OFFLINE <i class='glyphicon glyphicon-remove'></i></strong>";
                echo "</span>";
            }
            ?>
		</h3>
	</div>
    <ul class="nav nav-pills nav-justified">
        <li class="active"><a data-toggle="pill" href="#users">Users</a></li>
        <li><a data-toggle="pill" href="#regions">Regions</a></li>
    </ul>
    <div class="tab-content">
        <div id="users" class="list-group tab-pane fade in active no-margin">
            <li class="list-group-item list-group-item-default">
                Total Users<span class="badge"><?php echo $userscounter; ?></span>
            </li>
            <li class="list-group-item list-group-item-default">
                Unique Visitors (24 hours)<span class="badge"><?php echo $lastdayscounter; ?></span>
            </li>
            <li class="list-group-item list-group-item-default">
                Unique Visitors (30 days)<span class="badge"><?php echo $lastmonthscounter; ?></span>
            </li>
            <li class="list-group-item list-group-item-default">
                Total Users Online<span class="badge"><?php echo $nowonlinescounter; ?></span>
            </li>
            <li class="list-group-item list-group-item-default">
                Local Users Online<span class="badge"><?php echo ($nowonlinescounter - $hguserscounter) ; ?></span>
            </li>
            <li class="list-group-item list-group-item-default">
                HyperGrid User Online<span class="badge"><?php echo $hguserscounter; ?></span>
            </li>       
        </div>
        <div id="regions" class="list-group tab-pane fade no-margin">
            <li class="list-group-item list-group-item-default">
                Total Regions<span class="badge"><?php echo $landscounter; ?></span>
            </li>
            <li class="list-group-item list-group-item-default">
                Regions Online<span class="badge"><?php echo $regionscounter; ?></span>
            </li>
            <?php if ($regionscounter > 0): ?>
            <li class="list-group-item list-group-item-default">
                Single Regions<span class="badge"><?php echo $singleregioncounter; ?></span>
            </li>
            <li class="list-group-item list-group-item-default">
                Var Regions<span class="badge"><?php echo $varregioncounter; ?></span>
            </li>
            <?php endif; ?>
            <li class="list-group-item list-group-item-default">
                Total Area (km²)<span class="badge"><?php echo $totalarea; ?></span>
            </li>
        </div>
    </div>
    <?php if ($displaypanelfooter === TRUE): ?>
    <div class="panel-footer"></div>
    <?php endif; ?>
</div>