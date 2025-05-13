<!DOCTYPE html>
<html>
<head>
    <title>Оформлення замовлення</title>
</head>
<body>
<h2>Оформлення замовлення</h2>
<form method="post" action="process_order.php">
    <label for="item">Виберіть товар:</label>
    <select id="item" name="item">
        <option value="item1">Товар 1</option>
        <option value="item2">Товар 2</option>
        <option value="item3">Товар 3</option>
    </select>
    <br><br>
    <label for="quantity">Введіть кількість:</label>
    <input type="number" id="quantity" name="quantity" min="1">
    <br><br>
    <input type="submit" value="Оформити замовлення">
</form>
</body>
</html>
