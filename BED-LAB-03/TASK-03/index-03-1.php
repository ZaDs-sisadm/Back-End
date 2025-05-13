<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    //Дані з форми
    $name = $_POST['name'];
    $comment = $_POST['comment'];

    $file = fopen("comments.txt", "a");
    if ($file) {
        fwrite($file, "$name: $comment\n");
        fclose($file);
    } else {
        echo "Помилка при відкритті файлу для запису.";
    }
}

// Видалення коментарів
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $index = $_POST['index'];
    $lines = file("comments.txt");
    if (isset($lines[$index])) {
        unset($lines[$index]);
        $fp = fopen("comments.txt", "w");
        fwrite($fp, implode("", $lines));
        fclose($fp);
    }
}

// Вивід коментарів
if (file_exists("comments.txt")) {
    $file = fopen("comments.txt", "r");
    if ($file) {
        echo "<table border='1'>";
        $index = 0;
        while (!feof($file)) {
            $line = fgets($file);
            if (!empty(trim($line))) { // Перевірка по порожність строки
                echo "<tr><td>$line</td><td style='text-align: center;'>
                    <form method='post' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "'>
                        <input type='hidden' name='index' value='$index'>
                        <input type='submit' name='delete' value='Видалити' style='margin: 0 auto; display: block;'>
                    </form>
                </td></tr>";
            }
            $index++;
        }
        echo "</table>";
        fclose($file);
    } else {
        echo "Помилка при відкритті файлу для читання.";
    }
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<h2>Форма коментарів</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="name">Ім'я:</label><br>
    <input type="text" id="name" name="name" required><br>
    <label for="comment">Коментар:</label><br>
    <textarea id="comment" name="comment" rows="4" cols="50" required></textarea><br>
    <input type="submit" name="submit" value="Надіслати">
</form>
</body>
</html>
