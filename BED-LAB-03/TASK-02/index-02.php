<?php
session_start();

function check_authentication() {
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
        echo "Добрий день, {$_SESSION['username']}! <br>";
        echo '<form method="post" action="">
                  <input type="submit" name="logout" value="Вийти">
              </form>';
    } else {
        echo '
        <form method="post" action="">
            <label for="login">Логін:</label>
            <input type="text" id="login" name="login"><br>
            <label for="password">Пароль:</label>
            <input type="password" id="password" name="password"><br>
            <input type="submit" value="Увійти">
        </form>
        ';
    }
}

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['logout'])) {
        session_unset();
        session_destroy();
        header("Location: {$_SERVER['PHP_SELF']}");
        exit;
    }

    $login = $_POST['login'];
    $password = $_POST['password'];

    // Перевірка правильності введення
    if($login === "Admin" && $password === "password") {
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $login;
    } else {
        echo "Невірний логін або пароль!";
    }
}
check_authentication();
?>

