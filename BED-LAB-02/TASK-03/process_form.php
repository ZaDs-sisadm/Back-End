<!DOCTYPE html>
<html>
<head>
    <title>TASK-03</title>
</head>
<body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $login = $_POST["login"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    $gender = $_POST["gender"];
    $city = $_POST["city"];
    $games = isset($_POST["games"]) ? $_POST["games"] : [];
    $about = $_POST["about"];

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["photo"]["name"]);
    move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);

    echo "<h2>Результат реєстрації:</h2>";
    echo "<p><strong>Логін:</strong> $login</p>";
    echo "<p><strong>Пароль:</strong> $password</p>";
    echo "<p><strong>Стать:</strong> $gender</p>";
    echo "<p><strong>Місто:</strong> $city</p>";
    echo "<p><strong>Улюблені ігри:</strong> " . implode(", ", $games) . "</p>";
    echo "<p><strong>Про себе:</strong> $about</p>";
    echo "<p><strong>Фото:</strong> <img src='$target_file' alt='Фото'></p>";
} else {
    echo "<p>Дані не були надіслані через форму POST.</p>";
}
?>
</body>
</html>
