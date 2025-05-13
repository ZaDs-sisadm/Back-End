<?php
$filename = 'Slovar.txt';
$file_content = file_get_contents($filename);

$words_array = explode(',', $file_content);

$words_array = array_map('trim', $words_array);
$words_array = array_filter($words_array);

sort($words_array);

echo "Слова в алфавитном порядке:\n";
foreach ($words_array as $word) {
    echo $word . "\n";
}
?>
