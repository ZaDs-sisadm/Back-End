<!DOCTYPE html>
<html>
<head>
    <title>Створення папок та файлів</title>
</head>
<body>
<h2>Створення папок та файлів</h2>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    Логін: <input type="text" name="login"><br>
    Пароль: <input type="password" name="password"><br>
    <input type="submit" value="Створити">
</form>

<?php
//     // Перевірка чи POST запит
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST['login'];
    $password = $_POST['password'];

    // Перевірка чи є такий ак
    if (!file_exists($login)) {
        // Створення папки та підпапок
        mkdir($login);
        mkdir($login.'/video');
        mkdir($login.'/music');
        mkdir($login.'/photo');
        file_put_contents($login.'/video/video1.txt', 'Вміст файлу video1.txt');
        file_put_contents($login.'/music/music1.txt', 'Вміст файлу music1.txt');
        file_put_contents($login.'/photo/photo1.txt', 'Вміст файлу photo1.txt');
        echo 'Папка з ім\'ям ' . $login . ' та підпапками була успішно створена.';
    } else {
        echo 'Помилка: Папка з ім\'ям ' . $login . ' вже існує.';
    }
}
?>
<br>
<a href="delete.php">Перейти до видалення</a>
</body>
</html>
