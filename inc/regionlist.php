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
    <div class="panel-heading ">
        <h3 class='panel-title'>
            <i class="glyphicon glyphicon-th-large pull-right"></i>
            <strong>Region list</strong>
        </h3>
    </div>

    <table class="table table-strided">
        <tr>
            <th><a href="?orderby=region"><span class='label label-primary'>Region(s):</span></a></th>
            <th><a class="pull-right" href="?orderby=x"><span class='label label-success'>Loc X:</span></a></th>
            <th><a class="pull-right" href="?orderby=y"><span class='label label-danger'>Loc Y:</span></a></th>
        </tr>

        <?php
        $sql = $db->prepare("
            SELECT regionName, locX, locY
            FROM regions 
            ORDER BY ".$orderby."
        ");

        $sql->execute();

        $i = 0;

        while($row = $sql->fetch(PDO::FETCH_OBJ)) 
        {
            ++$i;
            if ($i > $regionMAX) break;

            $regionName = $row->regionName;
            $locX = $row->locX/256;
            $locY = $row->locY/256;

            echo '<tr>';
            echo '<td>';
            echo '<a href="secondlife://'.$regionName.'/128/128/25">';
            echo $regionName;
            echo '</a>';
            echo '</td>';
            echo '<td><span class="badge badge-default badge-success pull-right">'.$locX.'</span></td>';
            echo '<td><span class="badge badge-default badge-danger pull-right">'.$locY.'</span></td>';
            echo '</tr>';
        }
        ?>
    </table>
</div>
