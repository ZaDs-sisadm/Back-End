<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $position = $_POST['position'];
    $salary = $_POST['salary'];

    $conn = new mysqli("localhost", "root", "", "company_db");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "UPDATE employees SET name='$name', position='$position', salary='$salary' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        $conn->close();
        header("Location: employees.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
}
?>
