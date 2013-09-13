<?php

// 1

$myArray = array(1, 2, 3);
 
        foreach ($myArray as &$val) {
            $val *= 2;
        }
        // unset($val); // now uncomment and see the correct result
 
        foreach ($myArray as $val) {
            echo $val;
            echo '<br />';
        }
