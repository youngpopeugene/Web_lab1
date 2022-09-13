<?php
require_once "isHit.php";
require_once "validate.php";

$r = $_POST["R"];
$x = $_POST["x"];
$y = $_POST["y"];

date_default_timezone_set('Europe/Moscow');

$start = microtime(true);
$current_time = date("H:i:s");

$hit_result = isHit($x, $y, $r) ? "<span style='color: green'>TRUE</span>" : "<span style='color: red'>FALSE</span>";
if (!validate($x, $y, $r)){
    $hit_result = "<span style='color: red; font-size: 25px'>ERROR</span>";
}

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

