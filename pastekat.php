<html>
<body>
<?php
// полуечние названия категории
$nazv=$_POST['nazv'];
//подключение к серверу и бд
$db = mysql_connect("localhost", "root");
mysql_select_db("keram",$db);
// выборка категории с таким названием
$query = "select kat from kat where kat='$nazv'";
$res = mysql_query($query) or die(mysql_error());
$number = mysql_num_rows($res);
//если такая категория уже есть выдать сообщение
 if ($number <>0) {echo "<CENTER><P>Данная категория уже существует в базе. Пожалуйста измените название</CENTER>";} else {
	 //если такой категории нет вставить в таблицу Kat
$row=mysql_fetch_array($res);
$query2 = "insert into kat (kat) values ('$nazv')";
$res2 = mysql_query($query2) or die(mysql_error());
echo "Данные успешно сохранены";
//возврат на редактирвоание категории
$url="editkat.php";
echo "<script>location.href='".$url."'</script>";

}



?>
</body>
</html>