<?php	include 'header.php'; 
// выбрать данные по товару согласно его коду и отобразить их
$query4 = "SELECT *,SUBSTRING(opistovar,1,90) as k FROM tovar where idt=".$_GET['id'];
$result4 = mysql_query($query4) or die(mysql_error());
	while($row4 = mysql_fetch_array($result4))
    { 

            
      echo"  </div>
        <div id='content' class='float_r'>
	<h1>{$row4['1']}</h1>
            <div class='content_half float_l'>
        	<a  rel='lightbox[portfolio]' href='{$row4['3']}'><img src='{$row4['3']}' alt='image' /></a>
            </div>
            <div class='content_half float_r'>
           <table>
                    <tr>
                        <td width='160'>Цена:</td>
                        <td>{$row4['5']} руб.</td>
                    </tr>
					<tr>
                       
                    </tr>
                    <tr>
                        <td>Номенклатурный номер:</td>
                        <td>{$row4['0']}</td>
                    </tr>
					<tr>
                       
                    </tr>
					<tr>
                       
                    </tr>
                 
                    <tr>
                    	
                   ";
	if ($_SESSION['user']) {	//если пользователь прошел аутентификацию, то отобразить кнопку добавить в корзину
	echo" <td></td>
                        <td>
	    <form method='post' action=''> 
		<input name='kolvo' type='hidden' value='1' /></td></tr>
		<tr><td>
<input name='del' type='submit' class='addtocart2' > </td>
               </form>";}
	 echo" </tr>
                </table>
                <div class='cleaner h20'></div>  </div>  <table>  <tr>
                        <tr><td><center>Описание:</center></td></tr>
						
                        <tr><td>{$row4['2']}</td></tr>
                    </tr></table>";
            }
 

if ( //если нажата кнопка добавить в корзину то вставить данные в таблицу корзина
isset ( $_POST['del'] )){
		// echo "insert into korzina(idt,idu,kolvo) values(".$_GET['id'].",".$_SESSION['user'].",".$_POST['kolvo'].")";
		 $sql1 =mysql_query ("insert into korzina(idt,idu,kolvo) values(".$_GET['id'].",".$_SESSION['user'].",".$_POST['kolvo'].")"		 );
	
		 
	 $url = $_SERVER['REQUEST_URI']; echo "<script>location.href='".$url."'</script>"; 
	 
	 } ?>
        </div> 
        <div class="cleaner"></div>
    </div> <!-- подключение нижнего меню -->
    
       <?php	include 'footer.php'; ?>
    
</div>
</div> 

</body>
</html>