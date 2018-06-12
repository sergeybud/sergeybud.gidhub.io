<?php session_start(); ?>
<?php
header('Content-Type:text/html;charset=utf-8');
define('INTERNAL',1);
//выполнение кода code.php
require_once('code.php');
//получения кода пользователя из сессии

$logged = $_SESSION['user'];
//подключение сервера и бд
$db = mysql_connect("localhost", "root");
mysql_select_db("keram",$db);
//если аутентификация прошла успешно тогда
if ($logged) {
	//выбираем из таблицы пользователя личные данные
$query = "SELECT * FROM users WHERE idu='$logged'";

$result = mysql_query($query) or die(mysql_error());
$number = mysql_num_rows($result);
// определяем количество компонентов в корзине у пользователя
$querykorz = "SELECT sum(kolvo) as k FROM korzina where idu=".$_SESSION['user'];

$resultkorz = mysql_query($querykorz) or die(mysql_error());

}
//выборка категорий
$query2 = "SELECT * FROM kat";
$result2 = mysql_query($query2) or die(mysql_error());



 
 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Web-приложение магазина керамической плитки «Мозайка» </title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<!-- подключение стилей -->
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="nivo-slider.css" type="text/css" media="screen" />

<link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css" />
<!-- подключение стилей дополнительных библиотек-->
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/ddsmoothmenu.js">

/***********************************************
* Smooth Navigational Menu- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
***********************************************/

</script>

<script type="text/javascript">

ddsmoothmenu.init({
	mainmenuid: "top_nav", //menu DIV id
	orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'ddsmoothmenu', //class added to menu's outer DIV
	//customtheme: ["#1c5a80", "#18374a"],
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})

</script>

</head>

<body>

<div id="templatemo_body_wrapper">
<div id="templatemo_wrapper">

	<div id="templatemo_header">
    	<div id="site_title"><h1><a href="index.php"><br>керамическая плитка</a></h1></div>
       	  <div id="header_right">
        <p>
	       
<?php
//если пользователи не вошел на сайт то отобразить форму входа
	
if ((!$logged) ) {	       
 echo "<a href='#'><form method='post' action='logmi.php'>";
 echo "Логин  <input type=text size=10 maxlength=10 name='login' />";
 echo "  Пароль<input type='password' size=10 maxlength=10 name='password' />";
echo "<input type='submit'  name='del' value='Войти' /><a href='reg.php'>Регистрация</a>";} else {	$row = mysql_fetch_array($result); 
	echo $row['3'];echo  ", добро пожаловать!!! " ;echo  "<a href='login.php?act=logout'>Выйти</a>";}

 ?>
		
           
            <?php	
			//если пользователи  вошел на сайт то отобразить форму количество позиций в корзине
			if ($logged){	
					while($rowkorz = mysql_fetch_array($resultkorz))
    { $rowp=$rowkorz['0'];
			echo  " <p>К расчету: <strong>{$rowkorz['0']} шт.</strong> ( <a href='shoppingcart.php'>Рассчитать количество</a>) </p> ";}
			
			}
			 ?>
			 
			        
			
		</div>
		
			</div>
		
		
        <div class="cleaner"></div>
    
    
    <div id="templatemo_menubar">
    	<div id="top_nav" class="ddsmoothmenu">
            <ul>
                <li><a href="index.php" class="selected">Главная</a></li>
                <li><a href="#">Продукция</a>
                    <ul>
					<?php
					//построение меню продукция на основе  запроса категории при помощи цикла, берем первую строчку и создаем меню, затем следующию, пока не кончатся
					while($row2 = mysql_fetch_array($result2))
    { 
                       echo "<li><a href='index.php?idk={$row2['0']}'>{$row2['1']}</a></li>";
                       
	} ?>	
                  </ul>
                </li>
				<!-- формирвоание меню о нас-->
                <li><a href="about.php">О нас</a>
                   
                </li>
				
				
			   <?php	
			   // если пользователь является администратором тогда создается дополнительное меню администрирование
			   if ($logged==1){  echo  "<li><a href='#'>Администрирование</a>
			 <ul><li><a href='editkat.php'>Категории</a></li>
			 <li><a href='edittovar.php'>Товар</a></li>
			</ul> 
			 </li>          ";} 
			 elseif ($logged>1){    

			 echo  "
			<li><a href='shoppingcart.php'> Рассчитать потребность: <strong>$rowp шт.</strong></a></li> 
			 
			 <li><a href='contact.php'>Контакты</a></li>";}?>
				  
            </ul>
            <br style="clear: left" />
        </div> 
			<!-- формирвоание формы поиска ТОВАРА ПО  НАИМЕНОВАНИЮ-->
        <div id="templatemo_search">
            <form action="index.php" method="post">
              <input type="text" value=" " name="keyword" id="keyword" title="keyword" onfocus="clearText(this)" onblur="clearText(this)" class="txt_field" />
              <input type="submit" name="Search" value=" " alt="Search" id="searchbutton" title="Search" class="sub_btn"  />
            </form>
        </div>
    </div> 
 
    <div id="templatemo_main">
    	<div id="sidebar" class="float_l">
        	<div class="sidebar_box"><span class="bottom"></span>
            	<h3>Категории</h3>   
                <div class="content"> 
                	<ul class="sidebar_list">
                    	
						<?php
						//формирвоание бокового меню категории аналогично меню продукция
						mysql_data_seek($result2,0);
					while($row2 = mysql_fetch_array($result2))
    { 
                       echo "<li><a href='index.php?idk={$row2['0']}'>{$row2['1']}</a></li>";
                       
	} ?>	
						
                    </ul>
                </div>
             </div>