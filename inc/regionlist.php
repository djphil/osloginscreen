<?php
if (isset($_GET['orderby']))
{
    if ($_GET['orderby'] == "") {$orderby = "RAND()";}
    else if ($_GET['orderby'] == "region") {$orderby = "regionName ASC";}
    else if ($_GET['orderby'] == "x") {$orderby = "locX ASC";}
    else if ($_GET['orderby'] == "y") {$orderby = "locY ASC";}
    else {$orderby = "RAND()";}
}
else {$orderby = "RAND()";} 
?>
<div class="panel panel-default <?php echo $class; ?>">
    <div class="panel-heading">
        <h3 class='panel-title'>
            <i class="glyphicon glyphicon-th-large pull-right"></i>
            <strong>Region list</strong>
        </h3>
    </div>
    <table class="table table-strided table-hover scroolbar">
        <tr>
            <th><a href="?orderby=region"><span class='label label-primary'>Region(s):</span></a></th>
            <th><a class="pull-right" href="?orderby=x"><span class='label label-danger'>Loc X:</span></a></th>
            <th><a class="pull-right" href="?orderby=y"><span class='label label-success'>Loc Y:</span></a></th>
        </tr>
        <?php
        $sql = $db->prepare("
            SELECT regionName, locX, locY
            FROM ".$tb_regions." 
            WHERE (regionName NOT LIKE '%http%' OR regionName NOT LIKE '%https%')
            ORDER BY ".$orderby."
        ");
        $sql->execute();

        $i = 0;
        while($row = $sql->fetch(PDO::FETCH_OBJ)) 
        {
            ++$i;
            if ($i > $region_max) break;
            $regionName = $row->regionName;
            $locX = $row->locX / 256;
            $locY = $row->locY / 256;

            echo '<tr>';
            echo '<td><a href="secondlife://'.$regionName.'/128/128/25">'.$regionName.'</a></td>';
            echo '<td><span class="badge badge-default badge-success pull-right">'.$locX.'</span></td>';
            echo '<td><span class="badge badge-default badge-danger pull-right">'.$locY.'</span></td>';
            echo '</tr>';
        }
        $sql = null;
        ?>
    </table>
    <?php if ($displaypanelfooter === TRUE): ?>
    <div class="panel-footer"></div>
    <?php endif; ?>
</div>