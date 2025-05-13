<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employees</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        form {
            display: inline-block;
        }
    </style>
</head>
<body>

<h3>Add New Employee</h3>
<form action="add_employee.php" method="post">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required><br><br>
    <label for="position">Position:</label>
    <input type="text" id="position" name="position" required><br><br>
    <label for="salary">Salary:</label>
    <input type="number" id="salary" name="salary" min="0" required><br><br>
    <input type="submit" value="Add Employee">
</form>

<br>

<h3>All Employees</h3>
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Position</th>
        <th>Salary</th>
        <th>Action</th>
    </tr>
    <?php
    $conn = new mysqli("localhost", "root", "", "company_db");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM employees";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $total_salary = 0;
        $employee_count = 0;
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["position"] . "</td>";
            echo "<td>$" . $row["salary"] . "</td>";
            echo "<td>
                        <form action='edit_employee.php' method='post'>
                            <input type='hidden' name='id' value='".$row["id"]."'>
                            <input type='submit' value='Edit'>
                        </form>
                        <form action='delete_employee.php' method='post' onsubmit='return confirm(\"Are you sure you want to delete this employee?\");'>
                            <input type='hidden' name='id' value='".$row["id"]."'>
                            <input type='submit' value='Delete'>
                        </form>
                    </td>";
            echo "</tr>";

            $total_salary += $row["salary"];
            $employee_count++;
        }

        if ($employee_count > 0) {
            $average_salary = $total_salary / $employee_count;
            echo "<tr><td colspan='3'>Average Salary:</td><td>$" . number_format($average_salary, 2) . "</td><td></td></tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No employees found</td></tr>";
    }

    $conn->close();
    ?>
</table>
</body>
</html>
