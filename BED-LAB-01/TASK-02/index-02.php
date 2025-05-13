<?php
function ConvertationToDollarsy($BalanceInHryvnia, $valueDOLtoHRY) {
    $dollar = $BalanceInHryvnia / $valueDOLtoHRY;
    return $dollar;
}

$BalanceInHryvnia = 1500;
$valueDOLtoHRY = 1500/51;

$dollar = ConvertationToDollarsy($BalanceInHryvnia, $valueDOLtoHRY);
echo "$BalanceInHryvnia грн. можна обміняти на " . round($dollar, 2) . " долар\n";
?>
