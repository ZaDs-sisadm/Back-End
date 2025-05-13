<?php
session_start();

if(isset($_SESSION['username'])) {
    // Підключення до бази даних
    $mysqli = new mysqli('localhost', 'root', '', 'lab5');

    if ($mysqli->connect_error) {
        die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
    }

    $username = $_SESSION['username'];

    $query = "SELECT * FROM users WHERE username='$username'";
    $result = $mysqli->query($query);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $password = $row['password'];
        $email = $row['email'];
    } else {
        echo "User not found.";
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Отримання нових даних з форми
        $new_password = $_POST['new_password'];
        $new_email = $_POST['new_email'];
        // Оновлення даних користувача в базі даних
        $update_query = "UPDATE users SET password='$new_password', email='$new_email' WHERE username='$username'";
        if ($mysqli->query($update_query) === TRUE) {
            echo "Profile updated successfully.";
            // Оновлення даних в сесії, якщо вони були змінені
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $new_email;
        } else {
            echo "Error updating profile: " . $mysqli->error;
        }
    }
    $mysqli->close();
} else {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
</head>
<body>
<h2>Edit Profile</h2>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
    <label for="new_password">New Password:</label>
    <input type="password" id="new_password" name="new_password" value="<?php echo htmlspecialchars($password); ?>" required><br><br>
    <label for="new_email">New Email:</label>
    <input type="email" id="new_email" name="new_email" value="<?php echo htmlspecialchars($email); ?>"><br><br>
    <input type="submit" value="Update Profile">
</form>
<a href="welcome.php">Back to Home</a>
</body>
</html>
