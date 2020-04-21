<div class="panel panel-default <?php echo $class; ?>">
    <div class="panel-heading">
        <h3 class='panel-title'>
            <i class="glyphicon glyphicon-log-in pull-right"></i>
            <strong>Registration</strong>
        </h3>
    </div>
    <div class='panel-body'>
        <a href="<?php echo $registernow; ?>" target="_blank" class="btn btn-success btn-block">
            <i class="glyphicon glyphicon-ok"></i> Join now, it's free!
        </a>
    </div>
    <?php if ($displaypanelfooter === TRUE): ?>
    <div class="panel-footer"></div>
    <?php endif; ?>
</div>