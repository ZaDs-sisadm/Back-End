<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=lab5;charset=utf8','root','');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['name']) && isset($_POST['description']) && isset($_POST['price']) && isset($_POST['quantity'])) {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $insert_query = "INSERT INTO tov (name, description, price, quantity) VALUES (:name, :description, :price, :quantity)";
        $stmt = $pdo->prepare($insert_query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':quantity', $quantity);
        $stmt->execute();
        header("Location: index.php");
        exit();
    }
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>