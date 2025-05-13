<?php
$StartLetter = 'М';

if (!preg_match('/^[а-я,А-Я]$/u', $StartLetter)) {
    echo "Напишіть правильну букву\n";
} else {
    $NormalLetter = mb_strtolower($StartLetter, 'UTF-8');
    switch ($NormalLetter) {
        case 'а':
        case 'е':
        case 'и':
        case 'і':
        case 'ї':
        case 'о':
        case 'у':
        case 'ю':
        case 'я':
            $result = "голосною";
            break;
        default:
            $result = "приголосною";
            break;
    }
    echo "Буква '$StartLetter' є $result\n";
}
?>
