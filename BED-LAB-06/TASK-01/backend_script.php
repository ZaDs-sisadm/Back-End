<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_management";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$data = json_decode(file_get_contents("php://input"));
$name = $conn->real_escape_string($data->name);
$email = $conn->real_escape_string($data->email);
$password = password_hash($conn->real_escape_string($data->password), PASSWORD_DEFAULT);

// Перевірка, чи існує користувач з вказаною електронною адресою
$checkExistingUser = "SELECT * FROM users WHERE email = '$email'";
$existingUserResult = $conn->query($checkExistingUser);

if ($existingUserResult->num_rows > 0) {
    echo json_encode(array('status' => 'error', 'message' => 'User with this email already exists.'));
} else {
    $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(array('status' => 'success'));
    } else {
        echo json_encode(array('status' => 'error', 'message' => 'Error registering user: ' . $conn->error));
    }
}

$conn->close();
?>
