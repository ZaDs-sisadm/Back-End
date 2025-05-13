<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_management";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'PUT') {
    parse_str(file_get_contents("php://input"), $_PUT);
    $emailToEdit = $_PUT['email'];
    $newName = $_PUT['newName'];

    $sqlUpdate = "UPDATE users SET name = '$newName' WHERE email = '$emailToEdit'";

    if ($conn->query($sqlUpdate) === TRUE) {
        echo json_encode(['status' => 'success', 'message' => 'Користувач відредагований']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Помилка при редагуванні користувача: ' . $conn->error]);
    }
}

$conn->close();
?>
