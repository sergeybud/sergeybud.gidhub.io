<html>
<body>
<?php
/////вставка товаров
$nazv=$_POST['nazv'];
$opis=$_POST['pis'];
$idk=$_POST['vibork'];
$cena=$_POST['cena'];
$h=$_POST['h'];
$w=$_POST['w'];
// подключение к серверу и бд
$db = mysql_connect("localhost", "root");
mysql_select_db("keram",$db);
// вставка значений в таблицу товар
$query2 = "insert into tovar(nametov,opistovar,idk,cena,datad,h,w) values ('$nazv','$opis','$idk','$cena',CURDATE(),$h,$w)";
echo $query2;
$res2 = mysql_query($query2) or die(mysql_error());
echo "Данные успешно сохранены";
//возвращение на страницу edittovar
$url="edittovar.php";
echo "<script>location.href='".$url."'</script>";





?>
</body>
</html>