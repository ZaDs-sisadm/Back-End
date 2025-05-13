<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_management";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Визначення методу HTTP-запиту
$method = $_SERVER['REQUEST_METHOD'];

// Видалення користувача за допомогою email
if ($method === 'DELETE') {
    parse_str(file_get_contents("php://input"), $_DELETE);
    $emailToDelete = $_DELETE['email'];

    $sqlDelete = "DELETE FROM users WHERE email = '$emailToDelete'";

    if ($conn->query($sqlDelete) === TRUE) {
        echo json_encode(['status' => 'success', 'message' => 'Користувач видалений']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Помилка при видаленні користувача: ' . $conn->error]);
    }
}

$conn->close();
?>
