<!DOCTYPE html>
<html>
<head>
    <title>Підтвердження замовлення</title>
</head>
<body>
<h2>Підтвердження замовлення</h2>
<?php
$item = isset($_GET['item']) ? $_GET['item'] : '';
$quantity = isset($_GET['quantity']) ? $_GET['quantity'] : '';
echo "Ваше замовлення прийнято: Товар: $item, Кількість: $quantity";
?>
</body>
</html>
