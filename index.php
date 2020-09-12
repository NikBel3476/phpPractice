<?php

require_once ('equation.php');
require_once ('functions.php');

print_r(line(1,1 ));
print_r("<br>");
print_r(square(1, 16, 3));
print_r("<br>");
print_r(cubic(1, 0, -5, 0));
print_r("<br>");
print_r(integral($func, 1, 3));
print_r("<br>");
print_r(volumeRotation($func, 1, 3));