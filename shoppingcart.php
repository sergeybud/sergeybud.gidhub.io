<?php	include 'header.php'; 
$dl=$_GET['dl'];
$shi=$_GET['shi'];
?>
            
        </div>
        <div id="content" class="float_r">
        	<h1>Расчет керамической плитки</h1>
				<?php	echo "<form method='post' action=''> "; ?>
        	<table width="680px" cellspacing="1" cellpadding="5">
			
		
                   	  <tr bgcolor="#ddd">
                        	<th width="220" align="left">Изображение </th> 
                        	<th width="180" align="left">Название </th> 
                       	  	<th width="100" align="center">Размеры </th> 
                        	<th width="60" align="right">Цена </th> 
							<th width="90"> </th>
	
     <?php   
If ($dl!=0)	{ echo "<th width='90'>Количество</th>
<th width='90'>Сумма, руб.</th>";}
							?>
                      </tr>
					  
	<?php	
	//выводим данные из таблицы корзина согласно коду пользователя который прошел аутентификацию, на каждую строчку создаем механизм удаления позиции из корзины
$i=0;	
$query4 = "SELECT imagetovar,nametov,cena, idu,k.idt,H,W FROM korzina as k left join tovar as t on k.idt=t.idt where idu=".$_SESSION['user'];
$result4 = mysql_query($query4) or die(mysql_error()); 
	while($row4 = mysql_fetch_array($result4))
    { 	
                    echo "	<tr> <form method='post' action=''>
                        	<td><img src={$row4['0']} alt='image 1' width='150'/></td> 
                        	<td>{$row4['1']}</td> 
                            <td align='center'>   
							<input name='idt' type='hidden' value='". $row4['4'] ."'> 
							{$row4['5']}x {$row4['6']} см
						</td>
                            <td align='right'>{$row4['2']} руб. </td> 
                                                        <td align='center'>
 <input name='del' type='submit' class='submitremove' value='Удалить'> </td>";

 If ($dl!=0)	{ echo "<td align='right'>";
   

  $plp=$row4[5]*$row4[6];
  $kp=round (($dl*100*$shi*100/$plp)*110/100);
  echo "$kp шт. </td> <td align='right'>";
  $kpr=round($dl*$shi)*$row4['2'];
 echo "$kpr руб. </td> ";}

						echo "</tr></form>";
    }       
	
       echo " <tr>
                        	
                            <td align='center' style='background:#ddd; font-weight:bold' colspan='7'> Расчет потребности керамической плитки для выполнения отделочных работ  </td>
							
							  </tr>
<tr>
<td align='center'  colspan='7'> 
</td>

  </tr>
  <form method='get' action=''><tr>
<td > Длина поверхности,м
</td><td><input  name='dl' type='text' size='3' value='$dl'></td>

  </tr>
  <tr>
<td > Ширина или высота поверхности,м
</td><td><input  name='shi' type='text' size='3' value='$shi'></td>
<td></td>
  </tr>
  
 <tr>
<td>  <input name='del2' type='submit' value='Произвести расчет'></td>
  </tr>
   <tr>
<td>
  <p><a href='javascript:history.back()'>Продолжить выбор</a></p>
  </td>
  </tr>
  </form>
	   
		<tr><p>
		</tr>";
						
	
?>
					</table>
					<?php		echo ""; 
//если нажата кнопка удалить из корзины удаляем товар из таблицы корзина по коду товара
if ( isset ( $_POST['del'] )){
		
		 $sql1 =mysql_query ("delete from korzina where idt=".$_POST['idt']);
	
	//обновляем страницу	 
	 $url = $_SERVER['REQUEST_URI']; echo "<script>location.href='".$url."'</script>"; 
	 
	 }
if ( isset ( $_POST['upd'] )){
	echo	 $_POST['id'];
	
	echo "DELETE FROM korzina  WHERE idt=".$_POST['id']."   ORDER BY idt     LIMIT ".$_POST['kolvo'];
	//$url = $_SERVER['REQUEST_URI']; echo "<script>location.href='".$url."'</script>"; 
	 
	 } 

					?>
                    <div style="float:right; width: 215px; margin-top: 20px;">
                    
		        
                    	
                    </div>
			</div>
        <div class="cleaner"></div>
    </div> 
    
      
    <?php	//подключаем нижнее меню
	include 'footer.php'; ?>
    
</div> 
</div> 

</body>
</html>