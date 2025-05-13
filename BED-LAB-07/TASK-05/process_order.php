<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $item = isset($_POST['item']) ? $_POST['item'] : '';
    $quantity = isset($_POST['quantity']) ? $_POST['quantity'] : '';

    http_response_code(303);
    header("Location: confirmation.php?item=$item&quantity=$quantity");
    exit();
}
?>
