<?php
if ($displayassetsinfo === TRUE)
{
    // Objects count
    $objectscounter = $db->prepare("
        SELECT ".$fd_objectuuid."
        FROM ".$tb_objects." 
    ");
    $objectscounter->execute();
    $objectscounter = $objectscounter->rowCount();

    // Prims count
    $primscounter = $db->prepare("
        SELECT UUID
        FROM ".$tb_prims ." 
    ");
    $primscounter->execute();
    $primscounter = $primscounter->rowCount();

    // Assets count
    $assetscounter = $db->prepare("
        SELECT id
        FROM ".$tb_assets." 
    ");
    $assetscounter->execute();
    $assetscounter = $assetscounter->rowCount();
}
?>
<div class="panel panel-default <?php echo $class; ?>">
    <div class="panel-heading">
        <h3 class='panel-title'>
            <i class="glyphicon glyphicon-th-large pull-right"></i>
            <strong>Assets Stats</strong>
        </h3>
    </div>
    <?php if ($displayassetsinfo === TRUE): ?>
    <li class="list-group-item list-group-item-default">
        Total Objects<span class="badge"><?php echo $objectscounter; ?></span>
    </li>
    <li class="list-group-item list-group-item-default">
        Total Prims<span class="badge"><?php echo $primscounter; ?></span>
    </li>
    <li class="list-group-item list-group-item-default">
        Total Assets<span class="badge"><?php echo $assetscounter; ?></span>
    </li>
    <?php endif; ?>

    <?php if ($displaypanelfooter === TRUE): ?>
    <div class="panel-footer"></div>
    <?php endif; ?>
</div>
