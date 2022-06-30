<?php
function getPixelCountByColor($image, $color){ 
    $currentCount = 0; 
    for($x = 1; $x <= imagesx($image); $x++){ 
        for($y = 1; $y <= imagesy($image); $y++){ 
            if(imagecolorat($image, $x, $y) == $color){ 
                $currentCount++; 
            } 
        } 
    } 
}  
echo getPixelCountByColor('fundo_status.png', '#000');
?>