<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}

if (!isset($_POST['edit_post'])) {
    header('Location: personal_page.php');
    exit();
}

$post_id = $_POST['edit_post'];

$servername = "localhost";
$username = "root";
$password = "";
$database = "lab-07";

$conn = new mysqli($servername, $username, $password, $database);

// Перевірка з'єднання
if ($conn->connect_error) {
    die("Підключення не вдалося: " . $conn->connect_error);
}

// Отримання даних користувача з сесії
$username = $_SESSION['username'];

// Отримання даних поста для редагування
$sql = "SELECT * FROM posts WHERE id = '$post_id' AND user_id = (SELECT id FROM users WHERE username='$username')";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $post_text = $row['post_text'];
} else {
    echo "Повідомлення не знайдено або у вас немає дозволу на його редагування.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['new_post_text'])) {
        $new_post_text = $_POST['new_post_text'];
        $sql_update = "UPDATE posts SET post_text='$new_post_text' WHERE id='$post_id'";
        if ($conn->query($sql_update) === TRUE) {
            echo "Публікацію успішно оновлено!";
            ob_clean();
            header('Location: personal_page.php');
            exit();
        } else {
            echo "Помилка оновлення публікації: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редагування публікацій</title>
</head>
<body>
<h1>Редагування публікацій</h1>
<form method="post" action="">
    <input type="hidden" name="edit_post" value="<?php echo $post_id; ?>">
    <label for="new_post_text">Новий текст публікації</label><br>
    <textarea id="new_post_text" name="new_post_text" rows="4" cols="50" required><?php echo $post_text; ?></textarea><br><br>
    <button type="submit">Оновити публікацію</button>
</form>
<br>
<a href="personal_page.php">Повернутися на сторінку</a>
</body>
</html>

<?php
$conn->close();
?>
