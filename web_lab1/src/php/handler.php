<?php
require_once "isHit.php";
require_once "validate.php";

$r = $_POST["R"];
$x = $_POST["x"];
$y = $_POST["y"];
$timezone_offset_minutes = $_POST["timezone_offset_minutes"];

$start = microtime(true);

$timezone_name = timezone_name_from_abbr("", $timezone_offset_minutes*60, false);
date_default_timezone_set($timezone_name);
$current_time = date("d:m:Y H:i:s T");

$hit_result = isHit($x, $y, $r) ? "<span style='color: green'>TRUE</span>" : "<span style='color: red'>FALSE</span>";


$script_time = number_format(microtime(true) - $start, 8, ".", "") * 1000000;

die(<<<_END
        <tr>
            <br>
            <br>
            <th>$x</th>
            <th>$y</th>
            <th>$r</th>
            <th>$current_time</th>
            <th>$script_time</th>
            <th>$hit_result</th>
        </tr>
_END
);

