<?php	include 'header.php'; ?><!-- подключение шапки - аутентификация, корзина, главное и боковое меню-->
            <div class="sidebar_box"><span class="bottom"></span>
            	<h3>Популярное</h3>   
                <div class="content"> 
                <?php	
	//формирование части популярное
// получение параметров страницы - idk - в случае если в меню продукция нажата категория	
				$idk=$_GET['idk'];
// в случае если в поле поиск чтото введено и нажата кнопка поиск
			$key=$_POST['keyword'];
//определить 4 наиболее популярных товара и отобразить их		
					$query3 = "SELECT * FROM tovar t2  order by datad asc LIMIT 4 ";
$result3 = mysql_query($query3) or die(mysql_error());
						mysql_data_seek($result3,0);
					while($row3 = mysql_fetch_array($result3))
    { 

	echo "<div class='bs_box'>";
                    	echo "<a href='productdetail.php?id={$row3['0']}'><img src={$row3['3']} alt='image' width='60'/></a>
                        <h4><a href='productdetail.php?id={$row3['0']}'>{$row3['1']}</a></h4>
                        <p class='price'>{$row3['5']} руб.</p>
                        <div class='cleaner'></div>
                    </div>";}
					?>
                    
				                    
                </div>
            </div>
        </div>
        <div id="content" class="float_r">
     <?php		
	 //если не нажата категория и кнопка поиск то показать слайдер с изображениями
	if (($idk=='') and ($key==''))		{ echo "   	<div id='slider-wrapper'>
                <div id='slider' class='nivoSlider'>
                    <img src='images/slider/02.jpg' alt='' />
                    <a href='#'><img src='images/slider/01.jpg' alt='' title='Огромный выбор керамической плитки для ванной' /></a>
                    <img src='images/slider/03.jpg' alt='' />
                    <img src='images/slider/04.jpg' alt='' title='#htmlcaption' />
                </div>
                <div id='htmlcaption' class='nivo-html-caption'>
                    <strong>Огромный</strong> выбор <em>керамической </em> плитки <a href='index.php?idk=4'>Перейти</a>.
                </div>
	</div>";}?>
			
			
            <script type="text/javascript" src="js/jquery-1.4.3.min.js"></script>
            <script type="text/javascript" src="js/jquery.nivo.slider.pack.js"></script>
            <script type="text/javascript">
            $(window).load(function() {
                $('#slider').nivoSlider();
            });
            </script>
        <?php		
		 //если не нажата категория и кнопка поиск то показать 6 последних добавленных позиций	
	if (($idk=='') and ($key==''))	{ echo "<h1>Новая продукция</h1>";
			
			
	$query4 = "SELECT *,SUBSTRING(opistovar,1,90) as k FROM tovar order by datad desc LIMIT 6";
	} 
	
	elseif  (($idk<>'') and ($key==''))
	{
		//если выбрана категория то отобразить товары выбранной категории
		$querykat = mysql_query("select * from kat where idk=$idk") or die(mysql_error());
		while($rowkat = mysql_fetch_array($querykat)) {
	echo "<h1>{$rowkat['1']}</h1>";
		}
			
	$query4 = "SELECT *,SUBSTRING(opistovar,1,90) as k FROM tovar where idk=$idk";	
	}
	else {
			//если выбран поиск то отобразить товары которые содержат поисковое слово
		echo "<h1>Поиск по '$key'</h1>";
	$query4 = "SELECT *,SUBSTRING(opistovar,1,90) as k FROM tovar where nametov like '%$key%'";	
	}
$result4 = mysql_query($query4) or die(mysql_error());
					$i=0;
					
					while($row4 = mysql_fetch_array($result4))
    { 
echo "<div class='product_box'>
<h3>{$row4['1']}</h3>	
                 <a href='#'><img src={$row4['3']} alt='image' width='150'/></a>
				 <p>{$row4['7']}</p>
				 <p class='product_price'>{$row4['5']} руб.</p>";
if ($_SESSION['user']<>"") {				 
     echo "<form method='post' action=''>
<input name='del' type='submit' class='addtocart2' > ";}
               echo "<a href='productdetail.php?id={$row4['0']}' class='detail'></a> <input name='id' type='hidden' value='". $row4['0'] ."'>   </form>
            </div> 
			"; $i++;
			if ($i % 3 == 0) {echo " <div class='cleaner'></div>";}}
				

 if ( isset ( $_POST['del'] )){
		//если нажата кнопка добавить в корзину то осуществить вставку значений в корзину 
		 $sql1 =mysql_query ("insert into korzina(idt,idu) values(".$_POST['id'].",".$_SESSION['user'].")"		 );
	
		/// и обновить страницу 
	 $url = $_SERVER['REQUEST_URI']; echo "<script>location.href='".$url."'</script>"; 
	 
	 }
				?>
			
              	
        </div> 
        <div class="cleaner"></div>
    </div> 
    	<!-- подключение нижнего меню-->
    
   <?php	include 'footer.php'; ?>
</div> 

</body>
</html>