<?php
function GenerateColorTable($rows, $columns) {
    echo "<table border='1'>";
    for ($i = 0; $i < $rows; $i++) {
        echo "<tr>";
        for ($j = 0; $j < $columns; $j++) {
            $color = sprintf('#%06X', mt_rand(0, 0xFFFFFF));
            echo "<td style='background-color: $color; width: 50px; height: 50px;'></td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}

function GenerateSquares($count) {
    echo "<div style='position: relative; width: 500px; height: 500px; background-color: black;'>";
    for ($i = 0; $i < $count; $i++) {
        $size = mt_rand(50, 100);
        $left = mt_rand(0, 400);
        $top = mt_rand(0, 400);
        echo "<div style='position: absolute; left: {$left}px; top: {$top}px; width: {$size}px; height: {$size}px; background-color: red;'></div>";
    }
    echo "</div>";
}

GenerateColorTable(6, 5);

GenerateSquares(5);
?>
