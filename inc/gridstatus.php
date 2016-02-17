<?php
// Online / Offline with socket
if ($socket = fsockopen($robustIP, $robustPORT, $errno, $errstr, 1)) {$online = TRUE;}
else{$online = FALSE;}
fclose($socket);

// Users count
$sql = $db->prepare("
    SELECT PrincipalID
    FROM useraccounts 
");
$sql->execute();
$userscounter = $sql->rowCount();

// Regions count
$sql = $db->prepare("
    SELECT UUID
    FROM land 
");
$sql->execute();
$landscounter = $sql->rowCount();

// Regions Online count
$sql = $db->prepare("
    SELECT uuid
    FROM regions 
");
$sql->execute();
$regionscounter = $sql->rowCount();

// Unique Visitor Last 24h
$now = time() - 86400;
$sql = $db->prepare("
    SELECT UserID
    FROM griduser 
    WHERE Login > ".$now."
");
$sql->execute();
$lastdayscounter = $sql->rowCount();

// Unique Visitor Last 30 Days
$now = time() - 2419200;
$sql = $db->prepare("
    SELECT UserID
    FROM griduser 
    WHERE Login > ".$now."
");
$sql->execute();
$lastmonthscounter = $sql->rowCount();

// Online now count
$sql = $db->prepare("
    SELECT UserID
    FROM presence 
");
$sql->execute();
$nowonlinescounter = $sql->rowCount();

// HG User count
$zero_uuid = "00000000-0000-0000-0000-000000000000";
$sql = $db->prepare("
    SELECT RegionID
    FROM presence 
    WHERE RegionID = ".$zero_uuid."
");
$sql->execute();
$hguserscounter = $sql->rowCount();

// Objects count
$sql = $db->prepare("
    SELECT objectuuid
    FROM objects 
");
$sql->execute();
$objectscounter = $sql->rowCount();

// Prims count
$sql = $db->prepare("
    SELECT UUID
    FROM prims 
");
$sql->execute();
$primscounter = $sql->rowCount();

// Assets count
$sql = $db->prepare("
    SELECT id
    FROM assets 
");
$sql->execute();
$assetscounter = $sql->rowCount();
?>

<div class="panel panel-default <?php echo $class; ?>">
	<div class="panel-heading ">
		<h3 class='panel-title'>
			<i class="glyphicon glyphicon-stats"></i>
			<strong>Grid Status</strong>
            <?php
                if ($online == TRUE)
                {
                    echo "<span class='label label-default label-success pull-right'>";
                    echo "<strong>ONLINE <i class='glyphicon glyphicon-ok'></i></strong>";
                    echo "</span>";
                }
                else
                {
                    echo "<span class='label label-default label-danger pull-right'>";
                    echo "<strong>OFFLINE <i class='glyphicon glyphicon-remove'></i></strong>";
                    echo "</span>";
                }
            ?>
		</h3>
	</div>

    <div class="list-group">
        <li class="list-group-item list-group-item-default">
            Total Users<span class="badge"><?php echo $userscounter; ?></span>
        </li>
        <li class="list-group-item list-group-item-default">
            Total Regions<span class="badge"><?php echo $landscounter; ?></span>
        </li>
        <li class="list-group-item list-group-item-default">
            Regions Onlines<span class="badge"><?php echo $regionscounter ?></span>
        </li>
        <li class="list-group-item list-group-item-default">
            Unique Visitors (30 days)<span class="badge"><?php echo $lastmonthscounter; ?></span>
        </li>
        <li class="list-group-item list-group-item-default">
            Unique Visitors (24 hours)<span class="badge"><?php echo $lastdayscounter; ?></span>
        </li>
        <li class="list-group-item list-group-item-default">
            User Online Now<span class="badge"><?php echo $nowonlinescounter; ?></span>
        </li>
        <li class="list-group-item list-group-item-default">
            HG User Online Now<span class="badge"><?php echo $hguserscounter; ?></span>
        </li>
        <li class="list-group-item list-group-item-default">
            Total Objects<span class="badge"><?php echo $objectscounter; ?></span>
        </li>
        <li class="list-group-item list-group-item-default">
            Total Prims<span class="badge"><?php echo $primscounter; ?></span>
        </li>
        <li class="list-group-item list-group-item-default">
            Total Assets<span class="badge"><?php echo $assetscounter; ?></span>
        </li>        
    </div>
</div>
