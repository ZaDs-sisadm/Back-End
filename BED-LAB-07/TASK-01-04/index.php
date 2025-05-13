<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "lab-07";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function log_message($message) {
    if (!isset($_SESSION['messages'])) {
        $_SESSION['messages'] = [];
    }
    $_SESSION['messages'][] = $message;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $username;
        log_message("Користувач $username увійшов до системи.");

        header('Location: personal_page.php');
        exit();
    } else {
        log_message("Невірний пароль для користувача $username або користувача з таким ім'ям не існує.");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<h1>Вхід в систему</h1>
<form method="post" action="">
    <label for="username">Логін:</label><br>
    <input type="text" id="username" name="username" required><br>
    <label for="password">Пароль:</label><br>
    <input type="password" id="password" name="password" required><br><br>
    <button type="submit">Ввійти</button>
</form>
<p>Ще не зареєстровані? <a href="register.php">Зареєструватись</a></p>
</body>
</html>

<?php
$conn->close();
?>
