<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];

    $conn = new mysqli("localhost", "root", "", "company_db");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "DELETE FROM employees WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        $conn->close();
        header("Location: employees.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
}
?>
