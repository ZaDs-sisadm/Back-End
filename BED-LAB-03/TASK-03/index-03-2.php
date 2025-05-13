<?php

function readWordsFromFile($filename) {
    $words = [];
    $file = fopen($filename, 'r');
    while (!feof($file)) {
        $line = fgets($file);
        $words = array_merge($words, explode(' ', $line));
    }
    fclose($file);
    return $words;
}

function writeWordsToFile($filename, $words) {
    $file = fopen($filename, 'w');
    fwrite($file, implode("\n", $words));
    fclose($file);
}

$words1 = readWordsFromFile('Words-1.txt');
$words2 = readWordsFromFile('Words-2.txt');

// Завдання а)
$result1 = array_diff($words1, $words2);
writeWordsToFile('Result-1.txt', $result1);

// Завдання б)
$result2 = array_intersect($words1, $words2);
writeWordsToFile('Result-2.txt', $result2);

// Завдання в)
$result3 = [];
$wordCounts = array_count_values(array_merge($words1, $words2));
foreach ($wordCounts as $word => $count) {
    if ($count > 2) {
        $result3[] = $word;
    }
}
writeWordsToFile('Result-3.txt', $result3);

if (isset($_POST['filenameToDelete'])) {
    $filenameToDelete = $_POST['filenameToDelete'];
    if (file_exists($filenameToDelete)) {
        unlink($filenameToDelete);
        echo "Файл $filenameToDelete був успішно видалений.";
    } else {
        echo "Файл $filenameToDelete не існує.";
    }
}

if (isset($_POST['filenameToView'])) {
    $filenameToView = $_POST['filenameToView'];
    if (file_exists($filenameToView)) {
        $fileContent = file_get_contents($filenameToView);
        echo "<h2>Вміст файлу $filenameToView:</h2>";
        echo "<pre>$fileContent</pre>";
    } else {
        echo "Файл $filenameToView не існує.";
    }
}
?>

<h2>Перегляд файлу</h2>
<form method="post" action="">
    <label for="filenameToView">Виберіть файл для перегляду:</label><br>
    <select name="filenameToView" id="filenameToView">
        <option value="Result-1.txt">Result-1.txt</option>
        <option value="Result-2.txt">Result-2.txt</option>
        <option value="Result-3.txt">Result-3.txt</option>
        <option value="Words-1.txt">Words-1.txt</option>
        <option value="Words-2.txt">Words-2.txt</option>
    </select><br>
    <input type="submit" value="Переглянути файл">
</form>

<h2>Видалення файлу</h2>
<form method="post" action="">
    <label for="filenameToDelete">Виберіть файл для видалення:</label><br>
    <select name="filenameToDelete" id="filenameToDelete">
        <option value="Result-1.txt">Result-1.txt</option>
        <option value="Result-2.txt">Result-2.txt</option>
        <option value="Result-3.txt">Result-3.txt</option>
    </select><br>
    <input type="submit" value="Видалити файл">
</form>