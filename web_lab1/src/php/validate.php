<?php

$r = $_POST["R"];
$x = $_POST["x"];
$y = $_POST["y"];

function validate($x, $y, $r){
    return validate_x($x) && validate_y($y) && validate_r($r);
}

function validate_x($x){
    return (($x == -4) || ($x == -3) || ($x == -2) || ($x == -1)|| ($x == 0)
        || ($x == 1) || ($x == 2) || ($x == 3) || ($x == 4));
}

function validate_y($y){
    return ($y<3) && ($y>-5) && strlen($y)<13;
}

function validate_r($r){
    return (($r == 1) || ($r == 1.5) || ($r== 2) || ($r == 2.5) || ($r == 3));
}