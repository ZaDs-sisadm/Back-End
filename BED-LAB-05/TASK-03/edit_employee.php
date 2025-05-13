<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];

    $conn = new mysqli("localhost", "root", "", "company_db");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM employees WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $position = $row['position'];
        $salary = $row['salary'];
    } else {
        echo "Employee not found";
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee</title>
</head>
<body>
<h2>Edit Employee</h2>
<form action="update_employee.php" method="post">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="<?php echo $name; ?>" required><br><br>
    <label for="position">Position:</label>
    <input type="text" id="position" name="position" value="<?php echo $position; ?>" required><br><br>
    <label for="salary">Salary:</label>
    <input type="number" id="salary" name="salary" min="0" value="<?php echo $salary; ?>" required><br><br>
    <input type="submit" value="Update Employee">
</form>
</body>
</html>
