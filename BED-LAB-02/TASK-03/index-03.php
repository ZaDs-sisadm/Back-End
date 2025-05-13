<!DOCTYPE html>
<html>
<head>
    <title>TASK-03</title>
</head>
<body>
<form enctype="multipart/form-data" method="post" action="process_form.php">
    <label for="login">Логін:</label>
    <input type="text" id="login" name="login"><br><br>

    <label for="password">Пароль:</label>
    <input type="password" id="password" name="password"><br><br>

    <label for="confirm_password">Підтвердіть пароль:</label>
    <input type="password" id="confirm_password" name="confirm_password"><br><br>

    <label>Стать:</label>
    <input type="radio" id="male" name="gender" value="male">
    <label for="male">Чоловік</label>
    <input type="radio" id="female" name="gender" value="female">
    <label for="female">Жінка</label><br><br>

    <label for="city">Місто:</label>
    <select id="city" name="city">
        <option value="Київ">Київ</option>
        <option value="Харків">Харків</option>
        <option value="Львів">Львів</option>
        <option value="Житомир">Житомир</option>
    </select><br><br>

    <label>Улюблені ігри:</label>
    <input type="checkbox" id="football" name="games[]" value="football">
    <label for="football">Футбол</label>
    <input type="checkbox" id="basketball" name="games[]" value="basketball">
    <label for="basketball">Баскетбол</label>
    <input type="checkbox" id="tennis" name="games[]" value="tennis">
    <label for="tennis">Теніс</label>
    <br><br>

    <label for="about">Про себе:</label><br>
    <textarea id="about" name="about" rows="4" cols="50"></textarea><br><br>

    <label for="photo">Фото:</label>
    <input type="file" id="photo" name="photo"><br><br>

    <input type="submit" value="Зареєструватися">
</form>

<?php
if(isset($_GET['lang'])) {
    setcookie('lang', $_GET['lang'], time() + (86400 * 180), "/");
}

$selected_language = isset($_COOKIE['lang']) ? $_COOKIE['lang'] : 'ukr';

echo "<p>Вибрана мова: ";

switch ($selected_language) {
    case 'ukr':
        echo "Українська</p>";
        break;
    case 'eng':
        echo "English</p>";
        break;
    case 'rus':
        echo "Русский</p>";
        break;
    case 'pol':
        echo "Polska</p>";
        break;
    default:
        echo "Не визначено</p>";
}
?>

<a href="index-03.php?lang=ukr"><img src="ukr_icon.png" alt="Українська" width="30" height="30"></a>
<a href="index-03.php?lang=eng"><img src="eng_icon.png" alt="English" width="30" height="30"></a>
<a href="index-03.php?lang=rus"><img src="rus_icon.jpg" alt="Русский" width="30" height="30"></a>
<a href="index-03.php?lang=pol"><img src="pol_icon.png" alt="Polska" width="30" height="30"></a>

<form enctype="multipart/form-data" method="post" action="process_form.php">
</form>

</body>
</html>