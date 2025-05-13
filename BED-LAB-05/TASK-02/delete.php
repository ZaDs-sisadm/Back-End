<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=lab5;charset=utf8','root','');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(isset($_POST['delete_id'])) {
        $delete_id = $_POST['delete_id'];
        $delete_query = "DELETE FROM tov WHERE id = :id";
        $stmt = $pdo->prepare($delete_query);
        $stmt->bindParam(':id', $delete_id, PDO::PARAM_INT);
        $stmt->execute();
        header("Location: index.php");
        exit();
    }
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
