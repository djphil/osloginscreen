<?php
function debug($variable)
{
	echo '<pre>' . print_r($variable, true) . '</pre>';
}

function getRandomImage()
{
    $images = glob('img/*.jpg');
    return $images[rand(0, count($images) - 1)];
}
?>