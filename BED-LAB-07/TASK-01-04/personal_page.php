<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}

if (isset($_POST['logout'])) {
    // Видалення сесії
    session_destroy();
    header('Location: index.php');
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$database = "lab-07";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Підключення не вдалося: " . $conn->connect_error);
}

$username = $_SESSION['username'];

if (isset($_POST['delete_post'])) {
    $post_id = $_POST['delete_post'];
    $sql = "DELETE FROM posts WHERE id = '$post_id'";
    if ($conn->query($sql) === TRUE) {
        echo "Публікацію успішно видалено!";
        ob_clean();
        header('Location: personal_page.php');
        exit();
    } else {
        echo "Помилка видалення публікації: " . $conn->error;
    }
}

$sql = "SELECT * FROM posts WHERE user_id = (SELECT id FROM users WHERE username='$username')";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            text-align: center;
        }
        .container {
            margin: auto;
            width: 80%;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            margin-bottom: 10px;
        }
        .btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Персональна сторінка</h1>
    <p>Welcome, <?php echo $_SESSION['username']; ?>!</p>
    <form method="post">
        <a href="add_post.php" class="btn">Додати нову публікацію</a>
        <button type="submit" name="logout" class="btn">Вийти</button>
    </form>
    <?php

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Дата</th><th>Текст</th><th>Можливі дії</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["post_date"] . "</td>";
            echo "<td>" . $row["post_text"] . "</td>";
            echo "<td>";
            echo "<div style='display: flex;'>";
            echo "<div>";
            echo "<form method='post' action='edit_post.php'>";
            echo "<input type='hidden' name='edit_post' value='" . $row["id"] . "'>";
            echo "<button type='submit'>Edit</button>";
            echo "</form>";
            echo "</div>";
            echo "<div style='margin-left: 10px;'>";
            echo "<form method='post' action=''>";
            echo "<input type='hidden' name='delete_post' value='" . $row["id"] . "'>";
            echo "<button type='submit'>Delete</button>";
            echo "</form>";
            echo "</div>";
            echo "</div>";
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>Повідомлень не знайдено.</p>";
    }
    ?>
</div>
</body>
</html>

<?php
$conn->close();
?>

