<?php
if(isset($_POST['submit'])){
    if(isset($_FILES['image'])){
        $errors= array();
        $file_name = $_FILES['image']['name'];
        $file_size =$_FILES['image']['size'];
        $file_tmp =$_FILES['image']['tmp_name'];
        $file_type=$_FILES['image']['type'];
        $file_ext_exploded = explode('.', $_FILES['image']['name']);
        $file_ext = strtolower(end($file_ext_exploded));


        $extensions= array("jpeg","jpg","png");

        // Перевірка розширення файлу
        if(in_array($file_ext,$extensions)=== false){
            $errors[]="Дозволені тільки файли з розширенням JPEG, JPG або PNG.";
        }

        if($file_size > 2097152) {
            $errors[]='Файл повинен бути менше 2 MB';
        }

        if(empty($errors)==true) {
            move_uploaded_file($file_tmp,"uploads/".$file_name);
            echo "Файл успішно завантажено: ".$file_name;
        } else {
            print_r($errors);
        }
    }
}

$files = glob("uploads/*.{jpg,jpeg,png}", GLOB_BRACE);
echo "<h2>Завантажені зображення:</h2>";
foreach($files as $file) {
    echo '<img src="'.$file.'" style="max-width: 200px; max-height: 200px; margin: 10px;">';
}
?>

<form action="index-04.html">
    <button type="submit">Повернутися</button>
</form>
