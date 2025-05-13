<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['post_text'])) {
        $post_text = $_POST['post_text'];

        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php');
            exit();
        }

        $user_id = $_SESSION['user_id'];
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "lab-07";
        $conn = new mysqli($servername, $username, $password, $database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO posts (user_id, post_text) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("is", $user_id, $post_text);

        if ($stmt->execute()) {
            $success_message = "Post added successfully!";
        } else {
            $error_message = "Error: " . $stmt->error;
        }
        $stmt->close();
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Додавання публікації</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 80%;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            text-align: center;
        }
        label {
            font-weight: bold;
        }
        textarea {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 10px;
        }
        button {
            padding: 10px 20px;
            background-color: #4caf50;
            border: none;
            color: #fff;
            cursor: pointer;
            border-radius: 5px;
        }
        button:hover {
            background-color: #45a049;
        }
        a {
            display: block;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
            color: #333;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Додавання публікації</h1>
    <form method="post" action="">
        <label for="post_text">Post Text:</label><br>
        <textarea id="post_text" name="post_text" rows="4" cols="50" required></textarea><br><br>
        <button type="submit">Додати публікацію</button>
    </form>
    <?php if(isset($success_message)): ?>
        <p style="color: green;"><?php echo $success_message; ?></p>
    <?php endif; ?>
    <?php if(isset($error_message)): ?>
        <p style="color: red;"><?php echo $error_message; ?></p>
    <?php endif; ?>
    <a href="personal_page.php">Повернутися на сторінку</a>
</div>
</body>
</html>
