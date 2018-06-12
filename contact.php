<?php	include 'header.php'; ?><!-- подключение шапки - аутентификация, корзина, главное и боковое меню-->
        </div>
        <div id="content" class="float_r">
        	<h1>Напишите нам</h1>
            <div class="content_half float_l">
                <p>Опишите свою проблему пожалуйста</p>
                <div id="contact_form">
				<!--создание формы отправки сообщения-->
				<form method="post" name="contact" action="#">
                        
                               
                        <label for="text">Соощение:</label> <textarea id="text" name="text" rows="0" cols="0" class="required"></textarea>
                        <div class="cleaner h10"></div>
                        
                        <input type="submit" class="submit_btn" name="submit" id="submit" value="Отправить" />
                        
                    </form>
                </div>
            </div>
        <div class="content_half float_r">
        	<h5>Web-приложение магазина керамической плитки «Мозайка»</h5>
			 <br />
			<br />
			<br /><br />
						
			Телефон:  89627518187 <br />
			Email: <a href="mailto:mozaika@mail.ru">mozaika@mail.ru</a><br/>
			
            <div class="cleaner h40"></div>
			
           
        </div>
        
        <div class="cleaner h40"></div>
        
             
        </div> 
        <div class="cleaner"></div>
    </div> 
    
	 <?php 
	// если нажата кнопка отправить, то 
	 if ( isset ( $_POST['submit'] )){
		 //вставляем в таблицу contact сообщение
		 $sql1 =mysql_query ("insert into contact(idu,mes) values(".$_SESSION['user'].",'".$_POST['text']."')"		 );
// показываем пользователю что его сообщение занесено в таблицу
		      echo "<script>alert(\"Ваше сообщение отправлено\");</script>";

echo "Ваше сообщение отправлено";
	/// перезагружаем страницу 
	 $url = $_SERVER['REQUEST_URI']; echo "<script>location.href='".$url."'</script>"; 
	 
	 }?>
	<!-- подключение нижнего меню-->	 
    <?php	include 'footer.php'; ?>
     <!-- END подключение нижнего меню-->  
</div> 
</div> 

</body>
</html>