<?php
require_once 'Function/func.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!is_numeric($_POST['x'])) {
        echo "<p style='color: red;'>Введене значення повинно бути числом!</p>";
        echo "<a href='index-04.php'>Повернутися до калькулятора</a>";
        exit();
    }

    $x = $_POST['x'];

    echo "<h2>Results:</h2>";
    echo "<table border='1'>";
    echo "<tr><th>Function</th><th>Result</th></tr>";

    echo "<tr><td>sin(x)</td><td>". MyFunctions\my_sin($x) ."</td></tr>";
    echo "<tr><td>cos(x)</td><td>". MyFunctions\my_cos($x) ."</td></tr>";
    echo "<tr><td>tan(x)</td><td>". MyFunctions\my_tan($x) ."</td></tr>";
    echo "<tr><td>my_tg(x)</td><td>". MyFunctions\my_tg($x) ."</td></tr>";
    echo "<tr><td>x^y</td><td>". MyFunctions\power($x, 2) ."</td></tr>";
    echo "<tr><td>x!</td><td>". MyFunctions\factorial($x) ."</td></tr>";

    echo "</table>";

    echo "<br>";
    echo "<a href='index-04.php'>Повернутися до калькулятора</a>";
}
?>
