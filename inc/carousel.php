<div class="panel panel-default <?php echo $class; ?>">
    <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#CAROUSEL">
        <h3 class='panel-title'>
            <i class="glyphicon glyphicon-picture pull-right"></i>
            <strong>Carousel</strong>
        </h3>
    </div>
    <!-- in -->
    <div class="panel-collapse collapse in" id="CAROUSEL">
        <div class='panel-body'>
            <div class="carousel slide" id="myCarousel">
                <div class="carousel-inner">
                    <?php
                    $n = 0;
                    foreach ($carousel_images AS $image)
                    {
                        ++$n;
                        if ($n == 1) echo '<div class="item active">';
                        else echo '<div class="item">';
                        echo '<div class="col-xs-3">';
                        echo '<a href="#"><img src="img/carousel/'.$image.'" class="'.$carousel_class.'"></a>';
                        echo '</div>';
                        echo '</div>';
                    }
                    ?>
                </div>
                <a class="left carousel-control" href="#myCarousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
            </div>
        </div>
    </div>
    <?php if ($displaypanelfooter === TRUE): ?>
    <div class="panel-footer"></div>
    <?php endif; ?>
</div>