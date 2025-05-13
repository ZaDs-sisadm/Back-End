<!DOCTYPE html>
<html>
<head>
    <title>BackEnd</title>
</head>
<body>
<!-- Завдання 1 -->
<hr>
<h3>Завдання 1: Заміна символів у тексті</h3>
<form method="post">
    <label for="text">Текст:</label>
    <input type="text" id="text" name="text"><br><br>

    <label for="find">Знайти:</label>
    <input type="text" id="find" name="find"><br><br>

    <label for="replace">Замінити:</label>
    <input type="text" id="replace" name="replace"><br><br>

    <input type="submit" value="Замінити" name="submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $text = $_POST["text"];
    $find = $_POST["find"];
    $replace = $_POST["replace"];

    if (empty($text) || empty($find)) {
        echo "<br><br><strong>Помилка:</strong> Будь ласка, введіть текст і символ для заміни.";
    } else {
        $result = str_replace($find, $replace, $text);
        echo "<br><br>Результат: " . $result;
    }
}
?>

<!-- Завдання 2 -->
<hr>
<h3>Завдання 2: Сортування міст за алфавітом</h3>
<form method="post">
    <label for="cities">Назви міст через пробіл:</label>
    <input type="text" id="cities" name="cities"><br><br>

    <input type="submit" value="Сортувати міста" name="sortCities">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["sortCities"])) {
    $cities = $_POST["cities"];

    if (empty($cities)) {
        echo "<br><br><strong>Помилка:</strong> Будь ласка, введіть назви міст.";
    } else {
        $citiesArray = explode(" ", $cities);
        sort($citiesArray);
        echo "<br><br>Відсортовані міста: " . implode(" ", $citiesArray);
    }
}
?>

<!-- Завдання 3 -->
<hr>
<h3>Завдання 3: Виділення імені файлу без розширення</h3>
<form method="post">
    <label for="filepath">Шлях до файлу:</label>
    <input type="text" id="filepath" name="filepath"><br><br>

    <input type="submit" value="Виділити ім'я файлу" name="extractFileName">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["extractFileName"])) {
    $filepath = $_POST["filepath"];

    $filenameWithoutExtension = pathinfo($filepath, PATHINFO_FILENAME);

    if (empty($filenameWithoutExtension)) {
        echo "<br><br><strong>Помилка:</strong> Будь ласка, введіть шлях до файлу.";
    } else {
        echo "<br><br>Ім'я файлу без розширення: " . $filenameWithoutExtension;
    }
}
?>

<!-- Завдання 4 -->
<hr>
<h3>Завдання 4: Визначення кількості днів між датами</h3>
<form method="post">
    <label for="date1">Дата 1 (День-Місяць-Рік):</label>
    <input type="text" id="date1" name="date1"><br><br>

    <label for="date2">Дата 2 (День-Місяць-Рік):</label>
    <input type="text" id="date2" name="date2"><br><br>

    <input type="submit" value="Визначити кількість днів" name="calculateDays">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["calculateDays"])) {
    $date1 = $_POST["date1"];
    $date2 = $_POST["date2"];

    if (empty($date1) || empty($date2)) {
        echo "<br><br><strong>Помилка:</strong> Будь ласка, введіть обидві дати.";
    } else {
        $daysDiff = (strtotime($date2) - strtotime($date1)) / (60 * 60 * 24);
        echo "<br><br>Кількість днів між датами: " . $daysDiff;
    }
}
?>

<!-- Завдання 5 -->
<hr>
<h3>Завдання 5: Генератор паролів</h3>
<form method="post">
    <label for="passwordLength">Довжина пароля (мінімум 8 символів):</label>
    <input type="number" id="passwordLength" name="passwordLength" min="8"><br><br>

    <input type="submit" value="Згенерувати пароль" name="generatePassword">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["generatePassword"])) {
    $passwordLength = $_POST["passwordLength"];

    if ($passwordLength < 8) {
        echo "<br><br><strong>Помилка:</strong> Довжина пароля повинна бути не менше 8 символів.";
    } else {
        function generatePassword($length) {
            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
            return substr(str_shuffle($chars), 0, $length);
        }

        $generatedPassword = generatePassword($passwordLength);
        echo "<br><br>Згенерований пароль: " . $generatedPassword;
    }
}
?>
</body>
</html>
