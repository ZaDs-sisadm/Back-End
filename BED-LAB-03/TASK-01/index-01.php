<?php
$page_title = basename($_SERVER['PHP_SELF']);
if (isset($_GET['fontsize'])) {
    $fontsize = $_GET['fontsize'];
    setcookie('fontsize', $fontsize, time() + (86400 * 30), "/"); // Збереження на 30 днів
} elseif (isset($_COOKIE['fontsize'])) {
    $fontsize = $_COOKIE['fontsize'];
} else {
    $fontsize = 'medium';
}

echo "<a href='?fontsize=large' title='Великий шрифт'>Великий шрифт</a> | ";
echo "<a href='?fontsize=medium' title='Середній шрифт'>Середній шрифт</a> | ";
echo "<a href='?fontsize=small' title='Маленький шрифт'>Маленький шрифт</a>";

// Зміна розміру шрифтів
echo "<style> body { font-size: ";
switch ($fontsize) {
    case 'large':
        echo "30px";
        break;
    case 'medium':
        echo "16px";
        break;
    case 'small':
        echo "10px";
        break;
    default:
        echo "16px";
}
echo "; } </style>";
?>
