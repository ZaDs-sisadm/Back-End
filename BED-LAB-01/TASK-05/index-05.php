<?php
$RandomNumber = mt_rand(100, 999);

$Odynitsy = floor($RandomNumber / 100);
$Desiatky = floor(($RandomNumber % 100) / 10);
$Sotni = $RandomNumber % 10;
$SumOfNumber = $Odynitsy + $Desiatky + $Sotni;

$ReverseOfNumber = $Sotni * 100 + $Desiatky * 10 + $Odynitsy;

$MaxOfNumber = max(
    $Odynitsy * 100 + $Desiatky * 10 + $Sotni,
    $Odynitsy * 100 + $Sotni * 10 + $Desiatky,
    $Desiatky * 100 + $Odynitsy * 10 + $Sotni,
    $Desiatky * 100 + $Sotni * 10 + $Odynitsy,
    $Sotni * 100 + $Odynitsy * 10 + $Desiatky,
    $Sotni * 100 + $Desiatky * 10 + $Odynitsy
);
//$MaxOfNumber = max($Odynitsy, $Desiatky, $Sotni) * 100 + min($Odynitsy, $Desiatky, $Sotni) * 10 + $SumOfNumber - max($Odynitsy, $Desiatky, $Sotni) - min($Odynitsy, $Desiatky, $Sotni);
echo "<p>Випадкове тризначне число: $RandomNumber</p>".
     "<p>1. Сума цифр числа: $SumOfNumber</p>".
     "<p>2. Число, отримане виписуванням в зворотному порядку: $ReverseOfNumber</p>".
     "<p>3. Найбільше число, отримане після перестановки цифр: $MaxOfNumber</p>";
?>