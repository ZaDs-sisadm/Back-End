<?php
session_start();
$mysqli = new mysqli('localhost', 'root', '', 'lab5');

if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

$query = "SELECT * FROM users WHERE username='$username'";
$result = $mysqli->query($query);

if ($result->num_rows > 0) {
    echo "Username already exists. Please choose a different username.";
} else {
    $insert_query = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";
    if ($mysqli->query($insert_query) === TRUE) {
        echo "Registration successful.";
    } else {
        echo "Error: " . $insert_query . "<br>" . $mysqli->error;
    }
}
$mysqli->close();
?>
