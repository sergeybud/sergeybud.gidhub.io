<?php	include 'header.php'; //подключение шапки?>
        </div>
		<div id="content" class="float_r">

		<?
//подключение к серверу
$link = mysql_connect("localhost", "root", "") or die ("Нет соединения с хостом");
mysql_query("SET NAMES utf8");
mysql_query('SET CHARACTER SET utf8');
mysql_query('SET COLLATION_CONNECTION="utf8_general_ci"');
//подключение к бд
mysql_select_db ("keram");
//выборка всех категорий
$query = mysql_query("select * from kat") or die(mysql_error());
$number = mysql_num_rows($query );

//вывод списка весх категорий на каждую категорию создается форма и кнопки сохранить и удалить
echo "<table border='1'><tr><td>Код категории</td><td>Категория</td><td>Редактировать</td><td>Удалить</td></tr>";
while($row = mysql_fetch_array($query))
    {  echo "<tr>
                <td>{$row['0']}</td>
                <td>{$row['1']}</td>
                  
                <form method='post' action=''>
              
                      
          <td> <input name='id' type='hidden' value='". $row['0'] ."'> 
                         <input  name='namered' type='text' value='". $row['1'] ."'>
                         <input name='red' type='submit' class='sendsubmitsave' value='Сохранить изменения'></td>
           <td><input name='del' type='submit' value='Удалить' class='sendsubmitdel'></td>
                </form>
               
        </tr>"; 
};


echo "</select>";
 
//если нажата кнопка удалить - удаление категории из таблицы
     if ( isset ( $_POST['del'] )){$sql1 =mysql_query ("DELETE FROM `kat` WHERE idk='".$_POST['id']."'"); $url = $_SERVER['REQUEST_URI']; echo "<script>location.href='".$url."'</script>"; }
     elseif ( isset ( $_POST['red'] ))
     { 
	 //если нажата кнопка сохранить обновление информации в таблитце Kat
       $sql2 =mysql_query ("UPDATE kat SET kat='". $_POST['namered']."' WHERE idk='".$_POST['id']."'");
              if($sql2 == false){ echo "неполучилось";} 
              else { $url = $_SERVER['REQUEST_URI']; echo "<script>location.href='".$url."'</script>";  /* Перенаправляемся на страницу редактирвоания сбрасывая переменные $_POST['del'] и/или $_POST['red']   */}

$url="editkat.php";
echo "<script>location.href='".$url."'</script>";
}
echo "</center>";
echo "</p>";
//создание формы добавление категории
 echo "<p><form action='pastekat.php' method='post'>";
 echo "Введите название категории  <input name='nazv' maxlength=50 size=20 value='' type=text>";
 echo "<INPUT TYPE='submit' class='sendsubmitsave' VALUE='Добавить'>";
 echo "</form>";
 
 echo "</table>";
 ?>

		 </div>
        <div class="cleaner"></div>
    </div> 
	<!-- END of templatemo_main -->
    
        <?php	include 'footer.php'; ?>
    
</div> 

</body>
</html>