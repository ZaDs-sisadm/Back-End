<?php

class FileHandler {
    public static $dir = "text";

    public static function readFromFile($filename) {
        $filepath = self::$dir . "/" . $filename;
        if (file_exists($filepath)) {
            return nl2br(file_get_contents($filepath));
        } else {
            return "File not found";
        }
    }

    public static function writeToFile($filename, $content) {
        $filepath = self::$dir . "/" . $filename;
        file_put_contents($filepath, $content, FILE_APPEND);
        return "Content written to file successfully";
    }

    public static function clearFileContent($filename) {
        $filepath = self::$dir . "/" . $filename;
        if (file_exists($filepath)) {
            file_put_contents($filepath, "");
            return "File content cleared successfully";
        } else {
            return "File not found";
        }
    }
}

if (!file_exists(FileHandler::$dir)) {
    mkdir(FileHandler::$dir);
}

$file1 = FileHandler::$dir . "/file1.txt";
$file2 = FileHandler::$dir . "/file2.txt";
$file3 = FileHandler::$dir . "/file3.txt";

file_put_contents($file1, "Text file 1 content\n");
file_put_contents($file2, "Text file 2 content\n");
file_put_contents($file3, "Text file 3 content\n");


echo FileHandler::readFromFile("file1.txt") . "<br>";
echo FileHandler::readFromFile("file4.txt") . "<br>";
echo FileHandler::writeToFile("file2.txt", "Additional content\n") . "<br>";
echo FileHandler::readFromFile("file2.txt") . "<br>";
echo FileHandler::clearFileContent("file3.txt") . "<br>";
echo FileHandler::readFromFile("file3.txt");

?>
