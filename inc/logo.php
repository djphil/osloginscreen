<div class="panel panel-default <?php echo $class; ?>">
    <div class="panel-heading ">
        <h3 class='panel-title'>
            <i class="glyphicon glyphicon-picture pull-right"></i>
            <strong><?php echo $title; ?> Logo</strong>
        </h3>
    </div>

    <div class='panel-body'>
        <center>
            <a href="./">
                <img class="img-rounded img-responsive" src="./img/logo.png" alt="<?php echo $title; ?> <?php echo $title; ?>" />
            </a>
        </center>
    </div>
    <?php if ($displaypanelfooter === TRUE): ?>
        <div class="panel-footer"></div>
    <?php endif; ?>
</div>