<!DOCTYPE html>
<html>
<head>
    <title>TASK-02</title>
</head>
<body>
<h2>Перше завдання: Знайти повторювані елементи в масиві</h2>
<form method="post">
    <label for="arrayInput">Введіть елементи масиву через кому:</label><br>
    <input type="text" id="arrayInput" name="arrayInput"><br>
    <button type="submit" name="findDuplicatesBtn">Знайти повторення</button>
</form>
<?php
if(isset($_POST['findDuplicatesBtn'])){
    $userArray = explode(',', $_POST['arrayInput']);
    $duplicates = array();
    $counts = array_count_values($userArray);
    foreach ($counts as $key => $value) {
        if ($value > 1) {
            $duplicates[] = $key;
        }
    }
    echo "Повторювані елементи: " . implode(", ", $duplicates);
}
?>

<hr>
<h2>Друге завдання: Генератор імен</h2>
<form method="post">
    <label for="nameInput">Введіть літери або склади для створення імені:</label><br>
    <input type="text" id="nameInput" name="nameInput" value="<?php echo isset($_POST['nameInput']) ? htmlspecialchars($_POST['nameInput']) : ''; ?>"><br>
    <button type="submit" name="generateNameBtn">Згенерувати ім'я</button>
</form>
<?php
if(isset($_POST['generateNameBtn'])){
    function shuffleLetters($input) {
        $input = str_replace(' ', '', $input);
        $letters = preg_split('//u', $input, -1, PREG_SPLIT_NO_EMPTY);
        $vowels = array();
        $consonants = array();

        foreach ($letters as $letter) {
            if (in_array($letter, array('а', 'е', 'ё', 'и', 'о', 'у', 'ы', 'э', 'ю', 'я'))) {
                $vowels[] = $letter;
            } else {
                $consonants[] = $letter;
            }
        }

        shuffle($vowels);
        shuffle($consonants);

        $result = '';
        $vowelIndex = 0;
        $consonantIndex = 0;

        foreach ($letters as $letter) {
            if (in_array($letter, array('а', 'е', 'ё', 'и', 'о', 'у', 'ы', 'э', 'ю', 'я'))) {
                $result .= $vowels[$vowelIndex];
                $vowelIndex++;
            } else {
                $result .= $consonants[$consonantIndex];
                $consonantIndex++;
            }
        }

        return $result;
    }

    echo "Сгенерированное имя: " . shuffleLetters($_POST['nameInput']);
}
?>
<hr>

<h2>Третє завдання: Об'єднання та сортування масивів</h2>
<form method="post">
    <button type="submit" name="createArrayBtn">Створити новий масив</button>
</form>
<?php
function createArray() {
    $length1 = rand(3, 7);
    $length2 = rand(3, 7);
    $array1 = array();
    $array2 = array();
    for ($i = 0; $i < $length1; $i++) {
        $array1[] = rand(10, 20);
    }
    for ($i = 0; $i < $length2; $i++) {
        $array2[] = rand(10, 20);
    }
    return array($array1, $array2);
}

function mergeAndSortArrays($array1, $array2) {
    $mergedArray = array_merge($array1, $array2);
    $uniqueArray = array_unique($mergedArray);
    sort($uniqueArray);
    return $uniqueArray;
}

if(isset($_POST['createArrayBtn'])){
    list($userArray1, $userArray2) = createArray();
    echo "Створені масиви: <br>";
    echo "Масив 1: " . implode(", ", $userArray1) . "<br>";
    echo "Масив 2: " . implode(", ", $userArray2) . "<br>";

    $mergedAndSortedArray = mergeAndSortArrays($userArray1, $userArray2);
    echo "Об'єднаний та відсортований масив: " . implode(", ", $mergedAndSortedArray) . "<br>";
}
?>

<hr>

<h2>Четверте завдання: Сортування масиву користувачів</h2>
<form method="post">
    <label for="userNames">Імена (через кому):</label>
    <input type="text" id="userNames" name="userNames" value="<?php echo isset($_POST['userNames']) ? htmlspecialchars($_POST['userNames']) : ''; ?>"><br>
    <label for="userAges">Віки (через кому):</label>
    <input type="text" id="userAges" name="userAges" value="<?php echo isset($_POST['userAges']) ? htmlspecialchars($_POST['userAges']) : ''; ?>"><br>
    <label for="sortType">Виберіть тип сортування:</label>
    <select id="sortType" name="sortType">
        <option value="age" <?php echo isset($_POST['sortType']) && $_POST['sortType'] == 'age' ? 'selected' : ''; ?>>За віком</option>
        <option value="name" <?php echo isset($_POST['sortType']) && $_POST['sortType'] == 'name' ? 'selected' : ''; ?>>По імені</option>
    </select><br>
    <button type="submit" name="sortUsersBtn">Сортувати користувачів</button>
</form>
<?php
if(isset($_POST['sortUsersBtn'])){
    $userNames = isset($_POST['userNames']) ? $_POST['userNames'] : '';
    $userAges = isset($_POST['userAges']) ? $_POST['userAges'] : '';
    $sortType = isset($_POST['sortType']) ? $_POST['sortType'] : '';

    $users = explode(',', $userNames);
    $ages = explode(',', $userAges);
    $users = array_map('trim', $users);

    $userList = array();
    foreach ($users as $index => $userName) {
        $userList[] = array('name' => $userName, 'age' => isset($ages[$index]) ? trim($ages[$index]) : '');
    }

    function sortUsers(array $userList, $sortType) {
        if ($sortType === "age") {
            usort($userList, function($a, $b) {
                return $a['age'] - $b['age'];
            });
        } else {
            usort($userList, function($a, $b) {
                return strcmp($a['name'], $b['name']);
            });
        }
        return $userList;
    }

    echo "Відсортований масив користувачів:<br>";
    $sortedUsers = sortUsers($userList, $sortType);
    foreach ($sortedUsers as $index => $user) {
        echo ($index + 1) . ") Ім'я: " . $user['name'] . "<br>";
        echo "Вік: " . $user['age'] . "<br>";
    }
}
?>
</body>
</html>
