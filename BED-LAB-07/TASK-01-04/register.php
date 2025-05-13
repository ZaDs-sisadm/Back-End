<?php
session_start();

if (isset($_SESSION['username'])) {
    header('Location: personal_page.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $servername = "localhost";
        $username_db = "root";
        $password_db = "";
        $database = "lab-07";

        $conn = new mysqli($servername, $username_db, $password_db, $database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $check_username_sql = "SELECT * FROM users WHERE username='$username'";
        $result = $conn->query($check_username_sql);
        if ($result->num_rows > 0) {
            echo "Username already exists!";
        } else {
            $insert_user_sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
            if ($conn->query($insert_user_sql) === TRUE) {
                $new_user_id = $conn->insert_id;
                $_SESSION['user_id'] = $new_user_id;
                $_SESSION['username'] = $username;
                header('Location: personal_page.php');
                exit();
            } else {
                echo "Error: " . $insert_user_sql . "<br>" . $conn->error;
            }

        }
        $conn->close();
    }
}

header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Реєстрація</title>
</head>
<body>
<h1>Реєстрація</h1>
<form method="post" action="">
    <label for="username">Логін:</label><br>
    <input type="text" id="username" name="username" required><br><br>
    <label for="password">Пароль:</label><br>
    <input type="password" id="password" name="password" required><br><br>
    <button type="submit">Зареєструватися</button>
</form>
</body>
</html>
