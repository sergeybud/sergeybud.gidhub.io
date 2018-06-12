<?php	include 'header.php'; ?><!-- подключение шапки - аутентификация, корзина, главное и боковое меню-->
            
        </div>

		<div id="content" class="float_r">
		   	<h1>Регистрация</h1>
<!--регистрация--!>
		<?
// подключение к серверу и бд
$link = mysql_connect("localhost", "root", "") or die ("Нет соединения с хостом");
mysql_query("SET NAMES utf8");
mysql_query('SET CHARACTER SET utf8');
mysql_query('SET COLLATION_CONNECTION="utf8_general_ci"');
mysql_select_db ("keram");
// создание формы регистрации
echo "<form action='' method='post'>";
echo "<table>";
 echo "<tr><td>ФИО</td><td><input name='fio' maxlength=150 size=80 value='' type=text></td></tr>";
  echo "<tr><td>Адрес</td><td> <input name='adres' maxlength=155 size=80 value='' type=text></td></tr>";
 echo "<tr><td>Телефон</td><td> <input name='tel' maxlength=50 size=50 value='' type=text></td></tr>";
  echo "<tr><td>E-mail</td><td>  <input name='email' maxlength=150 size=50 value='' type=text></td></tr>";
   echo "<tr><td>Логин</td><td> <input name='login' maxlength=20 size=20 value='' type=text></td></tr>";
   echo "<tr><td>Пароль </td><td><input type='password' size=20 maxlength=20 name='password' /></td></tr>";

 echo "<tr><td><INPUT name='red'  TYPE='submit' VALUE='Зарегистрироваться'>";
 echo "</table>";
 echo "</form>";
 
 //если нажата кнопка зарегистрироваться
  if ( isset ( $_POST['red'] ))
  {
	  //вставить данные в таблицу пользователь
	  $sql1 =mysql_query ("insert into users(login,password,fio,adres,tel,email)  values('".$_POST['login']."','".$_POST['password']."','".$_POST['fio']."','".$_POST['adres']."','".$_POST['tel']."','".$_POST['email']."')");
  $url = "index.php"; 
  echo "<script>location.href='".$url."'</script>";
  }
 
 ?>
 <!-- подключение нижнего меню-->
    		 </div>
        <div class="cleaner"></div>
    </div> 
	<!-- END of templatemo_main -->
    
        <?php	include 'footer.php'; ?>
    
</div> 

</body>
</html>