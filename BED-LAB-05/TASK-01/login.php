<?php

session_start();
$mysqli = new mysqli('localhost', 'root', '', 'lab5');
if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = $mysqli->query($query);

if ($result->num_rows == 1) {
    $_SESSION['username'] = $username;
    header('Location: welcome.php');
} else {
    echo "Invalid username or password.";
}

$mysqli->close();

