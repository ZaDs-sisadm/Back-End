<?php
session_start();
if(isset($_SESSION['username'])) {
    $mysqli = new mysqli('localhost', 'root', '', 'lab5');
    if ($mysqli->connect_error) {
        die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
    }

    $username = $_SESSION['username'];

    $delete_query = "DELETE FROM users WHERE username='$username'";
    if ($mysqli->query($delete_query) === TRUE) {
        echo "Profile deleted successfully.";
        session_unset();
        session_destroy();
        header("Location: http://localhost/BED-LAB-05/TASK-01/");
        exit;
    } else {
        echo "Error deleting profile: " . $mysqli->error;
    }

    $mysqli->close();
} else {
    header("Location: index.php");
    exit;
}
?>
