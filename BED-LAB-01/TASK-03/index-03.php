<?php
$NumberOfMonth = 2;

if ($NumberOfMonth >= 1 && $NumberOfMonth <= 12) {
    if ($NumberOfMonth >= 3 && $NumberOfMonth <= 5) {
        $YearSeason = "весни";
    } elseif ($NumberOfMonth >= 6 && $NumberOfMonth <= 8) {
        $YearSeason = "літа";
    } elseif ($NumberOfMonth >= 9 && $NumberOfMonth <= 11) {
        $YearSeason = "осені";
    } else {
        $YearSeason = "зими";
    }
    // Виведення результату
    echo "Місяць з номер $NumberOfMonth - це місяць $YearSeason\n";
} else {
    echo "Немає місяця з індексом $NumberOfMonth\n";
}
?>
