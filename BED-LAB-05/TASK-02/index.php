<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 5px;
        }
        form {
            margin-bottom: 20px;
            max-width: 400px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="number"],
        textarea {
            width: calc(100% - 12px);
            padding: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
        }
    </style>
</head>
<body>
<h2>Products</h2>
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Quantity</th>
    </tr>
    <?php
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=lab5;charset=utf8','root','');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM tov";
        $result = $pdo->query($sql);

        if(isset($result)) {
            foreach($result as $row) {
                echo "<tr>";
                echo "<td>".$row['id']."</td>";
                echo "<td>".$row['name']."</td>";
                echo "<td>".$row['description']."</td>";
                echo "<td>".$row['price']."</td>";
                echo "<td>".$row['quantity']."</td>";
                echo "</tr>";
            }
        }
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    ?>
</table>
<form action="insert.php" method="post">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required><br>
    <label for="description">Description:</label>
    <input type="text" id="description" name="description" required><br>
    <label for="price">Price:</label>
    <input type="number" id="price" name="price" min="0" step="0.01" required><br>
    <label for="quantity">Quantity:</label>
    <input type="number" id="quantity" name="quantity" min="0" required><br>
    <input type="submit" value="Add Product">
</form>
<form action="delete.php" method="post">
    <label for="delete_id">Enter ID to delete:</label>
    <input type="number" id="delete_id" name="delete_id" required>
    <input type="submit" value="Delete">
</form>
</body>
</html>
