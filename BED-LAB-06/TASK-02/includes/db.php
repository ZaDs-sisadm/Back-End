<?php
$db_host = 'localhost';
$db_user = 'root';
$db_password = "";
$db_name = 'notes_app';


$conn = new mysqli($db_host, $db_user, $db_password, $db_name);

if ($conn->connect_error) {
    die("Помилка з'єднання з базою даних: " . $conn->connect_error);
}
