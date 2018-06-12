<?php
session_start(); ?>


<?php
//подключение к бд
$db= mysql_connect("localhost", "root", "") or die ("Нет соединения с хостом");
mysql_select_db ("keram");
//аутентификация
function loginUser(){
	//если не получен логин и пароль то вернуть false;
    if (!isset($_POST['login']) || !isset($_POST['password'])) return false;
    // если получен
    $login = $_POST['login']; $password = $_POST['password'];
    
    $login = strtolower($login);
    
    if (!preg_match('/^[a-z]+[0-9]*([\.\-_]{1,1}[a-z0-9]+){0,2}$/', $login)) {return; }    
    if (!preg_match('/^[\x20-\x7e]{4,12}$/', $password)){return;}
    
    $password = sha1($password);
   //проверка есть ли такой пользователь 
    $query = "SELECT idu FROM users WHERE login='$login' AND password='$password'";

while($row = mysql_fetch_array($query))
{
$_SESSION['user'] =	$row3[0];
	
}

function requireLogin(){
     if (isset($_SESSION['user'])) return false;
    return true;
}

}
?>
