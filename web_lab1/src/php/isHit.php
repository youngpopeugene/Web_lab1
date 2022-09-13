<?php

$r = $_POST["R"];
$x = $_POST["x"];
$y = $_POST["y"];

function isHit($x, $y, $r)
{
    return isCircleZone($x, $y, $r) || isRectangleZone($x, $y, $r) || isTriangleZone($x, $y, $r);
}

function isCircleZone($x, $y, $r)
{
    return ($x * $x + $y * $y <= $r * $r) && ($x >= 0) && ($y >= 0);
}

function isRectangleZone($x, $y, $r)
{
    return ($x >= 0) && ($x <= $r) && ($y <= 0) && ($y >= (-1 * $r / 2));
}

function isTriangleZone($x, $y, $r)
{
    return ($x <= 0) && ($y <= 0) && ($y + $x >= (-1 * $r));
}