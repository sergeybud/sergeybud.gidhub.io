<?php

// Каталог, в который  будем принимать файл:
$idu=$_POST['id'];
$uploaddir = './images/product/';
//загружаем файл
$uploadfile = $uploaddir.basename($_FILES['uploadfile']['name']);

// Копируем файл из каталога для временного хранения файлов:
if (copy($_FILES['uploadfile']['tmp_name'], $uploadfile))
{
echo "<h3>Файл успешно загружен на сервер</h3>";
}
else { echo "<h3>Ошибка! Не удалось загрузить файл на сервер!</h3>"; exit; }
//подключение к бд
$db = mysql_connect("localhost", "root");
mysql_select_db("keram",$db);
//обновить у товара путьк  изображению
$query = mysql_query ("UPDATE tovar SET imagetovar='$uploadfile' WHERE idt=$idu");


//вернуться на страницу администрирвоания товара 
$url="edittovar.php";
echo "<script>location.href='".$url."'</script>";


// Выводим информацию о загруженном файле:
echo "<h3>Информация о загруженном на сервер файле: </h3>";
echo "<p><b>Оригинальное имя загруженного файла: ".$_FILES['uploadfile']['name']."</b></p>";
echo "<p><b>Mime-тип загруженного файла: ".$_FILES['uploadfile']['type']."</b></p>";
echo "<p><b>Размер загруженного файла в байтах: ".$_FILES['uploadfile']['size']."</b></p>";
echo "<p><b>Временное имя файла: ".$_FILES['uploadfile']['tmp_name']."</b></p>";
 
?>