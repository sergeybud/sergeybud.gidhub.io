<?php	include 'header.php'; ?><!-- подключение шапки - аутентификация, корзина, главное и боковое меню-->
            
        </div>
		<div id="content" class="float_r">
<!--регистрация-->
		<?

echo "<center>";
// подключение к серверу
$link = mysql_connect("localhost", "root", "") or die ("Нет соединения с хостом");
mysql_query("SET NAMES utf8");
mysql_query('SET CHARACTER SET utf8');
mysql_query('SET COLLATION_CONNECTION="utf8_general_ci"');
// подключение к бд
mysql_select_db ("keram");
// выборка данных по товарам
$query = mysql_query("SELECT idt,nametov,opistovar,kat,cena, kat.idk,imagetovar,h,w FROM tovar left join kat on tovar.idk=kat.idk ") or die(mysql_error());
$number = mysql_num_rows($query );

// выбрка данных по категориям
$query2 = "SELECT idk,kat  FROM kat ";
$res2 = mysql_query($query2) or die(mysql_error());
$number2 = mysql_num_rows($res2);


//построение таблицы по товарам на основе запроса $query
echo "<table border='1'><tr><td>Код товара</td><td>Редактировать</td><td>Изображение</td></tr>";
while($row = mysql_fetch_array($query))
    { 
//на каждую строчку создаем форму редактирвоания товара
echo "<tr>
                <td>{$row['0']}</td>
                
	
	
    <form method='post' action=''>
     
 <input name='id' type='hidden' value='". $row['0'] ."'> 
 <input name='idk' type='hidden' value='". $row['5'] ."'> 
                       <td>     <input  name='namered' type='text' size='50' value='". $row['1'] ."'>
					   <textarea name='opisred'  rows='5' cols='45' >". $row['2'] ."</textarea>
                     
    <input  name='cenared' type='text'  size='10' maxlength='10'  value='". $row['4'] ."'>


<select name='vibork'  maxlength='155'>";
//чтобы категория была в виде выпадающего списка на каждый товар берем код категории и методом перебора категорий добавляем их в список а при совпаденнии с кодом из таблицы товар делаем активным
mysql_data_seek($res2,0);
mysql_data_seek($res3,0);
while ($row2=mysql_fetch_array($res2)) 
{
$row2[0];
if ($row[5]==$row2[0])
{$yest=$row2[0];$yestv=$row2[1];
} 
else {echo "<option value=".$row2[0].">".$row2[1]."</option>";} 

}
echo "<option selected value=$yest>$yestv</option>";
echo "</select>

<br>Длина <input  name='h' type='text' size='5' value='". $row['7'] ."'> Ширина <input  name='w' type='text' size='5' value='". $row['8'] ."'>";
//формируем кнопки управления сохранить, удалить и добавить изображение
echo "  <input name='red' type='submit' value='Сохранить изменения' class='sendsubmitsave'><input name='del' type='submit' value='Удалить' class='sendsubmitdel'>
</td></form>
           
	<td>
	<IMG SRC={$row['6']} WIDTH=60 HEIGHT=70 BORDER=0 ALT='IMAGE' ALIGN=center>
	<form action=upload.php method=post enctype=multipart/form-data>
	 <input name='id' type='hidden' value='". $row['0'] ."'> 
	<input type=file name=uploadfile><input type=submit value=Загрузить></form>	  </td> 
        </tr>";

};




echo "</select>";
 
//проверяем если нажата кнопка удалить то удаляем товар из таблицы товар
     if ( isset ( $_POST['del'] )){$sql1 =mysql_query ("DELETE FROM `tovar` WHERE idt='".$_POST['id']."'");$url = $_SERVER['REQUEST_URI']; echo "<script>location.href='".$url."'</script>"; }
//проверяем если нажата кнопка сохранить то сохраняем изменения в таблице товар
   elseif ( isset ( $_POST['red'] ))
     {

	 
       $sql2 =mysql_query ("UPDATE tovar SET nametov='". $_POST['namered']."', opistovar= '". $_POST['opisred']."', cena= '". $_POST['cenared']."',idk='". $_POST['vibork']."',h=". $_POST['h'].",w=". $_POST['w']." WHERE idt='".$_POST['id']."'");
              if($sql2 == false){ echo "неполучилось";} 
              else { $url = $_SERVER['REQUEST_URI']; echo "<script>location.href='".$url."'</script>";  }

$url="edittovar.php";
echo "<script>location.href='".$url."'</script>";
}


mysql_data_seek($res2,0);
echo "</center>";
echo "</p><br>";
// создаем форму для добавления нового товара но обработка будет происходить при помощи pastetovar.php
 echo "<form action='pastetovar.php' method='post'>";
 echo "<p><p><table border='0'><tr><td>Введите название товара </td><td><input name='nazv' maxlength=50 size=50 value='' type=text>";
 echo "</td></tr><tr><td>Введите описание товара </td><td><textarea name='pis'  rows='5' cols='45' value='' ></textarea></td></tr><tr><td></td><td>";
echo "<select name='vibork'>";
echo "<option value=''>Выберите категорию";
while ($row2=mysql_fetch_array($res2)) 
{echo "<option value=".$row2['idk'].">".$row2['kat']."</option>"; }
echo "</select>";
echo "</td></tr><tr><td>Введите цену товара</td><td> <input name='cena' maxlength=10 size=5 value='' type=text>";

 echo "</td></tr><tr><td>Введите размеры плитки</td><td>
 <input  name='h' type='text' size='5' value='". $row['7'] ."'> <input  name='w' type='text' size='5' value='". $row['8'] ."'>
 
 </td></tr>
  
 <tr><td></td><td><INPUT TYPE='submit' VALUE='Добавить' class='sendsubmitsave'></td></tr></table>";
 echo "</form>";
 
 echo "</table>";
 ?>

         </div>
		     <div class="cleaner"></div>
    </div> 
        <?php	include 'footer.php'; ?>
    
	
