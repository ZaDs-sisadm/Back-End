<?php
$files = glob("uploads/*.{jpg,jpeg,png}", GLOB_BRACE);
foreach($files as $file) {
    echo '<img src="'.$file.'" style="max-width: 200px; max-height: 200px; margin: 10px;">';
}
?>
