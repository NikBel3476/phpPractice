<?php

// ax + b = 0
function line($a=0, $b=0) {
    if (is_numeric($a) && is_numeric($b)) {
        if ($a != 0) {
            return [-$b / $a];
        }
    }
    return [];
}

// ax^2 + bx + c = 0
function square($a=0, $b=0, $c=0) {
    if (is_numeric($a) && is_numeric($b) && is_numeric($c)) {
        if ($a === 0) {
            return line($b, $c);
        } else {
            $D = $b**2 - 4 * $a * $c;
            if ($D < 0) {
                return [];
            } elseif ($D === 0) {
                return [-$b/(2 * $a)];
            } else {
                return [(-$b - sqrt($D)) / (2 * $a), (-$b + sqrt($D)) / (2 * $a)];
            }
        }
    }
}

// ax^3 + bx^2 + cx + d = 0
function cubic($a=0, $b=0, $c=0, $d=0) {
    if (is_numeric($a) && is_numeric($b) && is_numeric($c) && is_numeric($d)) {
        if ($a === 0) {
            return [(square($b, $c, $d))];
        } else {
            $p = (3 * $a * $c - $b * $b) / 3 * $a * $a;
            $q = (2 * $b * $b * $b - 9 * $a * $b * $c + 27 * $a * $a * $d) / (27 * $a * $a * $a);
            $Q = Math.pow($q / 3, 3) + Math.pow($q / 2, 2);

            if ($Q == 0) {
                $A = -$q / 2 + Math.sqrt($Q);
                $B = -$q / 2 - Math.sqrt($Q);

                $alpha = Math.pow($A, 1 /3);
                $beta = Math.pow($B, 1 / 3);

                $x_1 = $alpha + $beta;
                $x_2 = -(($alpha + $beta) / 2) + (($alpha - $beta) / 2) * Math.sqrt(3);
                $x_3 = -(($alpha + $beta) / 2) - (($alpha - $beta) / 2) * Math.sqrt(3);

                return [$x_1, $x_2, $x_3];
            }

            if ($Q > 0) {
                $A = -$q / 2 + Math.sqrt($Q);
                $B = -$q / 2 - Math.sqrt($Q);

                $alpha = Math.pow($A, 1 /3);
                $beta = Math.pow($B, 1 / 3);
                $x_1 = $alpha + $beta;

                return [$x_1];
            }

            if ($Q < 0) {
                return ['комплексные числа'];
            }
        }
    }
}