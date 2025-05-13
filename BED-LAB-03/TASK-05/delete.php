<!DOCTYPE html>
<html>
<head>
    <title>Видалення папок</title>
</head>
<body>
<h2>Видалення папок</h2>
<form action="delete.php" method="post">
    Логін: <input type="text" name="login"><br>
    Пароль: <input type="password" name="password"><br>
    <input type="submit" value="Видалити">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST['login'];
    $password = $_POST['password'];

    // Перевірка чи є такий ак
    if (file_exists($login)) {
        function deleteDir($dirPath) {
            if (!is_dir($dirPath)) {
                throw new InvalidArgumentException("$dirPath must be a directory");
            }
            if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
                $dirPath .= '/';
            }
            $files = glob($dirPath . '*', GLOB_MARK);
            foreach ($files as $file) {
                if (is_dir($file)) {
                    deleteDir($file);
                } else {
                    unlink($file);
                }
            }
            rmdir($dirPath);
        }

        deleteDir($login);
        echo 'Папка з ім\'ям ' . $login . ' була успішно видалена разом з усім вмістом.';
    } else {
        echo 'Помилка: Папки з ім\'ям ' . $login . ' не існує.';
    }
}
?>
<a href="create.php">Перейти до додавання.</a>
</body>
</html>
