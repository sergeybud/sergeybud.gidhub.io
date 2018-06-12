
<?php
//включение сессии
session_start(); ?>

<html>

<body>
<head>

<meta http-equiv="Content-Type" content="text/html;charset=utf-8">

<?php
//аутентификация
/////получение логина и пароля
 $login = $_POST['login']; 
 $password = $_POST['password'];
$db = mysql_connect("localhost", "root");
mysql_select_db("keram",$db);


   //выборка данных из таблицы пользователи
    $query = "SELECT * FROM users WHERE login='$login' AND password='$password'";
 
$result = mysql_query($query) or die(mysql_error());
$number = mysql_num_rows($result);

	
    if ($number>0){
		//если есть такой пользователь то есссии пользователь присвоить значение код пользователя idu
		$row = mysql_fetch_array($result);
		$_SESSION['user'] = $row['0'];
	echo $_SESSION['user'];
		$url="index.php";
		echo "<script>location.href='".$url."'</script>";
	} else {
	      echo "<script>alert(\"Пользователь $login не зарегистрирован\");</script>";

echo "Пользователь $login не зарегистрирован";
	echo "<script>location.href='index.php'</script>";

		}
	


?>
</head>
</body>
</html>